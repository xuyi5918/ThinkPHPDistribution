<?php
	Class OrderAction Extends CommonAction{

		/*
			订单列表
		未加入回收站的订单
		*/
		public function OrderList(){
			import('ORG.Util.Page');
			$Result=M('dingdan');
			$COUNT=$Result->where('HuiShou = 1')->count();

			$Page = new Page($COUNT,25);
			$show   = $Page->show();

			$Orderlist = $Result->where('HuiShou = 1')->order('ordernum')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->List=$Orderlist;
			$this->Pages=$show;


			$this->display('OrderList');
		}

		/*显示单个订单详细*/
		public function  OrderShow(){

			$Result=M('dingdan');
			//$this->Info=$Result->where('id = '.$_GET['cid'])->select();
			$Sql='SELECT * FROM `my_dingdan` as a left join `my_usr` as b  on a.FenXiaoS=b.id  where a.id='.$_GET['cid'];

			$this->Info=$Result->query($Sql);
			$Result=M();
			$Sql='SELECT * FROM `my_orderasgoods` AS A JOIN `my_sping` AS B on A.goods=B.id  where A.order='.$_GET['cid'];

			$DATE=$Result->query($Sql);
			
			$this->SP_Info=$DATE;
			
			$this->display('Info');	
		}

		public function Huishou(){
			
			import('ORG.Util.Page');
			$Result=M('dingdan');
			$COUNT=$Result->where('HuiShou = 0')->count();

			$Page = new Page($COUNT,25);
			$show   = $Page->show();

			$Orderlist = $Result->where('HuiShou = 0')->order('ordernum')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->List=$Orderlist;
			$this->Pages=$show;


			$this->display('HuiShouOrderList');

		}	

		/*加入回收站*/
		public function Del(){

			$Result=M('dingdan');
			$Id=$_GET['id'];
			if($Result->where('id = '.$Id)->save(array('HuiShou'=>0))){
				$this->success('订单已放入回收站!',U('Huishou'));
			}else{
				$this->error('失败,返回重试!');
			}

		}

		public function HuiFu(){
			$Result=M('dingdan');
			$Id=$_GET['id'];
			if($Result->where('id = '.$Id)->save(array('HuiShou'=>1))){
				$this->success('订单已恢复!',U('Huishou'));
			}else{
				$this->error('失败,返回重试!');
			}
		}

		public function DeleteData(){
			$Result=M('orderasgoods');
			$List=$Result->where('`order` ='.$_GET['id'])->delete();
			$Result=M('dingdan');
			if($Result->where('`id` ='.$_GET['Id'])->delete()){
				$this->success('已经彻底删除订单!',U('Huishou'));
			}else{
				$this->error('失败,请重试!');
			}
			
		}
	}