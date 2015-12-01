<?php

namespace Home\Controller;

use Think\Controller;

class MemberController extends Controller {
	public function basicInfo() {
		$search_name = I ( 'post.search_name' ); // 获取前端发来要查询的潮友姓名
		$Model = D('Member'); // 实例化模型
		$result = $Model->getInfo ( $search_name ); // 调用获取成员基本信息的方法
		                                         
		// 注册海潮成员表的基本信息变量，供模板使用
		$this->assign ( 'name', $result ['member_name'] );
		$this->assign ( 'class1', $result ['class_name'] );
		$this->assign ( 'graduate', $result ['graduate'] );
		$this->assign ( 'department_name1', $result ['department_name'] );
		
		// 判断男女，根据注册不同变量，制作不同的css图形作为性别标识
		if ($result ['sex'] == '男') {
			$this->assign ( 'boy', $result ['sex'] );
		} else {
			$this->assign ( 'girl', $result ['sex'] );
		}
		
		// 将实例化的对象Model传给getSchool、getPosition确保是引用同一个对象中的方法
		$this->getSchool ( $Model );
		
		$this->getPosition ( $Model );
		
		$this->display ( 'Consult/Member/basicInfo' ); // 根据数据display相应Member信息模板
	}
	public function getSchool($Model) {
		$result = $Model->getSchool ();
		$this->assign ( 'college', $result ['college_name'] );
		$this->assign ( 'major', $result ['major_name'] );
		$this->assign ( 'senior', $result ['school_name'] );
	}
	public function getPosition($Model) {
		$result = $Model->getPosition ();
		if (sizeof ( $result ) == 1) {
			$this->assign ( 'class2', $result [0] ['class_name'] );
			$this->assign ( 'department_name2', $result [0] ['department_name'] );
			$this->assign ( 'pos_name2', $result [0] ['pos_name'] );
		} else {
			$this->assign ( 'class2', $result [1] ['class_name'] );
			$this->assign ( 'pos_name2', $result [1] ['pos_name'] );
			$this->assign ( 'department_name2', $result [1] ['department_name'] );
			$this->assign ( 'class3', $result [0] ['class_name'] );
			$this->assign ( 'pos_name3', $result [0] ['pos_name'] );
			$this->assign ( 'department_name3', $result [0] ['department_name'] );
		}
	}
}
?>