<?php
namespace Home\Controller;
use Think\Controller;
class SidebarController extends Controller{
	public function index(){
		$this->display('Index/sidebar');		//引入侧边栏文件
		$act =  $_GET['act'];			//获取前台发来的选择侧边栏参数
		$this->assign('act',$act);
		$this->choose($act);			//根据参数选择侧边栏右侧内容
	}
	public function choose($act){
		switch ($act){
			case 1:
				$this->display('content/intro');
				break;
			case 2:
				$this->display('content/department');
				break;
			case 3:
				$this->display('content/logo');
				break;
			case 4:
				$this->display('content/member');
				break;
			case 5:
				$this->display('content/activity');
				break;
			case 6:
				$this->display('content/consult');
				break;
			case 7:
				$image = new ImageController();
				$image->index();
				$this->display('content/album');
				
				break;
			case 8:
				$member = new MemberController();
				$member->basicInfo();		//调用Member控制器方法，查询数据
				break;
			default:
				$this->display('content/intro');
		}
	}
}
?>