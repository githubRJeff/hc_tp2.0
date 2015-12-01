<?php
namespace Home\Controller;
use Think\Controller;
class ContactController extends Controller{
	public function index(){
		$this->display('Index/header');
		$this->display('header/contact/index');
		$this->display('Index/footer');
	}
}	
	
?>