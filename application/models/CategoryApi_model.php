<?php
class CategoryApi_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/*获取分类信息*/
	function getcategory(){
		$table = "category";
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}

}
?>