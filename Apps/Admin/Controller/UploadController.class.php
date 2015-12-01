<?php

namespace Admin\Controller;

use Think\Controller;

class UploadController extends Controller {
	public function index(){
		$upload = new \Think\Upload();		//引入上传文件类
		$upload->maxSize = 31457280;			//设置最大文件大小
		$upload->exts = array('jpg','jpeg','png','gif');		//设置文件格式
		$endFolder = I("post.album")."/";				//获取前台数据判断要把图片加入到哪个文件夹
		//设置存放的文件夹路径，必须设置
		$upload->rootPath = "./Public/";		//根文件夹
		$upload->savePath = "images/photo/".$endFolder;		//子文件夹
		$info = $upload->upload();		//调用upload方法上传文件
		
		//如果不要自动生成当前日期文件夹，需要到upload类中设置autoSub为false
		if (!$info){
			$this->error($upload->getError());
		}else {
			$this->success('上传成功');
		}
	}
}
?>