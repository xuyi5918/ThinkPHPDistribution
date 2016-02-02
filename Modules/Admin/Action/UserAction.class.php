<?php 
	class UserAction Extends CommonAction{
	
		/*会员等级*/
		public function UserLevel(){
			
			if(IS_POST!=true){
				$this->display('UserRege');
				exit();
			}
			
			$Result=M('viplevel');
			$data=array(
				'vipname'=>I('vipname'),
				'viplevel'=>I('level'),
				'yuan'=>I('yuan'),
				'scores'=>I('scores')
			);
			
			if($Result->data($data)->add()){
				$this->success('增加会员等级成功!',U('UserLevel'));
			}else{
				$this->error('增加会员等级失败!');
			}
			
			
			
		}
		/*等级列表*/
		public function LevelList(){
			$Result=M('viplevel');
			$DATE=$Result->select();
			$this->LevelList=$DATE;
			
			$this->display('LevelList');
			
		}
		/*修改会员等级*/
		public function Save(){
			if(IS_POST!=true){
				$Result=M('viplevel');
				$Id=$_GET['Id'];
				$this->UserInfo=$Result->where('id = '.$Id)->select();
				$this->display('UserSave');
				exit();
			}
			
			$Id=$_POST['Id'];
			$Result=M('viplevel');
			$data=array(
				'vipname'=>I('vipname'),
				'viplevel'=>I('level'),
				'yuan'=>I('yuan'),
				'scores'=>I('scores'),
			);
			
			if($Result->where('id = '.$Id)->save($data)){
				$this->success('修改会员等级成功!',U('LevelList'));
			}else{
				$this->error('修改会员等级失败!');
			}
		}
		
		public function Del(){
			$Result=M('viplevel');
			$Id=$_GET['Id'];
			
			if($Result->where('id = '.$Id)->delete()){
				$this->success('删除会员等级成功!',U('LevelList'));
			}else{
				$this->error('删除会员等级失败!');
			}
		}
		/*添加会员*/
		public function AddUser(){
		
			if(IS_POST!=true){
				$Result=M('viplevel');
				$this->LevelList=$Result->select();
				$this->display('UserAdd');
				exit();
			}
			$Res=D('Usr');
		
			
			if(!$Res->create()){
			
				$this->error($Res->getError());
			}
		
			
			$data=array(
				'username'=>I('username'),
				'password'=>md5(I('Password')),
				'coompy'=>I('Coompy'),
				'level'=>I('level'),
			);

			$UserId=$Res->add($data);
			
			if($UserId){
				/*写入用户信息*/
				$data=array(
					'xsg'=>I('xsg'),
					'count'=>I('Cont'),
					'pay'=>I('pre'),
					'jf'=>I('jf'),
					'web'=>I('wz'),
					'phone'=>I('phone'),
					'qq'=>I('qq'),
					'address'=>I('address'),
					'maill'=>I('mail'),
					'usrid'=>$UserId,
				);
			
				
				$AddInfo=M('userinfo');
				if($AddInfo->add($data)){
					$this->success('会员增加成功!',U('UserList'));
				}else{
					$this->error('会员增加失败!');
				}
			
				
			}
		}
		/*删除会员*/
		public function UserDel(){
			$Result=M('usr');
			$Id=$_GET['Id'];
			
			if($Result->where('id = '.$Id)->delete()){
				$UserInfo=M('userinfo');
				if($UserInfo->where('usrid = '.$Id)->delete()){
					$this->success('会员删除成功!',U('UserList'));
				}else{
					$this->error('会员删除失败!');
				}
			}else{
				$this->error('会员删除失败');
			}
		}
		/*将会员放入回收站*/
		public function lock(){
			$Result=M('usr');
			$Id=$_GET['Id'];
			$data=array('lock'=>0); #锁定
			if($Result->where('id = '.$Id)->data($data)->save()){
				$this->success('会员放入回收站!',U('UserList'));
			}else{
				$this->error('会员放入回收站失败!');
			}
		}
		
		/*回收站中的用户*/
		public function huishou(){
			$Result=M('');
			$this->UserList=$Result->
			query('SELECT a.id as id ,a.username as name, b.vipname FROM `my_usr` AS a join my_viplevel as b on a.level = b.id where a.lock=0');
			$this->display('LockUserList');
			
		}
		/*用户列表*/
		public function UserList(){
			
			$Result=M('');
			$this->UserList=$Result->
			query('SELECT a.id as id ,a.username as name, b.vipname FROM `my_usr` AS a join my_viplevel as b on a.level = b.id where a.lock=1');
			$this->display('UserList');
		}
		
		/*修改用户信息*/
		public function UserSave(){
			if(IS_POST!=true){
				$Result=M('');
				$Id=$_GET['Id'];
				$SQL="SELECT a.id as cid ,a.*,b.* ,c.* from `my_usr` as a join my_viplevel as b on a.level=b.id join my_userinfo as c on a.id=c.usrid  where a.id=".$Id;
				
				$this->SaveInfo=$Result->query($SQL);
				
			
				$Result=M('viplevel');
				$DATE=$Result->select();
				$this->LevelList=$DATE;
				$this->display('UserInfoSave');
				exit();
			}
			
			
			/*修改会员信息*/
				$Res=D('Usr');
		
			
			if(!$Res->create()){
			
				$this->error($Res->getError());
			}
		
			
			$data=array(
				'username'=>I('username'),
				'password'=>md5(I('Password')),
				'coompy'=>I('Coompy'),
				'level'=>I('level'),
			);

			$UserId=$Res->where('id = '.I('id'))->save($data);
			
			
				/*写入用户信息*/
				$data=array(
					'xsg'=>I('xsg'),
					'count'=>I('Cont'),
					'pay'=>I('pre'),
					'jf'=>I('jf'),
					'web'=>I('wz'),
					'phone'=>I('phone'),
					'qq'=>I('qq'),
					'address'=>I('address'),
					'maill'=>I('mail'),
					'usrid'=>I('id'),
				);
				$AddInfo=M('userinfo');
				$Res=$AddInfo->where('usrid = '.I('id'))->save($data);
				
				if($Res||$UserId){
					$this->success('会员修改成功!',U('UserList'));
				}else{
					$this->error('会员修改失败!');
				}
			
				
			
			
			
			/*Ｅｎｄ*/
			
			
		}
		
	}
	
	
	
	
	
	
	
	