<?php
Class AdminAction extends CommonAction{

	public $tab='Admin';
	public $rotab='AdminRole';
	public $tabview='AdminView';
	
	/*public function __construct() {
		parent::__construct();

		$this->tab='Admin';
		$this->rotab='Role';
	}*/
	
	public function index(){		
		$Admin=D($this->tabview);
		
		$map['id']=array('neq',1);
		$info=$this->_List($Admin,$map,'','',20);
		
		$this->assign('page',$info['page']);
		$this->assign('lists',$info['listinfo']);
		
		$this->display();
	}
	
/**
 * 添加管理员
**/		
	public function add(){
		$Admin=D($this->tab);
		$Role=D($this->rotab);
		if($this->isPost()){
			if(!$Admin->create()){
				$this->error($Admin->getError());
			}else{
				$lastid=$Admin->add();
				if($lastid){
					$this->success('系统用户添加成功',U('Admin/index'));
				}else{
					$this->error('系统用户添加失败');
				}
			}
		}else{
			$list_role=$Role->where('isshow=1')->order('sort asc , id asc')->select();
			$this->assign('list_role',$list_role);
			$this->display(); 
		}
	}
	
/**
 * 编辑管理员
**/		
	public function  edit(){		
		$Admin=D($this->tab);
		$Role=D($this->rotab);
		$data=$Admin->where('id='.I('id'))->find();
		if($this->isPost()){
			
			if(!I('password')){
				unset($_POST['password']);
				unset($_POST['password2']);
			}else{
				$_POST['sign']=$sign=randCode(5);
				if(I('password')!=I('password2')){
					$this->error('两次密码不一致');
				}
				$_POST['password']=md5(I('password').$sign);
				$_POST['password2']=md5(I('password2').$sign);
			}
		
			//添加用户
			if(!$Admin->create()){
				$this->error($Admin->getError());
			}else{
				$lastid=$Admin->where('id='.I('id'))->save();
				if($lastid>0){
					$this->success('系统用户添加成功',U('index'));
				}else{
					$this->error('系统用户添加失败');
				}
			}
		}else{
			$list_role=$Role->where('isshow=1')->order('sort asc , id asc')->select();
			$this->assign('list_role',$list_role);
			$this->assign('data',$data);
			$this->display(); 
		}
	}
	
/**
 * 更改管理员状态
**/	
	public function show(){		
		$Role=D($this->tab);
		if(I('id')==1 || I('id')==2){
			$this->error('不允许该操作！');
		}
		$mmap['id']=array('eq',I('id'));
		$is=$Role->where($mmap)->getField('isshow');
		if($is==1){
			$status=0;
		}else{
			$status=1;
		}
		$aa=$Role->where('id='.I('id'))->setField('isshow',$status);
		if($aa){
			//同时删除内容
			$this->success('更改成功！',U('index'));
		}else{
			$this->error('更改失败！');
		}
	}
	
	public function delete(){		
		$where['id']=I('id');
		$Admin=D($this->tab);
		$data=$Admin->where($where)->find();
		if($data['id']==1 || $data['id']==$_SESSION['ADMIN_KEY']['id']){
			$this->error('不允许删除当前使用的管理员帐号');
		}else{
			$count=$Admin->where($where)->delete();
			if($count){
				$this->success('管理员删除成功',U('Admin/index'));
			}else{
				$this->error('管理员删除失败');
			}
		}
	}
	
/**
 * 管理员角色列表
**/	
	public function role(){		
		$role=M($this->rotab);
		$admin=M($this->tab);

		$lists=$this->_Lists($role,'','','sort asc, id asc');
		
		foreach($lists as $k=>$v){
			$lists[$k]['num']=$admin->where('role_id='.$v['id'])->count();
		}
		$this->assign('lists',$lists);
		$this->display(); 
	}

/**
 * 添加管理员角色
**/		
	public function roleadd(){
		$Role=D($this->rotab);
		if($this->isPost()){
			//添加用户
			if(!$Role->create()){
				$this->error($Role->getError());
			}else{
				$lastid=$Role->add();
				if($lastid>0){
					$this->success('系统用户添加成功',U('role'));
				}else{
					$this->error('系统用户添加失败');
				}
			}
		}else{
			$this->display(); 
		}
	}

/**
 * 编辑管理员角色
**/	
	public function  roleedit(){
		$Role=D($this->rotab);
		$data=$Role->where('id='.I('id'))->find();
		if($this->isPost()){

			if(!$Role->create()){
				$this->error($Role->getError());
			}else{
				$lastid=$Role->where('id='.I('id'))->save();
				if($lastid>0){
					$this->success('系统用户添加成功',U('role'));
				}else{
					$this->error('系统用户添加失败');
				}
			}
		}else{
			$this->assign('data',$data);
			$this->display(); 
		}
	}
	
/**
 * 更改管理员角色状态
**/	
	public function roleshow(){		
		$Role=D($this->rotab);
		if(I('id')==1){
			$this->error('不允许该操作！');
		}
		$mmap['id']=array('eq',I('id'));
		$is=$Role->where($mmap)->getField('isshow');
		if($is==1){
			$status=0;
		}else{
			$status=1;
		}
		$aa=$Role->where('id='.I('id'))->setField('isshow',$status);
		if($aa){
			//同时删除内容
			$this->success('更改成功！',U('role',array('tid'=>I('tid'),'p'=>I('p'))));
		}else{
			$this->error('更改失败！');
		}
	}

/**
 * 删除管理员角色
**/	
	public function roledelete(){
		$Role=D($this->rotab);
		$Admin=D($this->tab);
		if(I('id')==1){
			$this->error('删除失败！');
		}
		$mmap['id']=array('eq',I('id'));
		$aa=$Role->where($mmap)->delete();
		if($aa){
			$Admin->where(array('role_id'=>array('eq',I('id'))))->setField('isshow',0);
			$this->success('删除成功！',U('role'));
		}else{
			$this->error('删除失败！');
		}
	}
	
	
	
	public function auth(){
		$Role=D($this->rotab);
		$role=$Role->where('id='.I('id'))->find();
		$role_all=explode(',',$role['rules']);
		$da=M('AuthRule')->where()->select();
		foreach($da as $k=>$v){
			$data[$v['auth']]['list'][]=$v;		
			if(!$data[$v['auth']]['key']){
				$data[$v['auth']]['key']=$v['auth'];
			}
		}
		foreach($data as $k=>$v){
			foreach($v['list'] as $key=>$val){
				if(in_array($val['id'],$role_all)){
					$data[$k]['list'][$key]['is']=1;
				}else{
					$data[$k]['list'][$key]['is']=0;
				}
			}
		}		
		if($this->isPost()){
		
		}else{
			$this->assign('data',$data);
			$this->assign('role_all',$role_all);
			$this->display(); 
		}
	}
}
?>