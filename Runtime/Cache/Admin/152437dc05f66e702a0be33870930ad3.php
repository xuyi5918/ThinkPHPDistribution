<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>后台管理系统</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap-responsive.min.css">
<script type="text/javascript" src="__PUB__js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUB__js/jquery.min.js"></script>
<script type="text/javascript" src="__PUB__js/common.js"></script>


</head>
<body style="margin: 10px 0px;">
<div style="margin:0 auto; width:98%;">
<form name="form" action="" method="post">
<table class="table table-condensed table-bordered table-hover">
<tbody><tr>
	<td colspan="2" style="padding-left:10px;">
	<div style="float:left">
    <b>添加管理员</b>
    </div>
    <div style="float:right">
     [<a href="<?php echo U('index');?>"><u>返回列表</u></a>]
    </div>
	</td>
</tr>
<tr>
	<td height="26" align="right" class="bline" style="padding-left:10px; text-align:right"><font color="red">登陆账号：</font></td>
	<td class="bline"><input name="username" type="text" id="username" size="30" class="iptxt" value="<?php echo ($data["username"]); ?>"></td>
</tr>
<tr>
	<td height="26" align="right" class="bline" style="padding-left:10px; text-align:right"><font color="red">姓名：</font></td>
	<td class="bline"><input name="name" type="text" id="name" size="30" class="iptxt" value="<?php echo ($data["name"]); ?>"></td>
</tr>
<tr>
	<td height="26" align="right" class="bline" style="padding-left:10px; text-align:right"><font color="red">角色：</font></td>
	<td class="bline">
		<select name="role_id" id="role" style="width:200px">
			<?php if(is_array($list_role)): $i = 0; $__LIST__ = $list_role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo['id'] == $data['role_id']): ?>selected<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
	</td>
</tr>


<tr>
	<td height="26" align="right" class="bline" style="padding-left:10px; text-align:right">密码：</td>
	<td class="bline"><input name="password" type="password" id="password" size="30"  class="iptxt"></td>
</tr>
 <tr>
	<td height="26" align="right" class="bline" style="padding-left:10px; text-align:right">确认密码：</td>
	<td class="bline"><input name="password2" type="password" id="password2" size="30"  class="iptxt"></td>
</tr> 
		  
 <tr>
	<td height="26" align="right" class="bline" style="padding-left:10px; text-align:right">电话：</td>
	<td class="bline"><input name="tel" type="text" id="tel" size="30"  class="iptxt" value="<?php echo ($data["tel"]); ?>"></td>
</tr>
 <tr>
	<td height="26" align="right" class="bline" style="padding-left:10px; text-align:right">邮箱：</td>
	<td class="bline"><input name="email" type="email" id="email" size="30"  class="iptxt" value="<?php echo ($data["email"]); ?>"></td>
</tr> 
<tr><td colspan="2" style="text-align:center">
<input name="id" type="hidden" id="id" size="30"  class="iptxt" value="<?php echo ($data["id"]); ?>">
<input name="domain" type="submit" style=" background:url(__PUB__img/button_save.gif); width:60px; height:22px; border:0" value="   ">
&nbsp;&nbsp;&nbsp;<a href="javascript:history.go(-1);"><img src="__PUB__img/button_back.gif" width="60" height="22" border="0"></a></td></tr>   
        </tbody></table>

</form>
</div>
</body>
</html>