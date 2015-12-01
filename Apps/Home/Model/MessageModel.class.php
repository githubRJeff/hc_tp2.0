<?php
namespace Home\Model;
use Think\Model;
class MessageModel extends Model{
	protected $_map = array(
			'message' => 'message_info'
	);
	protected $_validate = array(
			array('message_info','require','留言不得为空',1,'',self::MODEL_INSERT),
	);
	
}
?>