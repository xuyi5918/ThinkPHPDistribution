<?php
	
	Class PlayAction Extends Action{
		
	//在类初始化方法中，引入相关类库    
       public function _initialize() {
				vendor('Alipay.Corefunction');
				vendor('Alipay.Md5function');
				vendor('Alipay.Notify');
				vendor('Alipay.Submit');    
		}
		/*
			更新预存资金
		*/
		public function Update($Pre,$Num,$OrderData){
			
			$Result=M('userinfo');
			$Result->where('usrid = '.cookie('id'))->setDec('pay',$Pre);#减少预付金
			$Data=$Pre/cookie('yuan');
			$Data=(int)$Data;
			$score=(int)cookie('scores');
			$Result->where('usrid = '.cookie('id'))->setInc('jf', $Data*$score);#增加积分

			$Result->where('usrid = '.cookie('id'))->setInc('xsg',$Pre);#增加销售额
			$Result->where('usrid = '.cookie('id'))->setInc('count',$Num);#增加销售量
			
			$Pay=M('dingdan');
			$True=$Pay->where('id ='.$OrderData)->data(array('Pay'=>1))->save();
			$Pay->where('id ='.$OrderData)->data(array('countpre'=>$Pre))->save();
			
			 if($True){
			 	$Result=M('cart');
			 	$Result->where('user_id = '.cookie('id'))->delete(); #清空购物车
			 	$this->success('付款成功',U('PayOK'));
			 
			 }
			
			
			
		}

		public function PayOk(){
			$this->display('chenggong');
			sleep(8);
			$this->redirect('Home/Home/CpList');

		}
		/*减少库存*/
		public function JsNumber($id){
			$Result=M('orderasgoods');
			$Data=$Result->where('`order` = '.$id)->select();
			$Save=M('sping');
			foreach($Data as $key=>$v){
				$Save->where('id ='.$v['goods'])->setDec('Number',$v['goodsnum']);
			}
		}
		public function Play(){

				$Order=M('orderasgoods');
				$Res=$Order->where('`order` = '.I('OrderId'))->select();
				
				$Result=M('userinfo');
				$Data=$Result->where('usrid ='.cookie('id'))->select();


				if($Data[0]['pay']>I('AllTotal')){
					$Num=0;
					foreach ($Res as $key => $value) {
						$Num=$Num+$value['goodsnum'];
					}
				}
				$Pre=I('AllTotal');
				if($Data[0]['pay']>$Pre){
					$this->JsNumber(I('OrderId'));
					$this->Update($Pre,$Num,I('OrderId'));
				}
				
		
	}


}