<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台管理系统</title>
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap-responsive.min.css">
<script type="text/javascript" src="__PUB__js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUB__js/jquery.min.js"></script>
<script type="text/javascript" src="__PUB__js/common.js"></script>
<script type="text/javascript">
$(function(){
	$('.confirmdel').click(function(){
		var url=$(this).attr('ahref');
		var r=window.confirm('你确定要删除吗？')
		if(r==true){
			window.location=url;
		}else{
			alert('删除失败！');
		}	
	});
	$('.bak').click(function(){
		var url=$(this).attr('ahref');
		var r=window.confirm('此操作不可恢复！你确定要还原吗？')
		if(r==true){
			window.location=url;
		}else{
			alert('还原失败！');
		}	
	});
});

function selAll(){
	for(i=0;i<document.form.name.length;i++){
		if(!document.form.name[i].checked){
			document.form.name[i].checked=true;
		}
	}
}
function noSelAll(){
	for(i=0;i<document.form.name.length;i++){
		if(document.form.name[i].checked){
			document.form.name[i].checked=false;
		}
	}
}
 
</script>
</head>
<body style="margin: 10px 0px;">
<div style="margin:0 auto; width:98%;">
<table class="table table-condensed table-bordered table-hover">
  <tbody><tr>
   <td colspan="6">
    <div style="float:left">
    <b>数据库备份列表</b>
    </div>
    <div style="float:right">
     [<a href="<?php echo U('backall');?>"><u>备份整个数据库</u></a>]
    </div>
	 </td>
  </tr>
  <tr>  
      <td width="6%" style="text-align:center">选择</td>
      <td style="text-align:center">备份数据库名称</td>
      <td width="11%" style="text-align:center">数据库大小</td>
      <td width="21%" style="text-align:center">备份时间</td>
      <td width="20%" style="text-align:center">操作</td>
   </tr>
<form action="<?php echo U('form');?>" method="post" name="form">    
   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> 	  
	  <td style="text-align:center">
<input name="name[]" id="name" type="checkbox" value="<?php echo ($vo["name"]); ?>"></td>
      <td style="text-align:center"><?php echo ($vo["name"]); ?></td>
      <td style="text-align:center"><?php echo ($vo["size"]); ?></td>
      <td style="text-align:center"><?php echo ($vo["time"]); ?></td>
      <td style="text-align:center">
<a ahref="<?php echo U('recover',array('file'=>$vo['name']));?>" class="btn btn-mini bak"><i class="icon-edit"></i> 还原</a> 
<a ahref="<?php echo U('deletebak',array('file'=>$vo['name']));?>" class="btn btn-mini confirmdel"><i class="icon-trash"></i> 删除</a>
      </td>
   </tr><?php endforeach; endif; else: echo "" ;endif; ?>




<tr>
  <td colspan="6" id="pages">
<input name="all" type="button" value="全选" onClick="selAll()" class="btn btn-mini">&nbsp;
<input name="noall" type="button" value="反选" onClick="noSelAll()" class="btn btn-mini">&nbsp;
<input name="del" type="submit" class="btn btn-mini" value="删除">
</td></tr>
</form> 



</tbody></table>
</div>

</body></html>