<?php

namespace Home\Controller;

use Think\Controller;

class AlbumController extends Controller {
	public function index() {
		$this->display ( 'Index/header' );
		$this->display ( 'Index/sidebar' );
		$Album_Choose = I ( 'get.album' ); // 接收来自album页面的值，选择展示出的相册
		$photo = new PhotoController ();
		if ($page = I ( 'get.p' )) {
			$photo->index ( $Album_Choose, $page );
		} else {
			$photo->index ( $Album_Choose, 1 );		//前端如果获取到p值则返回给控制器，否则默认返回1
		}
		
		$this->display ( 'Photo/index' );
		$this->display ( 'Index/footer' );
	}
}
?>