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
			<th colspan="3" style="text-align:center;">添加用户</th>
			
		</tr>

		
	<form action="<?php echo U('AddUser');?>" method="post" name="form1" enctype="multipart/form-data">
		
		<tr>
			<td width="10%" style="text-align:center;">用户名：</th>
			
			<td width="30%">
			<input type='hidden' name='id' value='<?php echo ($_GET['id']); ?>'/>
			<input type='text' name='username' value=''/>[<small style='color:red'>*</small>]
			
			</th>
			
		</tr>
		
		<tr>
			<td style="text-align:center;">密码：</td>
			<td><input type='text' name='Password' value=''/>[<small style='color:red'>*</small>]</td>
		</tr>
		<tr>
			<td style="text-align:center;">公司名称：</td>
			<td><input type='text' name='Coompy' value=''/>[<small style='color:red'>*</small>]</td>
		</tr>
		<tr>
			<td style="text-align:center;">会员等级：</td>
			<td>
			
			<select name="level">
            <?php if(is_array($LevelList)): $i = 0; $__LIST__ = $LevelList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["vipname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
		[<small style='color:red'>*</small>]
			</td>
		
		</tr>
  
	<tr>
			<td style="text-align:center;">销售额：</td>
			<td>
				<input type="text" name="xsg" id="Host" ><!--销售额-->
				[<small style='color:red'>元</small>]
			</td>
	</tr>
	
	<tr>
			<td style="text-align:center;">订单总数：</td>
			<td>
				<input type="text" name="Cont" id="Host" ><!--总订单-->
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">预付金额：</td>
			<td>
				<input type="text" name="pre" id="Host" >[<small style='color:red'>元</small>]
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">积分：</td>
			<td>
				<input type="text" name="jf" id="Host" >[<small style='color:red'>积分</small>]
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">网站：</td>
			<td>
				
                <input type="text" name="wz" id="Host" >
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">联系电话：</td>
			<td>
				<input type="text" name="phone" id="Host" >
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">QQ：</td>
			<td>
				<input type="text" name="qq" id="Host" >
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">地址：</td>
			<td>
				<input type="text" name="address" id="Host" >
			</td>
		</tr>
	
	<tr>
			<td style="text-align:center;">邮箱：</td>
			<td>
			
				<input type="text" name="mail"  />
		
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