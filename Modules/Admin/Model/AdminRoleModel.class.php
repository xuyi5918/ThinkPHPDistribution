<?php
Class AdminRoleModel extends Model{
	//自动完成
	protected $_auto = array (
		array('addtime','time',1,'function'),
		array('addadmin','GetAdmin',1,'callback'),  
    	array('updatetime','time',1,'function') , //新增    对repassword在新增和修改的时候使md5函数处理 用于验证两次密码是否输入一致
		array('sort','maxSort',1,'callback'),
	);
	
	//自动验证
	protected  $_validate =array(
		array('name','require','角色名不能为空',0,'',3),				//新增和修改栏目    栏目必须选择
	);
	protected function GetAdmin(){
		return session('LOGIN_KEY');
	}
	protected function maxSort($sort)
	{
		if($sort){
			return $sort;
		}else{
			$Config=M('Admin_role');
			$sort=$Config->Max('sort');
			return $sort+1;
		}
	}
   
}

?>