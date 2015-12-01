<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$this->display('header');	//引入头文件
    	$sidebar = new SidebarController();		
    	$sidebar->index();		//引入侧边栏、中心内容
    	$this->display('footer');		//引入尾部文件
    }
}