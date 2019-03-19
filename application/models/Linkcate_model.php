<?php
class Linkcate_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_linkcate(){
		$table = "linkcate";
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}
	function add_linkcate($cate){
		$table = "linkcate";
		$this->db->insert($table,$cate);
		return $this->db->affected_rows();
	}
	function update_linkcate($aid,$info){
		$table = "linkcate";
		$this->db->where("aid",$aid);
		$this->db->update($table,$info);
		return $this->db->affected_rows();
	}
	function del_linkcate($aid){
		$table = "linkcate";
		$rows = $this->db->delete($table,array("aid"=>$aid));
		$table = "linkcate";
		$this->db->delete($table,array("aid"=>$aid));
		return $rows;
	}
}
?>