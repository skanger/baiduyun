<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
    	
		return $this->fetch("pay");
		//  echo __PUBLIC__;  	
    }
	
	public function pay(){
		
		echo "支付";
	}
}
