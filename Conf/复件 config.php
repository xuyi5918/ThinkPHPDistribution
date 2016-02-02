<?php
$conf_arr=include './Public/config.inc.php';
$conf_apay=include 'AppayConf.php';
$conf=array(
	//'配置项'=>'配置值'
	'APP_GROUP_PATH'	=>	'Modules',
	'APP_GROUP_LIST'	=>	'Home,Admin',
	'DEFAULT_GROUP'	=>	'Home',
	'APP_GROUP_MODE'	=>	1,
	'URL_PATHINFO_DEPR'	=>	'/',
	'APP_GROUP_MODE'	=>  1,
	'URL_HTML_SUFFIX'	=>	'.html',
	'APP_FILE_CASE'	=>	true,			// 是否检查文件的大小写 对Windows平台有效
	'URL_MODEL'	=>	2,
	
	'DB_TYPE'	=> 'mysql',				// 数据库类型
    'DB_HOST'	=> 'localhost',		// 服务器地址
    'DB_NAME'	=> 'my_think',			// 数据库名
    'DB_USER'	=> 'root',				// 用户名
    'DB_PWD'	=> '',				// 密码
    'DB_PORT'	=> '3306',				// 端口
    'DB_PREFIX'	=> 'my_', 
	//'VAR_URL_PARAMS'      => '_URL_',
	//'SHOW_PAGE_TRACE' =>FALSE,
	'OUTPUT_ENCODE' => true,			// 页面压缩输出
	'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息
	
	'CFG_CONf'		 =>'./Public/',		//网站基本配置文件路径
	
	//自定义文本的格式
	'INPUT_TYPE'	=>	array(
							array('type'=>'text','name'=>'单行文本'),
							array('type'=>'textarea','name'=>'多行文本'),
							array('type'=>'number','name'=>'数字'),
							array('type'=>'image','name'=>'单图片'),
							array('type'=>'images','name'=>'多图片'),
							array('type'=>'radio','name'=>'单选'),
							array('type'=>'checkbox','name'=>'多选'),
							array('type'=>'select','name'=>'下拉菜单'),
							array('type'=>'datetime','name'=>'日期和时间'),
							array('type'=>'files','name'=>'多附件'),
							array('type'=>'file','name'=>'单附件'),
							array('type'=>'editor','name'=>'编辑器'),
						),
);
$Array_Conf=array_merge($conf_arr,$conf);
return array_merge($conf_apay,$Array_Conf);

?>