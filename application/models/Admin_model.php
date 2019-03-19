<?php
class Admin_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

/*获取用户信息*/
	function get_user_info(){
		$table = "user";
		$userinfo = $this->session->userdata('user');
		$username = $userinfo['username'];
		$query = $this->db->get_where($table,array('username'=>$username));
		$result = $query->row_array();
		return $result;
	}

/*更新用户信息*/
	function update_user_info($user){
		$table = "user";
		$userinfo = $this->session->userdata('user');
		$username = $userinfo['username'];
		$this->db->where('username',$username);
		$this->db->update($table, $user);
		return $this->db->affected_rows();
	}


/*获取用户名*/	
	function get_username($user){
		$table = "user";
		$query = $this->db->get_where($table,array("username"=>$user));
		$result = $query->row_array();
		return $result;
	}

/*校验密码*/
	function check_password($password,$userpass){
		if($password == md5($userpass)){
			return true;
		}else{
			return false;
		}
	}

/*更新密码*/	
	function update_password($uid,$password){
		$table = "user";
		$newpass = md5($password); 
		$info = array("password"=>$newpass);
		$this->db->where("uid",$uid);
		$this->db->update($table,$info);
		return $this->db->affected_rows();
	}
}

?>