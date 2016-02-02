<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台管理系统</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap-responsive.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/style.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/menu.css">
<script type="text/javascript" src="__PUB__js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUB__js/jquery.min.js"></script>
<script type="text/javascript" src="__PUB__js/common.js"></script>
<script type="text/javascript" src="__PUB__js/leftmenu.js"></script>
</head>
<body target="main" style="">
<table width="180" align="left" border="0" cellspacing="0" cellpadding="0" style="text-align:left;">
	<tbody><tr>
		<td valign="top" style="padding-top:10px" width="20">
			
		
            <a id="link1" class="mmac"><div onclick="ShowMainMenu(1)">内容</div></a>
            <a id="link2" class="mm"><div onclick="ShowMainMenu(2)">管理</div></a>
            <a id="link3" class="mm"><div onclick="ShowMainMenu(3)">系统</div></a>
			
			<div class="mmf"></div>
			
        </td>
        <td width="160" id="mainct" valign="top">
<div id="ct1">   
    
<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><dl class="<?php if($k == 1 ): ?>bitem<?php else: ?>bitem2<?php endif; ?>" id="sunitems<?php echo ($v["kid"]); ?>_1"><dt onclick="showHide(&#39;items<?php echo ($v["kid"]); ?>_1&#39;)"><b><?php echo ($v["catname"]); ?></b></dt>
    <dd style="<?php if($k == 1): else: ?>display:none<?php endif; ?>" class="sitem" id="items<?php echo ($v["kid"]); ?>_1">
        <ul class="sitemu">
		<?php if(is_array($v['cmenulist'])): $i = 0; $__LIST__ = $v['cmenulist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
			
				<span style="float:left"><a target="main" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a></span>
				<span style="float:right; margin-right:10px;">
<?php if($vo['add']): ?><a href='<?php echo ($vo["add"]); ?>' target='main'><img src='__PUB__img/gtk-sadd.png' style="display: inherit;"/></a><?php endif; ?>
				
				</span>
			
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </dd>
    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
    
</div>





<div id="ct2" style="display:none">
	
	<dl class="bitem" id="sunitems1_2"><dt onclick="showHide(&#39;items1_2&#39;)"><b>分类管理</b></dt>
	<dd style="display:block" class="sitem" id="items1_2">
		<ul class="sitemu">
		
			
			
			<li><a target="main" href="<?php echo U('Class/ClsShow');?>">库存管理</a></li>
			
		</ul>
	</dd>
	</dl>
	
    
    <dl class="bitem" id="sunitems1_2"><dt onclick="showHide(&#39;items1_2&#39;)"><b>客户管理</b></dt>
	<dd style="display:block" class="sitem" id="items1_2">
		<ul class="sitemu">
		
			
			
			<li><a target="main" href="<?php echo U('User/AddUser');?>">添加会员</a></li>
            <li><a target="main" href="<?php echo U('User/UserList');?>">会员列表</a></li>
            <li><a target="main" href="<?php echo U('User/huishou');?>">会员回收站</a></li>
            <li><a target="main" href="<?php echo U('User/UserLevel');?>">会员等级</a></li>
			
		</ul>
	</dd>
	</dl>
    
	<dl class="bitem" id="sunitems1_2"><dt onclick="showHide(&#39;items1_2&#39;)"><b>订单管理</b></dt>
	<dd style="display:block" class="sitem" id="items1_2">
		<ul class="sitemu">
		
			
			
			<li><a target="main" href="<?php echo U('Order/OrderList');?>">所有订单</a></li>
          <li><a target="main" href="<?php echo U('Order/Huishou');?>">回收站</a></li>
			
		</ul>
	</dd>
	</dl>
	
	
	
</div>
<div id="ct3" style="display:none">



<dl id="sunitems2_3" class="bitem"><dt onclick="showHide(&#39;items2_3&#39;)"><b>用户管理</b></dt>
    <dd id="items2_3" class="sitem">
        <ul class="sitemu">
            <li><a target="main" href="<?php echo U('Admin/index');?>">管理员列表</a></li>
            <li><a target="main" href="<?php echo U('Admin/role');?>">角色列表</a></li>
        </ul>
    </dd>
</dl>

	
<dl id="sunitems1_3" class="bitem"><dt onclick="showHide(&#39;items1_3&#39;)"><b>系统操作</b></dt>
<dd id="items1_3" class="sitem">
    <ul class="sitemu">
		<li><a target="main" href="<?php echo U('Admin/Alipy/Config');?>">支付宝配置</a></li>		
		<li><a target="main" href="<?php echo U('Index/system');?>">系统设置</a></li>
        <li><a target="main" href="<?php echo U('Index/delcache');?>">清理缓存</a></li>
        <li><a target="main" href="<?php echo U('Baksql/index');?>">数据管理</a></li>
    </ul>
</dd>
</dl>

</div>



		</td>
    </tr>
    <tr>
        <td width="26"></td>
        <td width="160" valign="top"><img src="__PUB__image/bottom.gif"></td>
    </tr>
</tbody></table>

</body></html>