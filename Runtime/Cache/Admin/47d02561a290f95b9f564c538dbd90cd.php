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
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
		
		function Submit(){
			editor.sync();
			html = $('#editor_id').val();
			$("#texts").val(html);
			
			document.form1.submit();
			
			
		}
		
</script>


<!-- UPLoad-->
<link href="__ROOTPUB__SwfUpload/css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__ROOTPUB__SwfUpload/swfupload/swfupload.js"></script>
<script type="text/javascript" src="__ROOTPUB__SwfUpload/js/swfupload.queue.js"></script>
<script type="text/javascript" src="__ROOTPUB__SwfUpload/js/fileprogress.js"></script>
<script type="text/javascript" src="__ROOTPUB__SwfUpload/js/handlers.js"></script>
<script type="text/javascript">
		var swfu;
		window.onload = function() {
			var settings = {
				flash_url : "__ROOTPUB__SwfUpload/swfupload/swfupload.swf",
				upload_url: "<?php echo U('Admin/Upload/Uplaod/');?>",	
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
				file_size_limit : "100 MB",
				file_types : "*.*",
				file_types_description : "All Files",
				file_upload_limit : 10,  //配置上传个数
				file_queue_limit : 0,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: false,

				// Button settings
				button_image_url: "__ROOTPUB__SwfUpload/images/TestImageNoText_65x29.png",
				button_width: "65",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder",
				button_text: '<span class="theFont ">浏览</span>',
				button_text_style: ".theFont { font-size: 16; }",
				button_text_left_padding: 12,
				button_text_top_padding: 3,
				
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete	
			};

			swfu = new SWFUpload(settings);
	     };
	</script>

<!--ＥＤＮ-->

</head>
<body style="margin: 10px 0px;">
<div style="margin:0 auto; width:98%;">

	<table class="table table-condensed table-bordered table-hover">
	<tbody>
		<tr>
			<th colspan="3" style="text-align:center;">添加商品</th>
			
		</tr>

		
	<form action="<?php echo U('Add');?>" method="post" name="form1" enctype="multipart/form-data">
		
		<tr>
			<td width="10%" style="text-align:center;">标题：</th>
			
			<td width="30%">
			<input type='hidden' name='id' value='<?php echo ($_GET['id']); ?>'/>
			<input type='text' name='title' value=''/>[<small style='color:red'>*</small>]
			
			</th>
			
		</tr>
		
		<tr>
			<td style="text-align:center;">型号：</td>
			<td><input type='text' name='model' value=''/>[<small style='color:red'>*</small>]</td>
		</tr>
		<tr>
			<td style="text-align:center;">商城地址：</td>
			<td><input type='text' name='mall' value=''/>[<small style='color:red'>*</small>]</td>
		</tr>
		<tr>
			<td style="text-align:center;">网络图片：</td>
			<td>
			
			<input type='text' name='Netfile' value='' id='NetWork'  />
		
			</td>
		
		</tr>
  
	<tr>
			<td style="text-align:center;">本地图片：</td>
			<td>
				<input type="file" name="upfile" id="Host" >
			</td>
	</tr>
	
	
		<tr>
			<td style='text-align:center;'>展示图片</td>
			<td>
					<div id="content">
	
		<p>点击“浏览”按钮，选择您要上传的文档文件后，系统将自动上传并在完成后提示您。</p>
		<p>请勿上传包含中文文件名的文件！</p>
		<div class="fieldset flash" id="fsUploadProgress">
			<span class="legend">快速上传</span>
	  </div>
		<div id="divStatus">0 个文件已上传</div>
			<div>
				<span id="spanButtonPlaceHolder"></span>
				<input id="btnCancel" type="button" value="取消所有上传" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
			</div>

	

</div>


			</td>
			
		</tr>

	
	<tr>
			<td style="text-align:center;">尺寸：</td>
			<td>
				<input type="text" name="Size" id="Host" >
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">颜色：</td>
			<td>
				<input type="text" name="Color" id="Host" >
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">材质：</td>
			<td>
				<input type="text" name="CZ" id="Host" >
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">上架：</td>
			<td>
				<select name='Sj'>
					<option value='0'>上架</option>
					<option value='1'>下架</option>
					
				</select>
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">数量：</td>
			<td>
				<input type="text" name="Number" id="Host" >
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">单价：</td>
			<td>
				<input type="text" name="Pre" id="Host" >
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">单位：</td>
			<td>
				<input type="text" name="unit" id="Host" >
			</td>
		</tr>
		
		<tr>
			<td style="text-align:center;">描述：</td>
			<td>
			<textarea id="editor_id" name="txt" style="width:700px;height:300px;">
			
			</textarea>
			<input type='hidden' id='texts' name='cont' >
			
			</td>
		</tr>
	
	<tr>
			<td style="text-align:center;">图片预览：</td>
			<td>
			
				<img src=''>
		
			</td>
		
		</tr>
		
		
		
		
		<tr >
			
			<td colspan="3"><button class="btn btn-large btn-info" type="button" onclick='Submit();'>提交</button></td>
		</tr>
	</form>
	</tbody>
	</table>
</div>


</body>
</html>