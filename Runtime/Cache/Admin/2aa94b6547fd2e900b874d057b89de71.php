<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>管理系统登录</title>
<link rel="stylesheet" href="__PUB__style/style.default.css" type="text/css" />

<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="__PUB__style/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="__PUB__style/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="__PUB__js/css3-mediaqueries.js"></script>
<![endif]-->
<script>
function fleshVerify(){ 
    //重载验证码
    var time = new Date().getTime();
        document.getElementById("verifyImg").src="<?php echo U('verify',array(),''); echo C('URL_PATHINFO_DEPR');?>"+time;
}
</script>
</head>

<body class="loginpage">

	<div class="loginbox">
    	<div class="loginboxinner">
        	
            <div class="logo">
            	<h1><span>管理系统.</span>TM</h1>
                <p><?php echo C('title');?></p>
            </div><!--logo--> 
            <form class="form-horizontal" method="post" action="<?php echo U('Public/login');?>">
            	
                <div class="username">
                	<div class="usernameinner">
                    	<input type="text" name="username" id="username" />
                    </div>
                </div>
                
                <div class="password">
                	<div class="passwordinner">
                    	<input type="password" name="password" id="password" />
                    </div>
                </div>
				
				<div class="verify">
                	<div class="verifyinner">
                    	<input type="text" name="verify" id="verify" /><a href="javascript:fleshVerify()"><img id="verifyImg" src="<?php echo U('verify',array(),'');?>"  alt="点击刷新验证码" onclick="fleshVerify()" style=" cursor:pointer;vertical-align:top"/></a>
                    </div>
                </div>
                
                <button type="submit" >登录</button>
                
                <div class="keep"><input type="checkbox" /> 记住密码</div>
            
            </form>
            
        </div><!--loginboxinner-->
    </div><!--loginbox-->


</body>
</html>