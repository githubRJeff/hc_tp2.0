<?php

namespace Home\Controller;

use Think\Controller;

class PhotoController extends Controller {
	private $folder; // 点击的相册所在的最后一个文件夹
	private $filePath = array (); // 相片的存放地址，有多张，所以用数组存放
	private $page;
	public function index($Album_Choose,$page) {
		$this->endFolder ( $Album_Choose );
		$this->getImages ();
		$imgPage = new ImgPageController();
		$imgPage->index(sizeof($this->filePath),$page);		//将图片数量以及当前页数传递给图片分页控制器
		$this->imageThumb();
	}
	public function endFolder($Album_Choose) {
		switch ($Album_Choose) {
			// 根据点击的相册选择相应路径
			case 1 :
				$this->folder = "/dingxiang/";
				break;
			case 2 :
				$this->folder = "/gaokao/";
				break;
			case 3 :
				$this->folder = "/laoren/";
				break;
			case 4 :
				$this->folder = "/zhuti/";
				break;
			case 5 :
				$this->folder = "/zongjie/";
				break;
			case 6 :
				$this->folder = "/banji/";
				break;
			default :
				echo "Album wrong!";
		}
	}
	public function getImages() {
		$isDir = ROOT_PATH . "/Public/images/photo" . $this->folder; // 本地的绝对路径
		
		$realDir = "/Public/images/photo" . $this->folder; // 文件夹的相对路径
		if (is_dir ( $isDir )) { // 判断是否存在该路径
			if ($dh = opendir ( $isDir )) {
				while ( ($file = readdir ( $dh )) != false ) { // 循环取出所有文件
					if ($file != "." && $file != "..") { // 把不符合条件的.和..去掉
						$this->filePath [] = $realDir . $file; // 路径名+文件名放入filePath数组
					}
				}
				closedir ( $dh );
			}
		} else {
			echo '文件夹不存在！';
		}
	}
	public function imageThumb() {
 		$image = new \Think\Image ();
 		foreach ( $this->filePath as $key => $value ) { // 循环出photo下每个文件夹中的第一个文件的路径
 			$value = substr($value, 1);
 			//注意这里的坑比问题，路径的value出来是../Public/images/photo/
 			//但是这个路径是要放在Image文件夹下执行的，所以要截取一个字符串，改为./Public/images/photo
 			//../代表根路径，上面取出文件的./是当前目录	
  			$image->open ( $value );
   			$imgSave = $image->thumb ( 250, 165, \Think\Image::IMAGE_THUMB_CENTER )->save ( $value );
 		}
 		$this->assign ( "filePath", $this->filePath ); // 注册路径变量提供给前端输出
	}
}
?>