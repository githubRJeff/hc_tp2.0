<?php 
namespace Admin\Model;
use Think\Model;
class LoginModel extends Model{
	
	//获取上次登录的函数
	public function last_login(){
		$last = date('Y-m-d H:i:s',time());
		return $last;
	}
	
	//用户自定义函数，用于判断是否存在符合输入用户名密码的数据
	public function check_account(){
		
		$Admin = D('Admin');
		$name = I('post.name');
		$pass = md5(I('post.password'));
		
		$where['admin_user'] = $name;
		$where['admin_pass'] = $pass;
		
		$result = $Admin->field('admin_user,admin_pass')->where($where)->find();
		if ($result != null ){
			$Admin->where($where)->setInc('login_count');		//验证通过，登录次数加1
			$data['last_time'] = $this->last_login();			
			$Admin->where($where)->data($data)->save();			//上次登录时间更新
			return true;
		}else {
			return false;
		}
	}
	//用户自定义方法，用于检查用户输入的验证码是否正确
	public function check_verify($code){
		$verify = new \Think\Verify();
		return $verify->check($code);
	}
	
	//字段映射,将前台的表单数据名称转化为数据库中的名称，防止数据库字段暴露带来的安全隐患
	protected $_map = array(
			'name' => 'admin_user',
			'password' => 'admin_pass',
	);
	
	protected $_validate = array(
		//array(验证字段1，验证规则，错误提示，[验证条件，附加规则，验证时间])	
			
		array('admin_user','require','用户名不得为空'),
		array('admin_pass','require','密码不得为空'),
		array('code','require','验证码不得为空') ,
			
		//附加规则是callback，是当前模型类的一个方法，而不是用户自定义的
		array('admin_user','check_account','用户名或密码有误',0,'callback',3),
		array('code','check_verify','验证码错误',0,'callback',3) ,
			
	);
	protected  $_auto = array(
			array('admin_pass','md5',3,'function')		//在user_pass查询的时候默认用md5函数进行处理
	);
}
?> 