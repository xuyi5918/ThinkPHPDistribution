<?php
Class AdminModel extends Model{
	public $sign='';
	public function __construct() {
		parent::__construct();
		$this->sign=randCode(5);
	}
	//自动完成
	protected $_auto = array (
    	array('addtime','time',1,'function'),// 新增 	   	     对time字段在新增的时候写入当前时间戳ltime
		array('logintime','time',1,'function'),
		array('loginip','GETip',1,'callback'),  
    	array('updatetime','time',3,'function'),  // 新增和修改 	 对optime字段 写入当前时间戳
		array('password','md5sign',1,'callback'),
		array('password2','md5sign',1,'callback'),
		array('sign','GetSign',1,'callback'),		
    	array('addadmin','GetAdmin',1,'callback'), //新增 
	);
	
	//自动验证
	protected  $_validate =array(
		array('username','require','登录名不能为空',0,'',3),				//新增和修改栏目    栏目必须选择
		array('username','','登录名已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		array('password','require','密码不能为空',0,'',1),	//
		array('password','/^.{5,}$/','密码必须5位数以上',0,'regex',1),  	//新增和修改用户	密码必须5位数以上
		
		array('password2','password','两次密码不一致',0,'confirm',3),		//新增和修改用户	确认密码不正确
		array('role','require','请选择角色',0,'',3),
		array('name','require','名称必须填写',0,'',3),				//新增和修改标题    标题必须填写
	);
	protected function GETip(){
		return $_SERVER['REMOTE_ADDR'];
	}
	protected function GetAdmin(){
		return session('LOGIN_KEY');
	}
	protected function GetSign(){
		return $this->sign;
	}
	protected function md5sign($password){
		return md5($password.$this->sign);
	}
   
}

?>