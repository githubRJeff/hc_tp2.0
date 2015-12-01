<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
	public function index(){
		if ($this->checkLogin()){
			$this->assign('username',session('user'));		//注入session中的user变量，可以在header模板显示登录用户名
			$this->display('header');
			$sidebar = new SidebarController();
			$sidebar->index();
			$this->display('footer');
		}else {
			$this->error('非法登录！');
			return false;
		}
		
	}
	public function checkLogin(){
		if (!empty(session('user'))){
			return true;
		}
	}
}

?>