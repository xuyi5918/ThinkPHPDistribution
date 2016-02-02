<?php
class CommonAction extends BaseAction {
	protected $LOGIN_KEY='';		//管理员的id
	protected $LOGIN_TIME='';		//登录时间
	protected $LOGIN_TIMEOUT=3600;		//登录超时时间
	public function __construct() {
		parent::__construct();
		$this->LOGIN_KEY=session('LOGIN_KEY');
		$this->LOGIN_TIME=session('LOGIN_TIME');
		$this->checkAdminSession();
	}
	
	/**
	 * 检测登录是否超时
	**/
	private function checkAdminSession() {
		$LOGIN_KEY=$this->LOGIN_KEY;
		if (!isset($LOGIN_KEY)) {
			$this->redirect('Public/login');
		}
		//设置超时为60分
		$nowtime = time();
		$s_time = $this->LOGIN_TIME;
		if (($nowtime - $s_time) > $this->LOGIN_TIMEOUT) {
			session('LOGIN_KEY',null);
			session('LOGIN_TIME',null);
			echo '<script>alert("当前用户未登录或登录超时，请重新登录");top.location.href="'.U('Public/login').'";</script>';
		} else {
			session('LOGIN_TIME',$nowtime);
		}
	}

	/**
	 * 退出登录
	**/	
	public function outlogin(){
		session('LOGIN_KEY',null);
		session('LOGIN_TIME',null);
		echo '<script>alert("退出成功!");top.location.href="'.U('Public/login').'";</script>';
	}
}
?>