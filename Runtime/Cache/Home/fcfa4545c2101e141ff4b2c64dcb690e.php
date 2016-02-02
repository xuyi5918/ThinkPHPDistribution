<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Title();?></title>
<script type='text/javascript' src='__PUBLIC__/Home/js/jquery.js'></script>
<link href="__PUBLIC__/Home/css/style.css" type="text/css" rel="stylesheet" />
<style type="text/css">
	.Page  a{
		margin-left:20px;
		border:1px solid #CCC;
	}
	.Page .current{
	margin-left:20px;
		border:1px solid #CCC;
	}
</style>
</head>

<body>
<div class="head_bg">
<div class="head">
	<div class="logo"><img src="__PUBLIC__/Home/images/logo.jpg" width="220" height="85" /></div>
	<div class="head_tel">
		<p><span style="font-size:14px;">服务热线：</span>86-010-51297708</p>
	</div>
</div>
</div>

<div class="main">
	<div class="d_nav">您已经兑换的礼品</div>
<div class="lp_table">



<form action="<?php echo U('Home/Play/Play');?>" method='POST' name='form1'>
<table width="998" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="108" class="sp_n"> 订单ID</td>
		<td  class="sp_n">商品名称</td>
		<td  class="sp_n">描述</td>
		<td class='sp_n' width="200">订单号</td>
		<td width='100' class="sp_n">数量</td>

		
	</tr>

	<?php if(is_array($CartList)): $i = 0; $__LIST__ = $CartList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<td style="border-right:1px solid #e8e8e8;">
			<?php echo ($vo["id"]); ?>
			
		</td>
		<td width="107"><a href="__APP__/Home/Home/xx/id/<?php echo ($vo["goods"]); ?>"><img src="<?php echo ($vo["img"]); ?>" width="45" height="40" /></a></td>
		<td width="783" style="text-align:left;">
			<?php echo ($vo["title"]); ?>
		</td>
		<td>
			<?php echo ($vo["ordernum"]); ?>
			
		</td>
		<td>
			<?php echo ($vo["goodsnum"]); ?>
		</td>
		
		<td></td>
		
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>

	<tr>
		<td style="border-right:1px solid #e8e8e8;">
			
		</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td style="border-left:1px solid #e8e8e8;"></td>
	</tr>
    <tr>
    	<td  colspan="5">
        		<div class="Page"><?php echo ($show); ?></div>
        </td>		
    </tr>
</table>

</div>

<div class="lp_b">

</volist>
</form>

</div>
</div>

<div class="bottom_bg">
	<div class="bottom">
		<p> <?php echo footer();?><a href="#">北京网站建设：联合易网</a> <br />
Copyright ©2013 www. ruidexuan.com All Reserved. &nbsp;&nbsp;|&nbsp;&nbsp;京ICP备01028629号-1</p>
	</div>
</div>

</body>
</html>