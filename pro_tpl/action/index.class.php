<?php

if(!defined('FYSCU_ROOT')){
	exit('非法访问');
}

class index extends action_base{
		
	public function action_index(){
		
		$this->render('index',array('project'=>PROJECT_NAME));
	}
	
	
}
?>