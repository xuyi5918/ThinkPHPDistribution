<?php
class IndexAction extends CommonAction {
	private $tab_sys='Config';
	public function __construct() {
		parent::__construct();
		$admin=M('Admin')->where('id='.$this->LOGIN_KEY)->find();
		$admin_name=$admin['name']?$admin['name']:$admin['username'];
		$this->assign('admin_name',$admin_name);
		if($admin['role_id']){
			$adminrole=M('Admin_role')->where('id='.$admin['role_id'])->find();
			$admin_role=$adminrole['name'];
		}else{
			$admin_role='测试管理员->系统开发';
		}
		$this->assign('admin_role',$admin_role);
		//dump($admin);
	}
    public function index(){
		$this->display();
	}
	public function main(){
		//redirect('http://www.enet360.com/main.asp');
		//获取服务器信息
		$sysdata['sysos'] = $_SERVER["SERVER_SOFTWARE"]; //获取服务器标识的字串
		$sysdata['sysversion'] = PHP_VERSION; //获取PHP服务器版本
		//以下两条代码连接MySQL数据库并获取MySQL数据库版本信息
		mysql_connect("localhost", "mysql_user", "mysql_pass");
		$sysdata['mysqlinfo'] = mysql_get_server_info();
		//从服务器中获取GD库的信息
		if(function_exists("gd_info")){ 
			$gd = gd_info();
			$sysdata['gdinfo'] = $gd['GD Version'];
		}else{
			$sysdata['gdinfo'] = "未知";
		}
		if(IS_WIN){//是否属于Windows 环境
			$sysdata['system']='Liunx';
		}else{
			$sysdata['system']='WINNT';
		}
		//从GD库中查看是否支持FreeType字体
		$sysdata['freetype'] = $gd["FreeType Support"] ? "支持" : "不支持";
		//从PHP配置文件中获得是否可以远程文件获取
		$sysdata['allowurl']= ini_get("allow_url_fopen") ? "支持" : "不支持";
		//从PHP配置文件中获得最大上传限制
		$sysdata['max_upload'] = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled";
		//从PHP配置文件中获得脚本的最大执行时间
		$sysdata['max_ex_time']= ini_get("max_execution_time")."秒";
		//以下两条获取服务器时间，中国大陆采用的是东八区的时间,设置时区写成Etc/GMT-8
		date_default_timezone_set("Etc/GMT-8");
		$sysdata['systemtime'] = date("Y-m-d H:i:s",time());

		$Links=D('Links');
		$orderby['sort']='desc';
		$orderby['id']='desc';
		$list = $Links->order($orderby)->limit(20)->select();
		$this->assign('list',$list);


		$this->assign('system',$sysdata);
		$this->display();
	}
	public function top(){
		$this->display();
	}
	public function menu(){
		$Category=M('Category');
		$catlist=$Category->where('upid=0')->order('sort asc,id asc')->select();
		foreach($catlist as $k=>$v){
			
			$list[$k]=$catlist[$k];
			$list[$k]['kid']=$k+5;
			$catl=$Category->where('upid='.$v['id'])->order('sort asc,id asc')->select();
			$cdata=array();
			if(count($catl)<1){
				$cdata[]=$v;
			}else{
				$cdata=$catl;
			}
			$cmenulist=array();
			foreach($cdata as $kk=>$vv){
//type  ： 0列表页 1栏目页 2单页 4主页 3外部链接
/*
1	内容列表、2	内容单页、3	栏目主页、4	列表主页、5	单页主页、0	外部链接
*/
				
				
				if($vv['type']==1){
					$cmenulist[$kk]['name']=$vv['catname'];
					$cmenulist[$kk]['url']=U('Article/index?tid='.$vv['id']);
					$cmenulist[$kk]['add']=U('Article/add?tid='.$vv['id']);
					$cmenulist[$kk]['show']=true;
					
				}elseif($vv['type']==2){
					$cmenulist[$kk]['name']=$vv['catname'];
					$cmenulist[$kk]['url']=U('Article/page?tid='.$vv['id']);
					$cmenulist[$kk]['show']=true;							
				}elseif($vv['type']==3){
					$cmenulist[$kk]['name']=$vv['catname'];
					$cmenulist[$kk]['url']=U('Article/page?tid='.$vv['id']);
					$cmenulist[$kk]['show']=true;
			
				}elseif($vv['type']==4){
					$cmenulist[$kk]['name']=$vv['catname'];
					$cmenulist[$kk]['url']=U('Article/index?tid='.$vv['id']);
					$cmenulist[$kk]['add']=U('Article/add?tid='.$vv['id']);
					$cmenulist[$kk]['show']=true;
					
							
				}elseif($vv['type']==5){
					$cmenulist[$kk]['name']=$vv['catname'];
					$cmenulist[$kk]['url']=U('Article/index?tid='.$vv['id']);
					$cmenulist[$kk]['add']=U('Article/add?tid='.$vv['id']);
					$cmenulist[$kk]['show']=true;
					
							
				}elseif($vv['type']==0){
					$cmenulist[$kk]['name']=$vv['catname'];
					$cmenulist[$kk]['url']=U('Article/link?tid='.$vv['id']);
					$cmenulist[$kk]['show']=true;
							
				}else{
				
				}
				
			}
			$list[$k]['cmenulist']=$cmenulist;
			
		}
		//dump($list);
		$this->assign('catlist',$catlist);
		$this->assign('list',$list);
		$this->display();	
	}
	
/**
 * 查看编辑系统配置项
 * 同时更新配置文件config文件的内容
**/	
	public function system(){
		$System=D($this->tab_sys);
		if(IS_POST){
			foreach($_POST as $k=>$v){
				$arr_id=explode('_',$k);
				//dump($arr_id);
				$System->where('id='.$arr_id['1'])->setField($arr_id['0'],$v);
				$System->where('id='.$arr_id['1'])->setField('updatetime',time());
			}
			$this->ReWriteConfig();
			$this->success('系统基本设置更改成功',U('system'));
		}else{
		
			$list=$this->_Lists($System,'isshow=1','','sort asc, id asc');
			
			foreach($list as $k=>$v){
				if($v['input']=='text'){			// text			单行文本
					$lists[$k]=$v;
					$lists[$k]['form']='<input class="input-xxlarge" type="'.$v['input'].'" name="content_'.$v['id'].'" id="cfg_'.$v['id'].'" value="'.$v['content'].'">';
				}elseif($v['input']=='textarea'){	// textarea		多行文本
					$lists[$k]=$v;
					$lists[$k]['form']='<textarea class="long" rows="2" name="content_'.$v['id'].'" id="cfg_'.$v['id'].'">'.$v['content'].'</textarea>';
				}elseif($v['input']=='image'){		// image		图片
					$lists[$k]=$v;
					$lists[$k]['form']='<input type="hidden" name="content_'.$v['id'].'" id="cfg_'.$v['id'].'" value="'.$v['content'].'">
					<img src="'.Thumb($v['content']).'" class="edit_image cfg_'.$v['id'].'" varid="cfg_'.$v['id'].'" style="cursor:pointer; max-height:100px; max-width:400px;"  alt="点击编辑'.$v['name'].'" >';
				}elseif($v['input']=='bool'){		// bool			布尔(Y/N) 
					$lists[$k]=$v;
					$checked=$v['content'] ? $v['content'] : 0;
					$lists[$k]['form']='<input type="radio" name="content_'.$v['id'].'" value="1" '.$this->radiobool(1,$checked).'/>&nbsp;Y &nbsp;&nbsp;
										<input type="radio" name="content_'.$v['id'].'" value="0" '.$this->radiobool(0,$checked).'/>&nbsp;N';
				}
			}
			$this->assign('lists',$lists);
			$this->display();	
		}
	}
	private function radiobool($v,$t){
		if($v==$t)
			return 'checked';
		else
			return '';
	}
	
/**
 * 添加系统配置项
 * 同时更新配置文件config文件的内容
**/
	public function systemadd(){
		$Config=D($this->tab_sys);
		if(IS_POST){
			if($Config->create()){
				$lastid=$Config->add();
				if($lastid){
					$this->ReWriteConfig();
					$this->success('变量添加成功',U('Index/system'));
				}else{
					$this->error('变量添加失败');
				}
			}else{
				$this->error($Config->getError());
			}
		}else{
			$this->redirect('system');
		}
	}
	
/**
 * 清除缓存
**/
	public function delcache(){
		//清文件缓存
		$dirs = array('./Temp/');
		@mkdir('Temp',0777,true);
		//清理缓存
		foreach($dirs as $value) {
			$this->rmdirr($value);
		}
		$this->success('系统缓存清除成功！',U('Index/main'));  
	}

/**
 * 循环删除缓存文件
**/
	private function rmdirr($dirname){
		if(!file_exists($dirname)){
			return false;
		}
		if(is_file($dirname) || is_link($dirname)){
			return unlink($dirname);
		}
		$dir = dir($dirname);
		if($dir){
			while(false !== $entry = $dir->read()){
				if($entry == '.' || $entry == '..') {
					continue;
				}
				//递归
				$this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
			}
		}
		$dir->close();
		return rmdir($dirname);
	}

/**
 * 更新配置文件config文件的内容
**/
	private	function ReWriteConfig(){
		$Config=D($this->tab_sys);
		$configpath = C('CFG_CONf');
		if(!is_writeable($configpath.'config.inc.php')){
			$this->error("配置文件'{$configpath}config.inc.php'不支持写入，无法修改系统配置参数！",'__ACTION__');
		}
		$datalists=$Config->order('id asc')->select();
		foreach($datalists as $datalist){
			$data[$datalist['cfg']]=$datalist['content'];
		}
		F('config.inc',$data,$configpath);
	}
}
?>