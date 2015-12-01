<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	$Admin = D('Login');		//实例化Admin模型
    	if ($Admin->create()){		//创建数据模型
    		$user = I('post.name');		
    		$this->session($user);
    		$this->success('Login success!',"/hc_tp/Admin");		//跳转到内页面
    	}else {
    		echo $this->error($Admin->getError());
    	}
    }
    public function session($user){
    	session('user',$user);		//登录成功，保留session
    }
    public function logOut(){
    	session('user',null);		//注销，清空用户的session
    	$this->display('index');		//返回登录界面
    }
    public function validate(){
    	$config = array(
    			'fontsize' => 30,	//验证码字体大小
    			'length' => 4,		//验证码位数
    			'useNoise' =>	true,	//开启验证码杂点
    			'imageW'  =>  200,	//验证码宽度
    			'imageH'  =>  60,	//验证码宽度
    	);
    	$verify = new \Think\Verify($config);		//实例化验证码类，将条件传递给实例化的类
    	$code = $verify->entry();		//验证验证码是否正确
    	return $code;
    }
}