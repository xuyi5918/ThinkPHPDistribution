<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>管理员|后台管理系统</title>
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap-responsive.min.css">
<script type="text/javascript" src="__PUB__js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUB__js/jquery.min.js"></script>
<script type="text/javascript" src="__PUB__js/common.js"></script>
<script type="text/javascript" src="__PUB__js/globe.js"></script>
</head>
<body style="margin: 10px 0px;">
<div style="margin:0 auto; width:98%;">
<table class="table table-condensed table-bordered table-hover">
<tbody><tr>
	<td colspan="5" style="padding-left:10px;">
	<div style="float:left">
    <b>角色管理</b>
    </div>
    <div style="float:right">
	 <button class="btn btn-mini url" type="button" style="cursor:pointer;" url="<?php echo U('roleadd');?>"><i class="icon-plus"></i> 添加</button>
    </div>
	</td>
</tr>
<tr>
    <td width="4%" style="text-align:center">排序</td>
    <td width="25%" style="text-align:center">角色名称</td>
    <td width="15%" style="text-align:center">管理员数量</td>
    <td width="10%" style="text-align:center">状态</td>
    <td style="text-align:center">操作项</td>
</tr>
<?php if(is_array($lists)): $k = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
		<td style="text-align:center"><?php echo ($k); ?></td>
		<td style="text-align:center"><?php echo ($vo["name"]); ?></td>
		<td style="text-align:center"><?php echo ($vo["num"]); ?></td>
		<td style="text-align:center">
			<a href="<?php echo U('roleshow',array('tid'=>I('tid'),'id'=>$vo['id'],'p'=>I('p')));?>" class="btn btn-mini <?php if(($vo["id"]) == "1"): ?>no_a<?php endif; ?>">
				<?php if($vo['isshow'] == 1 ): ?><i class="icon-ok"></i>
				<?php else: ?>
					<i class="icon-no"></i><?php endif; ?>
			</a>   
		</td>
		<td style="text-align:center">
			<a href="<?php echo U('auth',array('id'=>$vo['id']));?>" class="btn btn-mini <?php if(($vo["id"]) == "1"): ?>no_a<?php endif; ?>"><i class="icon-edit"></i> 功能授权</a>
			<a href="<?php echo U('authcat',array('id'=>$vo['id']));?>" class="btn btn-mini <?php if(($vo["id"]) == "1"): ?>no_a<?php endif; ?>"><i class="icon-edit"></i> 内容授权</a> 
			<a href="<?php echo U('roleedit',array('id'=>$vo['id']));?>" class="btn btn-mini <?php if(($vo["id"]) == "1"): ?>no_a<?php endif; ?>"><i class="icon-edit"></i> 编辑</a>
			<a href="<?php echo U('roledelete',array('id'=>$vo['id']));?>" class="btn btn-mini <?php if(($vo["id"]) == "1"): ?>no_a<?php endif; ?>"><i class="icon-trash"></i> 删除</a>
		</td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>

</tbody></table>
</div>

</body></html>