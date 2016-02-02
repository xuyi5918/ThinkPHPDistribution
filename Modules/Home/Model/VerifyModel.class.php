<?php

	class VerifyModel Extends Model{
		
		protected $tableName='usr';
		protected $_validate=array(
			array('verify','require','验证码必须！'),#验证码验证
		);
		
		public function UserPassVerify($data){
			
			return $this->where($data)->getField('id');
		
		}
	}