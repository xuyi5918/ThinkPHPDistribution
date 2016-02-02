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


<body style="margin: 10px 0px;">
<div style="margin:0 auto; width:98%;">
<table class="table table-condensed table-bordered table-hover">
<tbody><tr>
	<td colspan="9" style="padding-left:10px;">
	<div style="float:left">
    <b>会员等级列表</b>
    </div>
    
	</td>
</tr>
<tr>

    <td width="1%" style="text-align:center">ID</td>
    <td width="10%" style="text-align:center">等级名称</td>
  
    <td width="15%" style="text-align:center">折扣等级</td>
	<td width="15%" style="text-align:center">积分等级</td>
    <td width="15%" style="text-align:center">操作</td>
</tr>
<?php if(is_array($LevelList)): $i = 0; $__LIST__ = $LevelList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	<td style="text-align:center">
    	<?php echo ($vo["id"]); ?>
    </td>
<td style="text-align:center">
	<?php echo ($vo["vipname"]); ?>
	</td>
	<td style="text-align:center">
    	<?php echo ($vo["viplevel"]); ?>
    </td>
	
		<td style="text-align:center">
        	每达到
        	<input type='text' id='' value='<?php echo ($vo["yuan"]); ?>' style="width:40px"/>[<small style="color:#F00">元</small>]
            ,可得<input type='text' id='' value='<?php echo ($vo["scores"]); ?>' style="width:40px"/>积分
        
        </td>
		<td style="text-align:center">
    		<a  href="__APP__/Admin/User/Del/Id/<?php echo ($vo["id"]); ?>" class="btn btn-mini">
            		<i class="icon-trash"></i>
                    删除
            </a>
			
			<a  href="__APP__/Admin/User/Save/Id/<?php echo ($vo["id"]); ?>" class="btn btn-mini">
            		<i class="icon-edit"></i>
                    修改
            </a>
    </td>
   
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</tbody></table>
</div>

</body></html>