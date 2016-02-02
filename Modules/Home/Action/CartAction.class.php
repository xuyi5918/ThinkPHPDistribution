<?php 

Class CartAction Extends CommonAction{

	public function Cart(){
		$Result=M('cart');
		$Id=cookie('id');
		$SQL='SELECT * FROM `my_cart` as A join `my_sping` as B on A.sp_id=B.id where A.user_id= '.$Id;
		$Data=$Result->query($SQL);

		/*计算*/
		foreach($Data as $key=>$v){
			$Data[$key]['Pre']=$v['Pre']*cookie('level');
			$Data[$key]['Total']=$Data[$key]['Pre']*$v['num'];
			$AllTotal=$Data[$key]['Total']+$AllTotal;
		}

		$this->CartList=$Data;
		$this->AllTotal=$AllTotal;
		$this->display();
	}

	public function EditCart($id,$newSum){
		$Result=M('cart');
		$Data=array('num'=>$newSum);
		if($Result->where('sp_id = '.$id)->data($Data)->save()){
			echo 'True';
		}

	}


	public function Delete($id){
		$Result=M('cart');
		if($Result->where('sp_id = '.$id)->delete()){
			echo "True";
		}
	}
	
	public function ydg(){
			
			$Result=M('dingdan');
			$id=$Result->where('FenXiaoS = '.cookie('id'))->field('id')->select();
		
			$ids='';
			foreach($id as $key =>$v){
				$ids=$v['id'].','.$ids;
			}
			$ids=rtrim($ids,',');
			
			
			$Result=M('orderasgoods');
			
			
			$SQL='SELECT * FROM  `my_orderasgoods` as A  join  my_sping as B  on A.goods=B.id  join `my_dingdan` as C on A.`order`=C.id where (`order`  IN('.$ids.'))';
			$OrderId=$Result->query($SQL);
		
			
			$Count=count($OrderId);
		
			import('ORG.Util.Page');
			$Page       = new Page($Count,8);
			$this->show       = $Page->show();
			$SQL='SELECT * FROM  `my_orderasgoods` as A  join  my_sping as B  on A.goods=B.id  join `my_dingdan` as C on A.`order`=C.id where (`order`  IN('.$ids.')) LIMIT '.$Page->firstRow.','.$Page->listRows;
		
			$OrderId=$Result->query($SQL);
				
			
			$this->CartList=$OrderId;
			$this->display();
	}

}