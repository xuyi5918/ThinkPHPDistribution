<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0047)http://localhost/cms/index.php/admin/Index/main -->
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>后台管理系统</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap-responsive.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/main.css">
<script type="text/javascript" src="__PUB__js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUB__js/jquery.min.js"></script>
<script type="text/javascript" src="__PUB__js/common.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.title').hover(function(){
			$(this).children('.minimize').removeClass('hide');
		},function(){
			$(this).children('.minimize').addClass('hide');
		});
		$('.minimize').toggle(function(){
			$(this).parent().next().slideUp();
		},function(){
			$(this).parent().next().slideDown();
		});
	});
</script>
</head>
<body style="margin: 20px;">
<div style="margin:0 auto; width:98%;">
<div class="panel-left">
<div>
    <div class="box">
        <div class="title">
			<i class="icon-user"></i><span>个人信息</span>
            <!--<a href="#" class="minimize hide"></a>-->
        </div>
        <div class="content">
                <p>你好，<?php echo ($admin_name); ?></p>
                <p>所属角色：<?php echo ($admin_role); ?></p>
                <p>上次登录时间：<?php echo date('Y-m-d H:i:s',session('LOGIN_UPTIME'));?></p>
                <p>上次登录IP：<?php echo session('LOGIN_UPIP');?></p>
        </div>
    </div>
</div>
<div>
    <div class="box">
      <div class="title">
          <i class="icon-exclamation-sign"></i><span>安全提示</span>
          
      </div>
      <div class="content sys">
        <p>建议将web目录权限修改为644</p>
        <p>系统安装完成后将install目录删除</p>
      </div>
    </div>
</div>
<div>
    <div class="box">
        <div class="title">
            <i class="icon-flag"></i><span>系统信息</span>
			
        </div>
        <div class="content">
            <p>操作系统：<?php echo ($system["system"]); ?></p>
            <p>PHP：<?php echo ($system["sysversion"]); ?></p>
            <p>服务器环境：<?php echo ($system["sysos"]); ?></p>
            <p>MySQL版本：<?php echo ($system["mysqlinfo"]); ?></p>
            <p>最大上传限制：<?php echo ($system["allowurl"]); ?></p>
        </div>
    </div>
</div>
</div>
<div class="panel-right">

<div>
  <div class="box">
      <div class="title">
          <i class="icon-question-sign"></i><span>帮助中心</span>
          <a href="#" class="minimize hide"></a>
      </div>
      <div class="content fast-opt help-opt" style="display: block;">
        
         <div style="clear:both"></div>
      </div>
  </div>
</div>
<div>
  <div class="box">
      <div class="title">
          <i class="icon-home"></i><span>作者信息</span>
          
      </div>
      <div class="content">
       
        <p>技术支持：<a href="mailto:641748326@qq.com">PHP</a></p>
      </div>
  </div>
</div>
<div>
  <div class="box">
      <div class="title">
          <i class="icon-fire"></i><span>友情链接</span>
          
      </div>
      <div class="content">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["name"]); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
      


      </div>
  </div>
</div>
</div>
</div>

</body></html>