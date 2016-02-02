<?php
	class HomeAction extends CommonAction {
		
		
		
		/*产品信息*/
		public function xx(){
			$List=M();
			$SQL='SELECT * FROM `my_sping` as a join my_class as b on a.Clasid= b.id where a.id ='.$_GET['id'];
			
			$Data=$List->query($SQL);
			$SPIMG=M('spimg');

			$Res=$SPIMG->where('sp_id = '.$_GET['id'])->select();
			$this->ResImg=$Res;
			
			$Data[0]['Pre']=$Data[0]['Pre']*cookie('level');
			$this->Info=$Data;

			$this->display();
		}
		
		/*加载更多*/
		public function Loading(){
			$Result=M('sping');
			$Start=$_GET['Start'];
			if(!empty($_GET['where'])&&isset($_GET['where'])){
				$Data=$Result->where('Clasid = '.$_GET['where'])->limit('0,8')->select();
			}else{
				$Data=$Result->limit("0,8")->select();
			}
			
			if($Data==null){
				echo '0';
				exit();
			}
			
			$level=cookie('level');
			$Str='';
			foreach($Data as $item=>$val){
				$val['img']=str_replace("__ROOT__","",$val['img']);

				$Str=$Str."<dl style='margin-right:23px'>".
				"<dt><a href=".__ROOT__."/Home/Home/xx/id/{$val['id']}".">".
				
				"<img src='".__ROOT__.$val['img']."' width='225' height='225' /></a></dt>".
				"<dd>".
				"<a href='javascript:void(0)' style='color:red;font-size: 20px'>¥".$val['Pre']*$level."</a>".

				"<a href='javascript:void(0);' style='float:right' onclick=AddCatr('#Number{$val['id']}','{$val['id']}')>[加入购物车]</a>".

				"<small style='float:right'><input type='text'  name='Number".$val['id']."' style='width:20px;height:15px'>件</small>
				</dd>".
				
				"<dd>
				<a href='".__APP__."/Home/Home/xx/id/".$val['id']."' style='padding-left: 10px;padding-right: 10px'>".$val['title']."</a>
			</dd></dl>";
			}
			echo $Str;
			
		}
		
		public function AllData(){
			$Result=M('cart');
			if($Result->where('user_id ='.cookie('id'))->count()==0){
				$this->error('购物车中没有商品,请挑选商品后购买!');
				exit();
			}

			if(IS_POST!=true){
				
				$this->display('xinxi');
				exit();
			}

			$Result=M('cart');
			$Data=$Result->where('user_id = '.cookie('id'))->select();

			
			$order=time();
			
			$data=array(
			'Name'=>I('Name'),
			'Call'=>I('Call'),
			'Phone'=>I('Phone'),
			'CallTrue'=>I('CallTrue'),
			'Tm'=>I('Tm'),
			'Mail'=>I('Mail'),
			'Address'=>I('Address'),
			'ordernum'=>$order,
			'FenXiaoS'=>cookie('id'),
			);

			$Add=D('Home');
			if(!$Add->create()){
				$this->error($Add->getError());
			}else{
				$UserID=$Add->add($data);#获取订单ID;
			}

			$OrderAsGoods=M('orderasgoods');
			foreach($Data as $key=>$v){
				$data=array(
					'goods'=>$v['sp_id'],
					'goodsnum'=>$v['num'],
					'order'=>$UserID
				);
				$OrderAsGoods->add($data);
			}
			
			if($OrderAsGoods){
				$this->success('提交订单成功!为你跳转到支付页面！',U('Home/Home/SubPay',array('id'=>$Id,'UserID'=>$UserID,'Sl'=>$_GET['Number'])));
			}else{
				$this->error('请重新填写订单页面!');
			}


		}

		/*用户订单信息*/
		public function xinxi(){
			if(IS_POST!=true){

				$this->display();
				exit();
			}

			$Id=$_GET['id'];#产品ID
			
			$order=time();
			
			$data=array(
				'Name'=>I('Name'),
				'Call'=>I('Call'),
				'Phone'=>I('Phone'),
				'CallTrue'=>I('CallTrue'),
				'Tm'=>I('Tm'),
				'Mail'=>I('Mail'),
				'Address'=>I('Address'),
				'ordernum'=>$order,
				'FenXiaoS'=>cookie('id'),
			);

			$Add=D('Home');
			if(!$Add->create()){
				$this->error($Add->getError());
			}else{
				$UserID=$Add->add($data);#获取订单ID;
			}
			$OrderAsGoods=M('orderasgoods');

			$Data=  array('order' => $UserID,'goods'=>$Id,'goodsnum'=>$_GET['Number'] );
			$OrderAsGoods->add($Data);

			if($OrderAsGoods){
				$this->success('提交订单成功!为你跳转到支付页面！',U('Home/Home/SubPay',array('id'=>$Id,'UserID'=>$UserID,'Sl'=>$_GET['Number'])));
			}else{
				$this->error('请重新填写订单页面!');
			}
			
		}
		/*确认订单并支付*/
		public function SubPay(){
			
			
			$UserID=$_GET['UserID']; #获取收货人ID

			/*查询商品信息*/
			$Addres=M();
			$SQL='SELECT b.id as OrderId ,a.* ,c.* FROM `my_orderasgoods` as a join `my_dingdan` as b on a.order=b.id join `my_sping` as c on a.goods=c.id where a.order='.$UserID;
			$Info=$Addres->query($SQL);
			foreach($Info as $key=>$v){
					$Info[$key]['Pre']= $v['Pre']*cookie('level');

					$Info[$key]['Total']=$Info[$key]['Pre']*$Info[$key]['goodsnum'];
					$AllTotal=$Info[$key]['Pre']*$Info[$key]['goodsnum']+$AllTotal;
			}

			$this->AllTotal=$AllTotal;
			$this->SpInfo=$Info;
			/*查询订单信息*/
			$Result=M('dingdan');
			$this->Userinfo=$Result->where('id = '.$UserID)->select();
			$this->DingDan=$UserID;

			$this->display();
		
		}
		
		
		/*产品列表*/
		public function CpList($Start=0){
			$List=M('sping');
			
			if(isset($_GET['where'])&&!empty($_GET['where'])){
				$Res=$List->where('Clasid ='.$_GET['where'])->limit($Start.',8')->select();

			}else{
				$Res=$List->where()->limit($Start.',8')->select();
			}


			foreach($Res as $key=>$v){
				  $Res[$key]['Pre']=$Res[$key]['Pre']*cookie('level');
			}

			$ObjCls=M('class');
			$this->ClassList=$ObjCls->select();


			 
			
			
			$this->SpList=$Res;
			$this->display('index2');
		}
		
		/*礼品兑换*/
		public function ydh(){
			
			$this->display();
		}
		
		public function chenggong(){
			$this->display();
		}
		
		
		/**
		 * goods 接收商品id 
		 */
		public function ShoppingTrolley($goods=null,$Num=1){

			$Result=M('cart');
			$data=array(
				'user_id'=>cookie('id'),
				'sp_id'=>$goods,
				'num'=>$Num
				);
			if($Result->data($data)->add()){
				echo 'True';
			}else{
				echo 'fales';
			}
			
		}
		
	}
?>