<?php

namespace Home\Controller;

use Think\Controller;

class ImageController extends Controller {
	private $folders;
	private $endFolders;
	private $filePath = array ();
	public function index() {
		$this->getFolders ();
		foreach ( $this->folders as $key => $value ) { // 循环取出最后一个文件夹的名称
			if ($value != "." && $value != "..") {
				$this->endFolders = "/" . $value . "/";
				$this->getImages ( $this->endFolders ); // 将结尾文件夹传给getImages
				$this->endFolders = null;
				// 每一次都把结尾文件夹名称设置为空，因为这里的主要目的，
				// 是获取文件夹中的第一个文件的路径
			}
		}
		$this->imageThumb ();
	}
	public function imageThumb() {
		$image = new \Think\Image ();
		foreach ( $this->filePath as $key => $value ) { // 循环出photo下每个文件夹中的第一个文件的路径
			$image->open ( "$value" );
			$imgName = strrchr ( dirname ( $value ), "/" ); // 以所在文件夹命名缩略图
			$suffix = strrchr ( $value, "." ); // 获取原图的后缀
			$thumbPath = "./Public/images/thumb" . $imgName . $suffix;
			$imgSave = $image->thumb ( 250, 165, \Think\Image::IMAGE_THUMB_CENTER )
							->save ($thumbPath );
			$this->assign(substr($imgName, 1),$thumbPath);		//注册缩略图路径变量以供前台调用
			
		}
	}
	public function getFolders() {
		$isDir = ROOT_PATH . "/Public/images/photo/"; // 本地的绝对路径
		if (is_dir ( $isDir )) { // 判断是否存在该路径
			if (! empty ( $folders = scandir ( $isDir ) )) {
				$this->folders = $folders;
			}
		}
	}
	public function getImages($endFolders) { // 结尾文件夹名称传递过来
		$isDir = ROOT_PATH . "/Public/images/photo" . $endFolders; // 本地的绝对路径
		
		if (is_dir ( $isDir )) { // 判断是否存在该路径
			if ($dh = opendir ( $isDir )) {
				while ( ($file = readdir ( $dh )) != false ) { // 循环取出所有文件
					if ($file != "." && $file != "..") { // 把不符合条件的.和..去掉
						$this->filePath [] = $isDir . $file; // 路径名+文件名放入filePath数组
						break;
					}
				}
				closedir ( $dh );
			}
		} else {
			echo '文件夹不存在！';
		}
	}
}
?>