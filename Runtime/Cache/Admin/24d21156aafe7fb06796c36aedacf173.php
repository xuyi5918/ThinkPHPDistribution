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
    <b>商品的列表</b>
    </div>
    <div style="float:right">
	 <button class="btn btn-mini url" type="button" style="cursor:pointer;" url="<?php echo U('add');?>"><i class="icon-plus"></i> 添加</button>
    </div>
	</td>
</tr>
<tr>

    <td width="1%" style="text-align:center">ID</td>
    <td width="10%" style="text-align:center">商品名称</td>
    <td width="8%" style="text-align:center">型号</td>
	 <td width="8%" style="text-align:center">库存</td>
    <td width="13%" style="text-align:center">操作项</td>
</tr>


<?php if(is_array($List_res)): $i = 0; $__LIST__ = $List_res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td style="text-align:center"><input type="text" value="<?php echo ($vo["id"]); ?>" style='width:30px'/></td>
    <td style="text-align:center"><?php echo ($vo["title"]); ?></td>
	<td style="text-align:center"><?php echo ($vo["model"]); ?></td>
<td style="text-align:center"><?php echo ($vo["Number"]); ?></td>
    <td style="text-align:center">
    	 <a href="__APP__/Admin/Commodity/Sping/cid/<?php echo ($vo["id"]); ?>" class="btn btn-mini"><i class="icon-edit"></i> 修改</a> 
         
          <a href="__APP__/Admin/Commodity/Del/Id/<?php echo ($vo["id"]); ?>/cid/<?php echo ($_GET['id']); ?>" class="btn btn-mini"><i class="icon-edit"></i> 删除</a> 
    </td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</tbody></table>
</div>

</body></html>