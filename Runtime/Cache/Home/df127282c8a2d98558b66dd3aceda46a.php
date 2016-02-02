<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>北京瑞德轩科贸有限公司</title>
<link href="__PUBLIC__/Home/css/style.css" type="text/css" rel="stylesheet" />
<script type='text/javascript' >
	function Submit(){
		document.form1.submit();
	}
</script>
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
	<div class="d_nav">您确认兑换的礼品</div>
<div class="lp_table">


<form action="<?php echo U('Home/Play/Play');?>" method='POST' name='form1'>
<table width="998" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="108" class="sp_n">商品编号</td>
		<td  class="sp_n">商品名称</td>
		<td  class="sp_n">描述</td>
		<td width='100' class="sp_n">单价</td>
		<td width='100' class="sp_n">数量</td>
		<td width='100' class='sp_n'>总价</td>

		<td width='160' class="sp_n">总价(总金额)</td>
	</tr>

	<?php if(is_array($SpInfo)): $i = 0; $__LIST__ = $SpInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<td style="border-right:1px solid #e8e8e8;">
			<?php echo ($vo["id"]); ?>
			<input type="hidden" name='Id[]' value='<?php echo ($vo["id"]); ?>'/>
		</td>
		<td width="107"><img src="<?php echo ($vo["img"]); ?>" width="45" height="40" /></td>
		<td width="783" style="text-align:left;">
			<?php echo ($vo["title"]); ?>
			
			
		</td>

		<td>
			<?php echo ($vo["Pre"]); ?>元
		</td>
		<td>
			<?php echo ($vo["goodsnum"]); ?>
		</td>

		<td>
			<?php echo ($vo["Total"]); ?>元

		</td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	<tr>
		<td style="border-right:1px solid #e8e8e8;">
			
		</td>
		
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td><?php echo ($AllTotal); ?>元			
			<input type="hidden" name='AllTotal' value='<?php echo ($AllTotal); ?>' />
</td>
		<td style="border-left:1px solid #e8e8e8;"></td>
	</tr>

</table>

</div>
<div class="d_nav">配送信息</div>

<?php if(is_array($Userinfo)): $i = 0; $__LIST__ = $Userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="ps_box">
<input type="hidden" name='OrderId' value='<?php echo ($_GET['UserID']); ?>'>
<p>收 货 人： <?php echo ($vo["Name"]); ?><br />
固定电话： <?php echo ($vo["Call"]); ?><br />
手    机： <?php echo ($vo["Phone"]); ?><br />
传    真： <?php echo ($vo["CallTrue"]); ?><br />
  E-mail： <?php echo ($vo["Mail"]); ?><br />
     Q Q： <?php echo ($vo["Tm"]); ?><br />
收货地址： <?php echo ($vo["Address"]); ?></p>
<input type='hidden' value='<?php echo ($vo["ordernum"]); ?>' name='trade_no'/> <!--订单号-->

</div>
<div class="lp_b">
<table width="1000" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="671"><a href="javascript:void(0);" onclick='Submit();'><img src="__PUBLIC__/Home/images/qr.jpg" width="61" height="21" /></a></td>
		<td width="329"><img src="__PUBLIC__/Home/images/tel.jpg" width="329" height="35" /></td>
	</tr>
</table><?php endforeach; endif; else: echo "" ;endif; ?>
</form>

</div>
</div>

<div class="bottom_bg">
	<div class="bottom">
		<p> <a href="#">北京网站建设：联合易网</a> <br />
Copyright ©2013 www. ruidexuan.com All Reserved. &nbsp;&nbsp;|&nbsp;&nbsp;京ICP备01028629号-1</p>
	</div>
</div>

</body>
</html>