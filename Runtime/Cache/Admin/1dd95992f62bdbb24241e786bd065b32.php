<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>管理员|后台管理系统</title>
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap-responsive.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/NewCss.css"/>
<script type="text/javascript" src="__PUB__js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUB__js/jquery.min.js"></script>
<script type="text/javascript" src="__PUB__js/common.js"></script>
<script type="text/javascript" src="__PUB__js/globe.js"></script>
<script type="text/javascript">
	function Show(Id){
		$("#Id").val(Id);
		$("#Plus_Box").show();
	}
	function Hide(){
		$('#Plus_Box').css('display','none');
	}
</script>

</head>


<div id='Plus_Box' style='display:none'>
	<h2>增加子分类</h2>
	<form method='POST' action='<?php echo U('Class/Plus');?>'>
	<table class='table table-condensed table-bordered table-hover' id='Plus_Input'>
		<tr>
			<td width='25%'>字分类名称</td>
			
			<td>
				<input type="hidden" name='Id' id='Id' value="">
				<input type="text" name='name' value="">
			</td>
		</tr>
		<tr>
			<td width='25%'>排序</td>
			<td><input type="text" name='sort' value=""></td>
		</tr>
		
		<tr>
			<td colspan='2' style='text-align:center'>
				<div id='Btn'>
						<input value='添加' type='submit' class='btn btn-mini'>
							
						
						<a onclick='Hide();' class='btn btn-mini'>
							取消
						</a>
				</div>
			</td>
		
		</tr>
	</table>
	</form>
</div>

<body style="margin: 10px 0px;">
<div style="margin:0 auto; width:98%;">
<table class="table table-condensed table-bordered table-hover">
<tbody><tr>
	<td colspan="9" style="padding-left:10px;">
	<div style="float:left">
    <b>管理员列表</b>
    </div>
    <div style="float:right">
	 <button class="btn btn-mini url" type="button" style="cursor:pointer;" url="<?php echo U('add');?>"><i class="icon-plus"></i> 添加</button>
    </div>
	</td>
</tr>
<tr>

    <td width="1%" style="text-align:center">ID</td>
    <td width="10%" style="text-align:center">分类名称</td>
    <td width="8%" style="text-align:center">添加商品</td>
    <td width="15%" style="text-align:center">查看本类商品</td>
	<td width="15%" style="text-align:center">排序</td>
    <td width="13%" style="text-align:center">操作项</td>
</tr>
<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td style="text-align:center"><input type="text" value="<?php echo ($vo["id"]); ?>" style='width:30px'/></td>
<td style="text-align:center">
	<?php echo ($vo["html"]); ?><input type='text' id='<?php echo ($vo["id"]); ?>_Name' value='<?php echo ($vo["name"]); ?>' style='width:60px'/>
	</td>
	<td style="text-align:center"><a href='__APP__/Admin/Commodity/Sping/id/<?php echo ($vo["id"]); ?>'>添加商品<a></td>
	<td style="text-align:center"><a href='__APP__/Admin/Commodity/ListTitle/id/<?php echo ($vo["id"]); ?>'>商品列表<a></td>
		<td style="text-align:center"><input type='text' id='Sort<?php echo ($vo["id"]); ?>' value='<?php echo ($vo["sort"]); ?>'/></td>
		
    <td style="text-align:center">
	<a href="javascript:void(0);" onclick='Show(<?php echo ($vo["id"]); ?>)' class='btn btn-mini'><i class="icon-plus"></i>增加子分类</a>
    <a href="__APP__/Admin/Class/Edit/Id/<?php echo ($vo["id"]); ?>" class="btn btn-mini"><i class="icon-edit"></i> 修改</a> 
	<a href="__APP__/Admin/Class/Del/Id/<?php echo ($vo["id"]); ?>" class="btn btn-mini <?php if(($vo["id"]) == "2"): ?>no_a<?php endif; ?>"><i class="icon-trash"></i> 删除</a>
    </td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</tbody></table>
</div>

</body></html>