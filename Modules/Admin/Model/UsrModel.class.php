<?php

	class UsrModel extends Model{
		
		protected $_validate=array(
			array("username",'','帐号名称已经存在！',0,'unique',1), 
		);
		
	}