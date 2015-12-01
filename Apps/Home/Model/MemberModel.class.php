<?php

namespace Home\Model;

use Think\Model;

class MemberModel extends Model {
	protected $member_id;
	public function getInfo($search_name) {
		$member = M ( 'Member' );
		$where ['member_name'] = array (
				'like',
				"%$search_name%" 
		);
		$result = $member->field ( 'member_id,member_name,sex,graduate,department_name,class_name' )
						 ->join('JOIN __CLASS__ on __MEMBER__.class_id = __CLASS__.class_id' )
						 ->join('JOIN __DEPARTMENT__ on __MEMBER__.def_depart = __DEPARTMENT__.department_id' )
						 ->where( $where )
						 ->find ();
		$this->member_id = $result ['member_id'];
		return $result;
	}
	public function getSchool() {
		$memberSchool = M('Memberschool');
		$where['member_id'] = array('EQ',$this->member_id);
		$result = $memberSchool->field('college_name,major_name,school_name')
								->join('JOIN __COLLEGE__ ON __MEMBERSCHOOL__.college_id = __COLLEGE__.college_id')
								->join('JOIN __SENIOR__ ON __MEMBERSCHOOL__.senior_id = __SENIOR__.id')
								->join('JOIN __MAJOR__ ON __MEMBERSCHOOL__.major_id = __MAJOR__.major_id')
								->where($where)
								->find();
		return $result;
	}
	public function getPosition() {
		$memberPosition = M('Memberposition');
		$where['member_id'] = array('EQ',$this->member_id);
		$result = $memberPosition->field('pos_name,department_name,class_name')
								 ->join('JOIN __CLASS__ ON __MEMBERPOSITION__.class = __CLASS__.class_id')
								 ->join('JOIN __DEPARTMENT__ ON __MEMBERPOSITION__.department_id = __DEPARTMENT__.department_id')
								 ->join('JOIN __POSITION__ ON __MEMBERPOSITION__.pos_id = __POSITION__.pos_id')
								 ->where($where)
								 ->select();
		return $result;
	}
}
?>