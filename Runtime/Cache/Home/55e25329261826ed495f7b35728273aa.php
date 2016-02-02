<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>页面提示</title>
  <script type="text/javascript">
   function refresh(){
    location.href = "<?php echo($jumpUrl); ?>";
   }
   setTimeout("refresh()",<?php echo($waitSecond); ?>000);
  </script>
  <style type="text/css">
   *{margin:0px;padding:0px;font-size:12px;font-family:Arial,Verdana;}
   #wrapper{width:450px;height:150px;background:#F5F5F5;border:1px solid #D2D2D2;position:absolute;top:40%;left:50%;margin-top:-100px;margin-left:-225px;}
   p.msg-title{width:100%;height:30px;line-height:30px;text-align:center;color:#EE7A38;margin-top:20px;font:14px Arial,Verdana;font-weight:bold;}
   p.message{width:100%;height:40px;line-height:40px;text-align:center;color:blue;margin-top:5px;margin-bottom:5px;}
   p.error{width:100%;height:40px;line-height:40px;text-align:center;color:red;margin-top:5px;margin-bottom:5px;font-weight:bold;}
   p.notice{width:100%;height:25px;line-height:25px;text-align:center;}
  </style>
 </head> <body>
  <div id="wrapper">
   <p class="msg-title"><?php echo($msgTitle);?></p>
   <?php if(isset($message)): ?><p class="message"><?php echo($message);?></p><?php endif; ?>
   <?php if(isset($error)): ?><p class="error"><?php echo($error);?></p><?php endif; ?>
   <?php if(isset($closeWin)): ?><p class="notice">系统将在 <span style="color:blue;font-weight:bold"><?php echo($waitSecond); ?></span> 秒后自动关闭，如果不想等待,直接点击 <a href="<?php echo($jumpUrl); ?>">这里</a> 关闭</p><?php endif; ?>
   <?php if(!isset($closeWin)): ?><p class="notice">系统将在 <span style="color:blue;font-weight:bold"><?php echo($waitSecond); ?></span> 秒后自动跳转，如果不想等待,直接点击 <a href="<?php echo($jumpUrl); ?>">这里</a> 关闭</p><?php endif; ?>
  </div>
 </body>
</html>