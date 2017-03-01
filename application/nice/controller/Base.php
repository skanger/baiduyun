<?php
namespace app\nice\controller;
use think\Controller;

class Base extends Controller {
	
    public function __construct(){
      	
		parent::__construct();
	
		//session_start();
		session("admin","1");
		
		//session("admin",null);
		$this->checklogin();
			
    }
	
	
	public function checklogin(){
		
		
		var_dump($_SESSION);
		
		if(session("admin")=="1"){
			
			
			$this->error('请先登录');
		}else{
			
			echo "huanyun";
		}
	}
}