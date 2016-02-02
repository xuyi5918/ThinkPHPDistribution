<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Title();?></title>
<link href="__PUBLIC__/Home/css/style.css" type="text/css" rel="stylesheet" />
<script src="__PUBLIC__/Home/js/jquery.js" type="text/javascript"></script>
<script type='text/javascript'>
		var i=0;
		window.onscroll=function(){
			i=i+8;
			$.get('__APP__/Home/Home/Loading/Start/'+i+'/where/<?php echo ($_GET['where']); ?>',function(result){
				if(result=='0'){
					
				}else{
					$(".show_box").append(result);
					$('.show_box').css('overflow','visible');
				}
				
			});
		}
</script>
<script type='text/javascript' language='javascript'>
	function Change(){
		var where=$("#sele").val();
		 window.location.href="__APP__/Home/Home/CpList/where/"+where;
	}
</script>
<style type="text/css">
	.Play{
		position: absolute;
		right: 215px;
		top:130px;
	}
	.Play2{
		position: absolute;
		right: 360px;
		top:130px;

	}
	.Play3{
		position: absolute;
		right: 430px;
		top:130px;
	}

</style>
</head>
	<script>
		function AddCatr(Num,Id){
			
			var Nums=$(Num).val();
			
			 var Url="__APP__/Home/Home/ShoppingTrolley/goods/"+Id+"/Num/"+Nums;
			  $.get(Url,function (result){
			  		if(result=='True'){
			  			alert("添加购物车成功!");
			  		}

			  });

		}
	</script>
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
	<h3>全部商品</h3>
    <h1 class="Play3"><a href="<?php echo U('Home/Cart/ydg');?>">已购买的商品</a><h1>
	<h1 class='Play2'><a href="<?php echo U('Home/Cart/Cart');?>">购物车</a></h1>
	<h1 class='Play'><a href="<?php echo U('Home/Home/AllData');?>">购买购物车中的商品</a></h1>
<div id='a' style='width:100%;height:20px;padding-top:10px;'>

	<p style="float:right;margin-right:20px">分类：
		<select onchange='Change();' id='sele'>
				<option value ="">选择分类</option>
				<?php if(is_array($ClassList)): $i = 0; $__LIST__ = $ClassList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Obj): $mod = ($i % 2 );++$i;?><option value="<?php echo ($Obj["id"]); ?>" ><?php echo ($Obj["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>

	</p>
</div>
<div id="a" style="height:606px;width:1000px;"> 

    <div class="show_box" style=''>
		<?php if(is_array($SpList)): $i = 0; $__LIST__ = $SpList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl style='margin-right:23px'>
			<dt><a href="__APP__/Home/Home/xx/id/<?php echo ($vo["id"]); ?>">
				<img src="<?php echo ($vo["img"]); ?>" width="225" height="225" />

			</a></dt>
			<dd>
				<a href="javascript:void(0)" style='color:red;font-size: 20px'>¥<?php echo ($vo["Pre"]); ?></a>

				<a href='javascript:void(0);' style='float:right' onclick='AddCatr("#Number<?php echo ($vo["id"]); ?>","<?php echo ($vo["id"]); ?>")'>[加入购物车]</a>
				<small style='float:right'><input type='text'  id='Number<?php echo ($vo["id"]); ?>' style='width:20px;height:15px'>件</small>
			</dd>
			<dd>
				<a href='__APP__/Home/Home/xx/id/<?php echo ($vo["id"]); ?>' style='padding-left: 10px;padding-right: 10px'><?php echo ($vo["title"]); ?></a>
			</dd>
			
		</dl><?php endforeach; endif; else: echo "" ;endif; ?>
    	
    </div>
</div> 


<!-- <a href="javascript:void(0)" id="show" onclick="document.getElementById('a').style.height='auto';document.getElementById('hidden').style.display='';document.getElementById('show').style.display='none';Loding();">更多...</a> 

<a href="javascript:void(0)" id="hidden" style="display:none;" onclick="document.getElementById('a').style.height='606px';document.getElementById('hidden').style.display='none';document.getElementById('show').style.display='';">收起</a> -->
</div>

<div class="bottom_bg">
	<div class="bottom">
		<p><?php echo footer();?><a href="#">北京网站建设：联合易网</a> <br />
Copyright ©2013 www. ruidexuan.com All Reserved. &nbsp;&nbsp;|&nbsp;&nbsp;京ICP备01028629号-1</p>
	</div>
</div>

</body>
</html>