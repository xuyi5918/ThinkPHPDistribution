<?php
class IndexAction extends Action {
	
	/*首页登录*/
		public function index(){
			if(IS_POST){
				if($_SESSION['verify'] != md5($_POST['verify'])){
					$this->error('验证码错误!');
				}else{
					$Result=D('Verify');
					
					$data=array(
						'username'=>I('username'),
						'password'=>md5(I('password')),
					);
					$Id=$Result->UserPassVerify($data);
					if(!$Id){
						$this->error('账号或者密码错误请重新输入!');
					}else{
						$Res=$Result->where('id = '.$Id)->select();
						$SQL='SELECT b.viplevel as level,b.yuan as yuan ,b.scores as scores FROM `my_usr` AS a JOIN `my_viplevel` AS b ON a.level=b.id where a.id='.$Res[0]['id'];

						$Level=$Result->query($SQL);

						cookie('level',$Level[0]['level'],3600); #获取折扣比例
						cookie('yuan',$Level[0]['yuan'],3600); #满多少钱增加积分
						cookie('scores',$Level[0]['scores'],3600); #积分信息
					
						cookie('username',$Res[0]['username'],3600); #获取用户名
						cookie('id',$Res[0]['id'],3600); #获取id
						cookie('coompy',$Res[0]['coompy']); #获取公司名称
						
						
						$this->success('登录成功!',U('Home/Home/CpList'));
					}
					
				}
				
				exit();
			}
			
			if(cookie('id')!=null&&cookie('username')!=null){
				$this->redirect('Home/Home/CpList');
			}
			$this->display();
		}
	/*验证码*/
	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,1,'png');
	}
}
?>