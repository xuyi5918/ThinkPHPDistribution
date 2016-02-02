<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Title();?></title>
<link href="__PUBLIC__/Home/css/style.css" type="text/css" rel="stylesheet" />
</head>
<SCRIPT src="__PUBLIC__/Home/js/jquery-1.2.6.pack.js" type=text/javascript></SCRIPT>
<SCRIPT src="__PUBLIC__/Home/js/base.js" type=text/javascript></SCRIPT>

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

	<?php if(is_array($Info)): $i = 0; $__LIST__ = $Info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="pro_show">
		<div class="pro_left">
			<div id="preview">
				<div class="jqzoom" id="spec-n1" onClick="window.open('http://www.workcss.com/')"><IMG height=350
	src="<?php echo ($vo["img"]); ?>" jqimg="<?php echo ($vo["img"]); ?>" width=350> </div>
				<div id="spec-n5">
					<div class="control" id="spec-left"> <img src="__PUBLIC__/Home/images/left.gif" /> </div>
					<div id="spec-list">
						<ul class="list-h">
							<li><img src="<?php echo ($vo["img"]); ?>"> </li>
							<?php if(is_array($ResImg)): $i = 0; $__LIST__ = $ResImg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($img["imgUrl"]); ?>"> </li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<div class="control" id="spec-right"> <img src="__PUBLIC__/Home/images/right.gif" /> </div>
				</div>
			</div>
			<SCRIPT type=text/javascript>
	$(function(){			
	   $(".jqzoom").jqueryzoom({
			xzoom:400,
			yzoom:400,
			offset:10,
			position:"right",
			preload:1,
			lens:1
		});
		$("#spec-list").jdMarquee({
			deriction:"left",
			width:350,
			height:56,
			step:1,
			speed:4,
			delay:10,
			control:true,
			_front:"#spec-right",
			_back:"#spec-left"
		});
		$("#spec-list img").bind("mouseover",function(){
			var src=$(this).attr("src");
			$("#spec-n1 img").eq(0).attr({
				src:src.replace("/n5/","/n1/"),
				jqimg:src.replace("/n5/","/n0/")
			});
			$(this).css({
				"border":"2px solid #ff6600",
				"padding":"1px"
			});
		}).bind("mouseout",function(){
			$(this).css({
				"border":"1px solid #ccc",
				"padding":"2px"
			});
		});				
	})
	</SCRIPT>
	<SCRIPT TYPE="text/javascript">
		function Submits(){

			document.Form1.submit();

		}
	</SCRIPT> 
			<SCRIPT src="__PUBLIC__/Home/js/lib.js" type=text/javascript></SCRIPT> 
			<SCRIPT src="__PUBLIC__/Home/js/163css.js" type=text/javascript></SCRIPT> 
		</div>
		<form action='__APP__/Home/Home/xinxi/id/<?php echo ($_GET['id']); ?>/' method='GET' name='Form1'>
		<div class="pro_right">
			<h3><?php echo ($vo["title"]); ?></h3>
			<div class="pro_wz">
				<p> 尺  寸：<?php echo ($vo["Size"]); ?><br />
					颜  色：<?php echo ($vo["Color"]); ?><br />
					类  别：<?php echo ($vo["name"]); ?><br />
					材  质：<?php echo ($vo["CZ"]); ?><br />
					价  格：<?php echo ($vo["Pre"]); ?>元<br />
					单  位：<?php echo ($vo["Unit"]); ?><br/>
					库  存：<?php echo ($vo["Number"]); ?>
					</p>
			</div>
			<div class="pro_dh">
				<div class="dh">
					<small style='float:right;margin-right:450px'>
						<input style="height:20px;width:30px;margin-top:3px" value='1' type='text' name='Number'>件
					</small>
					<a href="javascript:void(0);" onclick='Submits();'>兑换</a>
					
				</div>
		</form>
				<div class="share"> 
					<!-- Baidu Button BEGIN -->
					<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <span class="bds_more">分享到：</span> <a class="bds_tsina"></a> <a class="bds_sqq"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <a class="bds_kaixin001"></a> <a class="bds_douban"></a> <a class="bds_msn"></a> <a class="bds_mail"></a> <a class="shareCount"></a> </div>
					<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" ></script> 
					<script type="text/javascript" id="bdshell_js"></script> 
					<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
					<!-- Baidu Button END --> 
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="pro_con">
		<h3>商品介绍</h3>
		<div class="pro_js">
			<?php echo ($vo["info"]); ?>
		
		</div>
		
	</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<div class="bottom_bg">
	<div class="bottom">
		<p><?php echo footer();?><a href="#">北京网站建设：联合易网</a> <br />
			Copyright ©2013 www. ruidexuan.com All Reserved. &nbsp;&nbsp;|&nbsp;&nbsp;京ICP备01028629号-1</p>
	</div>
</div>
</body>
</html>