<?php
	
	Class CommodityAction Extends CommonAction{
		
		/*添加商品*/
		public function Sping(){
			$ResImg=M('spimg');
			$ResImg->where('sp_id = 0')->delete();
	
			if(empty($_GET['cid'])&&$_GET['cid']==''){
				
				$this->display('CommodityInfo');
				
			}else{
			
				$Cid=$_GET['cid'];
				$Obj=M('sping');
				$result=$Obj->where('id = '.$Cid)->select();
					
					
				$this->list_kc=$result;
			
				$this->display('CommodityInfoShow');
			}
			
			
		}
		
		public function Del(){
			$Del=M('sping');
			$Id=$_GET['Id'];
			$cid=$_GET['cid'];
		
			
			if($Del->where('id ='.$Id)->delete()){
			
				$this->success('删除成功 !',U('ListTitle',array('id'=>$cid)));
			}else{
				$this->error('删除失败!');
			}
			
		}
		/*增加商品*/
		public function  Add(){

			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Uploads/image/';// 设置附件上传目录
			if($_POST['Netfile']==''){
				if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
				}else{// 上传成功 获取上传文件信息
					$info =  $upload->getUploadFileInfo();
				}
			}
			
			if($_POST['Netfile']==''){
				$IMG='__ROOT__/Uploads/image/'.$info[0]['savename'];
			}else{
				$IMG=$_POST['Netfile'];
			}
			
			$data=array(
				'title'=>I('title'),#名称
				'model'=>I('model'),#类型
				'mall'=>I('mall'), 	#网店地址
				'Clasid'=>I('id'),	#父级ID
				'Size'=>I('Size'), #尺寸
				'Color'=>I('Color'),
				'CZ'=>I('CZ'), #材质
				'Number'=>I('Number'),#数量
				'Pre'=>I('Pre'), #价钱
				'Unit'=>I('unit'), #单位
				'ShangJ'=>I('Sj'), #是否上架
				'img'=>$IMG,		#图片地址
				'info'=>I('cont'),
			);
			
			
			$DATE=M('sping');
			$res=$DATE->add($data);
			$data=array(
				'sp_id'=>$res
				);
			$IMG=M('spimg');
			$IMG->where('sp_id = 0')->data($data)->save();
			if($res){
				$this->success('增加商品成功!',U('Class/ClsShow'));
			}else{
				$this->error('增加商品失败!');
			}
		}
		
		/*修改商品*/
		public function Save(){
		
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Uploads/image/';// 设置附件上传目录
			if($_POST['Netfile']==''){
				if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
				}else{// 上传成功 获取上传文件信息
					$info =  $upload->getUploadFileInfo();
				}
			}
			
			if($_POST['Netfile']==''){
				$IMG='__ROOT__/Uploads/image/'.$info[0]['savename'];
			}else{
				$IMG=$_POST['Netfile'];
			}
			
		
			$data=array(
				'title'=>I('title'),#名称
				'model'=>I('model'),#类型
				'mall'=>I('mall'), 	#网店地址
				'Clasid'=>I('id'),	#父级ID
				'Size'=>I('Size'), #尺寸
				'Color'=>I('Color'),
				'CZ'=>I('CZ'), #材质
				'Number'=>I('Number'),#数量
				'Pre'=>I('Pre'), #价钱
				'Unit'=>I('unit'), #单位
				'ShangJ'=>I('Sj'), #是否上架
				'img'=>$IMG,		#图片地址
				'info'=>I('cont'),
			);
		
			$Id=$_GET['id'];
			$Result=M('sping');
			if($Result->where('id = '.$Id)->data($data)->save()){
				$this->success('修改成功!',U('Class/ClsShow'));
			}else{
				$this->error('修改商品失败!');
			}
			
		}
		
		/*显示商品列表*/
		public function ListTitle(){
			
			$Result=M('sping');
			$where['Clasid']=$_GET['id'];
			
			$result=$Result->where($where)->select();
			$this->List_res=$result;
			$this->display('class');
			
		}

		public function UPImgList(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Uploads/image/';// 设置附件上传目录
			if($_POST['Netfile']==''){
				if(!$upload->upload()) {// 上传错误提示错误信息
					$this->error($upload->getErrorMsg());
				}else{// 上传成功 获取上传文件信息
					$info =  $upload->getUploadFileInfo();
				}
			}




		}
	}
?>