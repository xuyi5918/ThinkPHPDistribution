<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>管理员|后台管理系统</title>
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap-responsive.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/NewCss.css"/>
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
    <b>订单的列表</b>
    </div>
    <div style="float:right">
	 
    </div>
	</td>
</tr>
<tr>

    <td width="1%" style="text-align:center">ID</td>
    <td width="10%" style="text-align:center">收货人</td>
    <td width="8%" style="text-align:center">订单号</td>
	 <td width="8%" style="text-align:center">是否付款</td>
    <td width="13%" style="text-align:center">操作项</td>
</tr>


<?php if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td style="text-align:center"><input type="text" value="<?php echo ($vo["id"]); ?>" style='width:30px'/></td>
    <td style="text-align:center"><?php echo ($vo["Name"]); ?></td>
	<td style="text-align:center"><?php echo ($vo["ordernum"]); ?></td>
<td style="text-align:center">
        <?php if($vo["Pay"] == 0): ?>未付款<?php else: ?>已付款<?php endif; ?>

</td>
    <td style="text-align:center">
    	 <a href="__APP__/Admin/Order/OrderShow/cid/<?php echo ($vo["id"]); ?>" class="btn btn-mini"><i class="icon-edit"></i> 详细</a> 
         
          <a href="__APP__/Admin/Order/Del/id/<?php echo ($vo["id"]); ?>/" class="btn btn-mini"><i class="icon-edit"></i> 删除</a> 
    </td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
<tr>
    <td colspan='5'><?php echo ($Pages); ?></td>
</tr>
</tbody></table>
</div>

</body></html>