<?php

if(!defined('FYSCU_ROOT')){
	exit('非法访问');
}

class index extends action_base{
	
	public function action_index(){
		$is_dev = ($_SERVER['REMOTE_ADDR']=='127.0.0.1'||$_SERVER['REMOTE_ADDR']=='::1')?1:0;
		$config = CONFIG::get('system');


        $this->render('fyscu',array('is_dev'=>$is_dev,'version'=>$config));


//		$ct = CACHE::get($this->get_route());//路由信息作为缓存KEY
//		if(!$ct){
//			//如果获取缓存失败，就渲染页面
//			$ct = $this->render('fyscu',array('is_dev'=>$is_dev,'version'=>$config),true);
//			//然后将新渲染的内容存入缓存
//			CACHE::set($this->get_route(),$ct);
//		}
//		//然后，将内容输出 （如果有缓存 就是直接输出缓存的内容，不用重新渲染）
//		echo $ct;
//		//输出用时
//		FYTOOL::END_TIME();
	}

	public function action_page(){
		$subject = FYTOOL::get_gp_value('s');
		$config = CONFIG('system');
		$this->render('page/'.$subject,array('version'=>$config));
	}
	
	/**
	 * 项目生成
	 */
	public function action_generator(){
		//检查来源
		if(!($_SERVER['REMOTE_ADDR']=='127.0.0.1'||$_SERVER['REMOTE_ADDR']=='::1')){
			FYTOOL::error_ctrl('你所在的主机不允许调用此方法。');
		}
		
		if(FYTOOL::get_gp_value('submit')){
			//通过按钮提交
			$path = realpath(FYSCU_ROOT.'/../');
			$project = isset($_POST['project'])?$_POST['project']:'';
			if($project!=''){
				$project = str_replace(array('/','\\'), '', $project);
				$path = $path.'/'.$project;
				if(!file_exists($path)){
					//创建目录
					$fp = mkdir($path);
					$sig = FYTOOL::r_copy(FYSCU_ROOT.'./pro_tpl/',$path);
					$fp_fyscu = mkdir($path.'/fyscu');
					$sig_core = FYTOOL::r_copy(FYSCU_ROOT.'./core/',$path.'/fyscu/core');
					$sig_init = copy(FYSCU_ROOT.'./fyscu.init.php',$path.'./fyscu/fyscu.init.php');
					$sig_dic  = FYTOOL::r_copy(FYSCU_ROOT.'./dic/',$path.'/fyscu/dic');
					$ct = file_get_contents($path.'/index.php');
					$ct = str_replace('UNAME', $project, $ct);
					file_put_contents($path.'/index.php', $ct);
					
				}
				header('location:/'.$project);
			}
		}
		
	}
	public function action_license(){
        FYTOOL::debug($this->get_route());
		$this->render('license');
	}
}
?>