<?php
Class AdminViewModel extends ViewModel{
	public $viewFields = array(
		'Admin'=>array('id','username','role_id','name','tel','email','isshow','logintime','loginip','logintime','addtime'),
		'Admin_role'=>array('name'=>'role_name', '_type'=>'left','_on'=>'Admin.role_id=Admin_role.id'),
   );
}
?>