<?php
namespace app\index\validate;	
use think\Validate;

class User extends Validate{
	
	protected $rule = [
		
		'username' => 'require|unique:member',
		'endtime' => 'require'
	];
	
	protected $message = [
	
		'username.require' => '请填写用户名',
		'username.unique' => '此用户名已存在',
		'endtime' => '请填写到期时间',
	
	];
	
}
	
?>