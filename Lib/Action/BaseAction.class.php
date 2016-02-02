<?php
class BaseAction extends Action {
	public function __construct() {
		parent::__construct();
		header('Content-Type:text/html; charset=utf-8');
	}
    public function index(){
		
    }
	protected function _List($model,$map='',$fields='*',$orderby='id desc',$listRows=0,$pageClass='Pages'){
		$listRows = $listRows?$listRows:10;
    	$c_model=clone $model;
		$count = $c_model->where($map)->count('*');
		if ($count>0){
			import('ORG.Util.'.$pageClass);
			$Page = new Pages($count,$listRows);
			$nowPage  = isset($_GET['p'])?$_GET['p']:1;
			$list = $model->order($orderby)->where($map)->page($nowPage.','.$Page->listRows)->select();
			//echo $model->getLastSql();
			$page = $Page->show();
			return array('listinfo'=>$list,'page'=>$page,'result_count'=>intval($count));
		}
	}
	protected function _Lists($model,$map='',$fields='*',$orderby='id desc',$listRows=0){
		$c_model=clone $model;
		if($listRows>0){
			$listd=$model->where($map)->order($orderby)->field($fields)->limit($listRows)->select();
		}else{
			$listd=$model->where($map)->order($orderby)->field($fields)->select();
		}
		return $listd;
	}
}
?>