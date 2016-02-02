<?php
	
	/*递归排序库存分类*/
	function  Recursive($data,$pid=0,$level=0){
		$StatArray=array();
		foreach($data as $itme){
			if($itme['pid']==$pid){
				$itme['html']=str_repeat('-',$level);
				$itme['level']=$level;
				$Stat[]=$itme;
				$StatArray=array_merge($Stat,Recursive($data,$itme['id'],$level+1));
			}
		}
		return $StatArray;
	}
?>
