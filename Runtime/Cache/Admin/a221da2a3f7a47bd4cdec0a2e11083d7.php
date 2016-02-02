<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>后台管理系统</title>
<meta name="keywords" content="">
<meta name="description" content="">

<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUB__style/bootstrap-responsive.min.css">
<style type="text/css">
.input-xxlarge{ margin-bottom: 0px;}
.long{ width: 530px;}
.input-xxlarge1 {margin-bottom: 0px;}
</style>
<script type="text/javascript" src="__PUB__js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUB__js/jquery.min.js"></script>
<script type="text/javascript" src="__PUB__js/globe.js"></script>
<link rel="stylesheet" href="__ROOTPUB__kindeditor/themes/default/default.css" />
<script charset="utf-8" src="__ROOTPUB__kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="__ROOTPUB__kindeditor/lang/zh_CN.js"></script>
<script>
KindEditor.ready(function(K){
		var editor1 = K.editor({
			uploadJson : "<?php echo U('Kind/upload_json');?>",
			fileManagerJson : "<?php echo U('Kind/file_manager_json');?>",
			allowFileManager : true
		});
		K(".edit_image").click(function(){
			var img_id=jQuery(this).attr("varid");
			editor1.loadPlugin("image", function(){
				editor1.plugin.imageDialog({
					imageUrl : K("#"+img_id).val(),
					clickFn : function(url, title, width, height, border, align) {
						K("#"+img_id).val(url);
						jQuery("."+img_id).attr('src',url);
						editor1.hideDialog();
					}
				});
			});
		});

});


</script>
</head>
<body style="margin: 10px 0px;">
<div style="margin:0 auto; width:98%;">

	<table class="table table-condensed table-bordered table-hover">
	<tbody>
		<tr>
			<th colspan="3" style="text-align:center;">会员等级 | <a href="<?php echo U('LevelList');?>">[会员等级列表]</a></th>
			
		</tr>

		
	<form action="<?php echo U('UserLevel');?>" method="post" name="form1" enctype="multipart/form-data">
		
		<tr>
			<td width="10%" style="text-align:center;">等级名称：</th>
			
			<td width="30%">
			
			<input type='text' name='vipname' value=''/>[<small style='color:red'>*</small>]
			
			</th>
			
		</tr>
		
		<tr>
			<td style="text-align:center;">等级折扣：</td>
			<td><input type='text' name='level' value=''/>[<small style='color:red'>%</small>]</td>
		</tr>
		<tr>
			<td style="text-align:center;">等级积分：</td>
			<td>每达到<input type='text' name='yuan'  value='' style="width:40px"/>[<small style='color:red'>元</small>]，
            	可得<input type='text' name='scores' value='' style=" width:40px"/>积分。
            </td>
		</tr>
		
		
		<tr >
			
			<td colspan="3"><button class="btn btn-large btn-info" type="submit">提交</button></td>
		</tr>
	</form>
	</tbody>
	</table>
</div>

</body>
</html>