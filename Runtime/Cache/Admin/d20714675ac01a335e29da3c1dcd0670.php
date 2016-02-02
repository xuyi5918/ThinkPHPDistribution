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
	<td colspan="9" style="padding-left:10px;">
	<div style="float:left">
    <b>管理员列表</b>
    </div>
    <div style="float:right">
	 <button class="btn btn-mini url" type="button" style="cursor:pointer;" url="<?php echo U('');?>"><i class="icon-plus"></i> 添加</button>
    </div>
	</td>
</tr>
<tr>
    <td width="4%" style="text-align:center">排序</td>
    <td width="10%" style="text-align:center">用户名称</td>
    <td width="8%" style="text-align:center">姓名</td>
    <td width="15%" style="text-align:center">最后一次登录时间</td>
    <td width="15%" style="text-align:center">最后一次登录IP</td>
    <td width="20%" style="text-align:center">电话/邮箱</td>
    <td width="10%" style="text-align:center">角色</td>
    <td width="5%" style="text-align:center">状态</td>
    <td width="13%" style="text-align:center">操作项</td>
</tr>
<?php if(is_array($lists)): $k = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
	<td style="text-align:center"><?php echo ($k); ?></td>
	<td style="text-align:center"><?php echo ($vo["username"]); ?></td>
    <td style="text-align:center"><?php echo ($vo["name"]); ?></td>
    <td style="text-align:center"><?php echo (date('Y-m-d',$vo["logintime"])); ?></td>
	<td style="text-align:center"><?php echo ($vo["loginip"]); ?></td>
    <td style="text-align:center"><?php echo ($vo["tel"]); ?><br><?php echo ($vo["email"]); ?></td>
    <td style="text-align:center"><?php echo ($vo["role_name"]); ?></td>
	<td style="text-align:center">
		<a href="<?php echo U('show',array('tid'=>I('tid'),'id'=>$vo['id'],'p'=>I('p')));?>" class="btn btn-mini <?php if(($vo["id"]) == "2"): ?>no_a<?php endif; ?>">
			<?php if($vo['isshow'] == 1 ): ?><i class="icon-ok"></i>
			<?php else: ?>
				<i class="icon-no"></i><?php endif; ?>
		</a>   
	</td>
		
    <td style="text-align:center">
    <a href="<?php echo U('edit',array('id'=>$vo['id']));?>" class="btn btn-mini"><i class="icon-edit"></i> 修改</a> 
	<a href="<?php echo U('delete',array('id'=>$vo['id']));?>" class="btn btn-mini <?php if(($vo["id"]) == "2"): ?>no_a<?php endif; ?>"><i class="icon-trash"></i> 删除</a>
    </td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</tbody></table>
</div>

</body></html>