<?php 
class AlipyAction Extends CommonAction{
	
	public function Config(){
		
		if(IS_POST!=true){
			$data=array(
				0=>array(
					'PID'=>C('alipay_config.partner'),
					'KEY'=>C('alipay_config.key'),
					'SELLER'=>C('alipay.seller_email'),
					'WEB'=>C('HOST_WEB'),
					),
			);
			$this->Pliay=$data;
			
			$this->display('system');
			exit();
		}
		
			$Str='<?php
				return array(
				"HOST_WEB"=>"'.$_POST['Web'].'",


				 "alipay_config"=>array(
					   "partner" =>"'.$_POST['PID'].'",   //这里是你在成功申请支付宝接口后获取到的PID；
						"key"=>"'.$_POST['KEY'].'",		//这里是你在成功申请支付宝接口后获取到的Key
						
						"sign_type"=>strtoupper("MD5"),
						"input_charset"=> strtolower("utf-8"),
						"cacert"=> getcwd()."\\cacert.pem",
						"transport"=> "http",
					),
					 //以上配置项，是从接口包中alipay.config.php 文件中复制过来，进行配置；
					
				 "alipay"   =>array(
						 //这里是卖家的支付宝账号，也就是你申请接口时注册的支付宝账号
						 "seller_email"=>"'.$_POST['SELLER'].'",
						 
						 //这里是异步通知页面url，提交到项目的Pay控制器的notifyurl方法；
						 "notify_url"=>C(HOST_WEB)."/Home/Play/NotifyPlay", 
						 
						 //这里是页面跳转通知url，提交到项目的Pay控制器的returnurl方法；
						 "return_url"=>C(HOST_WEB)."/Home/Play/ReturnUrl",
				 ),
				 )
				?>';
		if(file_put_contents('./Conf/AppayConf.php',$Str)){
			$this->success('设置支付宝成功!',U('Config'));
		}else{
			$this->error('设置支付宝失败请重新设置!');
		}
		
		
	}

}