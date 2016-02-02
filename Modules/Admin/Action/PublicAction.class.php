<?php
// 本类由系统自动生成，仅供测试用途
class PublicAction extends BaseAction {
	protected $LOGIN_KEY='';		//管理员的id
	protected $LOGIN_TIME='';		//登录时间

	private $admin='Admin';			//管理员表
	private $role='Admin_role';		//管理员角色表

	public function __construct() {
		parent::__construct();
		$this->LOGIN_KEY=session('LOGIN_KEY');
		$this->LOGIN_TIME=session('LOGIN_TIME');
	}
     public function login(){
		$LOGIN_KEY=$this->LOGIN_KEY;
		if (isset($LOGIN_KEY)) {
			$this->redirect('Index/index');
		}
		if(IS_POST){
			if(!I('username')){
				$this->error('帐号不可以为空！');
			}
			if(!I('password')) {
				$this->error('密码不可以为空！');
			}
			if(session('verify') != md5(I('verify'))) {
				$this->error('验证码错误！');
			}
			$tabadmin_map['username']=array('eq',I('username'));
			$tabadmin_map['isshow']=array('eq',1);
			$tabadmin=M($this->admin)->where($tabadmin_map)->find();
			if($tabadmin){
				if($tabadmin['role_id']>0){//普通管理员 需要进行角色验证
					$role_map['id']=array('eq',$tabadmin['role_id']);
					$role_map['isshow']=array('eq',1);
					$role=M($this->role)->where($role_map)->find();
					if(!$role){
						$this->error("帐号不存在或者被禁用！");
						exit;
					}
				}
				$tabadmin_map['password']=array('eq',md5(I('password').$tabadmin['sign']));
					
				$tab_admin=M($this->admin)->where($tabadmin_map)->find();
				if($tab_admin){
					session('LOGIN_KEY',$tab_admin['id']);
					session('LOGIN_TIME',time());
					
					session('LOGIN_UPIP',$tab_admin['loginip']);
					session('LOGIN_UPTIME',$tab_admin['logintime']);
					
					$Ad=M($this->admin);
					$Ad->logintime = time();
					$Ad->loginip = $_SERVER['REMOTE_ADDR'];
					$Ad->updatetime = time();
					$Ad->where('id='.$tab_admin['id'])->save(); // 根据条件保存修改的数据
					$this->success("登录成功!",U('Index/index'));
				}else{
					$this->error("帐号不存在或者密码错误！");
				}
			}else{
				$this->error("帐号不存在或者被禁用！");
			}
		}else{
			$this->display();
		}
	}
	
	public function index(){
		$this->redirect('Public/login');
	}
	//验证码类
	public function verify() {
		//ob_clean();
		import ( "ORG.Util.Image" );                 
		Image::buildImageVerify (4,1,'png',105,46);    
	}
	
}