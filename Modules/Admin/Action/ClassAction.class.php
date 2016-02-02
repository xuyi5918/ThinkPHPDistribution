<?php 
	Class ClassAction extends CommonAction{
		
		public function ClsShow(){
			$Class=D('class');
			$Res=$Class->order('sort asc')->select();
			//$Res=Recursive($Res,0,0);
			  
			$this->lists=$Res;
			
			$this->display('Class');
		}
		public function add(){
			if(IS_POST!=true){	
				$Class=D('class');
				$Res=$Class->select();
				$this->list_clas=$Res;
				$this->display('add');
				exit();
			}
			
			$Add_Date=D('class');
			$data['name']=I('ClassName');
			$data['sort']=I('Sotr');
			$data['pid']=I('Clas_id');
			if($Add_Date->data($data)->add()){
				$this->success('分类增加成功','ClsShow');
			}else{
				$this->error('分类增加失败!');
			}
		}
		/*增加子分类*/
		public function Plus(){
			if(IS_POST!=true){
				$this->error('页面不存在!');
				exit();
			}
			$Plus_Obj=M('Class');
			$data=array(
				'pid'=>I('Id'),
				'name'=>I('name'),
				'sort'=>I('sort')
			);
			
			if($Plus_Obj->add($data)){
				$this->success('子分类增加成功!',U('ClsShow'));
			}else{
				$this->error('子分类增加失败!');
			}
			
		}
		public function Edit(){
			if(IS_POST!=true){
				$Edit_Data=M('Class');
			
				$Res=$Edit_Data->where('id = '.I('Id'))->select();
				$this->list_cont=$Res;
				$Res=$Edit_Data->select();
				$this->list_clas=$Res;
				$this->display('edit');
				exit();
			}
			$Id=$_GET['Id'];
			$Save=M('Class');
			$Data['name']=I('ClassName');
			$Data['sort']=I('Sotr');
			$Data['pid']=I('Clas_id');
			$SaveRes=$Save->where('id = '.$Id)->save($Data);
			if($SaveRes){
				$this->success('更新分类成功！',U('ClsShow'));
			}else{
				$this->error('更新分类失败!');
			}
		}
		public function Del(){
			$Id=I('Id');
			$Del=M('Class');
			$res=$Del->where('id = '.$Id)->delete();
			if($res){
				$this->success('删除分类成功！',U('ClsShow'));
			}else{
				$this->error('删除分类失败！');
			}
		}
		
		
		
	}