<?php
namespace app\index\controller;
use think\Controller;

class Userip extends Controller
{
 
	/*
	 * 返回查询的用户名是否存在  ，到期时间
	 */
	public function query(){
		
		$id = input('id');
		$array = db('userip')->where("id=".$id)->select();
		
		//var_dump($array);
		
		return $array[0];
	}
	
	/*
	 * 用户新增接口，返回新增的结果
	 * 
	*/
	public function add(){//等待修改
		
		
		$data=[
		
			'username' => input('post.username'),
			'ctime' => time(),
			'endtime' => input('post.endtime')
		];
		
		$validate = validate('User');
		$is = $validate->check($data);
				
		if($is){
			$res = db("member")->insert($data);
			if($res){
				$success = array('status' => $res,'msg' => '新增成功' );	
				return $success;
			}else{
				$error = array('status' => 0, 'msg'=>'数据库插入失败');
				return $error;
			}
		}else{
			
			//dump($validate->getError());
			$error = array('status' => 0, 'msg'=> $validate->getError());
			return $error;
		} 
	}
	
	public function lst(){
		
		$ye = input('?yeshu')?(input('yeshu')-1):0;
		
		$lst = db("userip")->order('id')->limit($ye*10,10)->select();

		//var_dump($lst);
		return $lst;
	}
	
	public function yeshu(){
		
		$length = db("userip")->count();
		return array("tiaoshu" => $length);
	}
	
	public function del(){
		input("?id")?$id=input("id"):$array=["msg" => 'id不存在'];

		if($id){
			db("userip")->delete($id)?$array["msg"]="删除成功":$array["msg"]="删除失败";
		}
		else $array=["msg" => "删除失败"];
		return $array;
	}
}
 