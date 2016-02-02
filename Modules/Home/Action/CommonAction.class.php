<?php
class CommonAction extends BaseAction {
	public function __construct() {
		parent::__construct();
		
		if(cookie('id')==null&&cookie('username')==null){
			$this->success('你未登陆,请登录后再操作',U('Home/Index/index'));
		}
		
	}
}
?>