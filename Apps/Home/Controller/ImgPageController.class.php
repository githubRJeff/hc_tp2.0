<?php

namespace Home\Controller;

use Think\Controller;

class ImgPageController extends Controller {
	private $imgCount;
	private $startPage;
	private $endPage;
	public function index($count,$page) {
		$this->imgCount = 9; // 每页显示的图像数
		$this->startPage = ($page - 1) * $this->imgCount; 		//计算开始页
		$this->endPage = $startPage + $imgCount - 1;			//计算终止页
		$Page = new \Think\Page ( $count, $this->imgCount ); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show (); // 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		
		if (! empty ( $page )) {
			$this->assign ( 'p', $page ); // 设置页数为p
		} else {
			$this->assign ( 'p', 1 ); // 刚点进来的时候，设置页数为1
		}
		

		$this->assign ( 'startPage', $this->startPage );
		$this->assign ( 'endPage', $this->endPage );
		$this->assign ( 'imgCount', $this->imgCount ); // 赋值数据集
		$this->assign ( 'list', $list ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
	}
}
?>