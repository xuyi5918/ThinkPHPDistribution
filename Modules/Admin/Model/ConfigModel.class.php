<?php
Class ConfigModel extends Model{
	protected $_auto = array (
		array('updatetime','time',1,'function'),    // 新增 	   	 对regtime字段在新增的时候写入当前时间戳
		array('sort','maxSort',1,'callback'),
	);
	protected  $_validate =array(
		array('cfg','require','变量名必须填写',0,'',1),			//新增  	变量名必须填写
		array('name','require','名称必须填写',0,'',1),				//新增  	参数说明必须填写
		array('cfg','checkName','变量名已经存在',0,'callback',1),//新增 		变量名是否存在
	);
	protected function checkName($cfg)
	{
		$Config=M('Config');
		$where['cfg']=$cfg;
		$count=$Config->where($where)->count();
		if($count>0)
			return false;
		else
			return ture;
	}
	protected function maxSort($sort)
	{
		if($sort){
			return $sort;
		}else{
			$Config=M('Config');
			$sort=$Config->Max('sort');
			return $sort+1;
		}
	}
}
?>