<?php

namespace Home\Controller;

use Think\Controller;

class MessageController extends Controller {
	public function index() {
		//如果是使用create方法直接根据表单提交的POST数据创建数据对象
		//则在add里面不需要data数据
		//这就要求表单提交的名字要和数据库中的属性名一致
		
		//第二种插入数据的方法
		//$message = I ( 'post.message' );
		//$data ['message_info'] = $message;
		//$result = $Message->data ( $data )->add ();
		
		
		$Message = D ( 'Message' );
		if ($Message->create()) {
			$Message->add();
			//新增一条数据
			$this->success ( '留言发布成功！' );
		} else {
			$this->error ( $Message->getError () );
		}
	}
}
?>