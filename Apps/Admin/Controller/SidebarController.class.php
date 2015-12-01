<?php

namespace Admin\Controller;

use Think\Controller;

class SidebarController extends Controller {
	public function index() {
		$this->display ( 'Index/sidebar' );
		$act = I ( 'get.act' );
		$this->content ( $act );
	}
	public function content($act) {
		switch ($act) {
			case 1 :
				$this->display ( 'content/intro' );
				break;
			case 2 :
				$this->display ( 'content/logo' );
				break;
			case 3 :
				$this->display ( 'content/member' );
				break;
			case 4 :
				$this->display ( 'content/activity' );
				break;
			case 5 :
				$this->display ( 'content/photo' );
				break;
			default :
				$this->display ( 'content/photo' );
		}
	}
}
?>