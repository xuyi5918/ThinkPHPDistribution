<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?php echo C('title');?>|后台管理系统</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap-responsive.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/style.css">
<script type="text/javascript" src="__PUB__js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUB__js/jquery.min.js"></script>
<script type="text/javascript" src="__PUB__js/common.js"></script>
<style>
.head #top{ width:100%; height:100px;}
</style>
</head>
<body class="showmenu" style="">
<div class="head">
<iframe id="top" name="top" frameborder="0" src="<?php echo U('Index/top');?>"></iframe>
</div>
<div class="left">
  <div class="menu" id="menu">
    <iframe id="menufra" name="menu" frameborder="0" src="<?php echo U('Index/menu');?>"></iframe>
  </div>
</div>
<div class="right">
  <div class="main">
    <iframe id="main" name="main" frameborder="0" src="<?php echo U('Index/main');?>"></iframe>
  </div>
</div>

</body></html>