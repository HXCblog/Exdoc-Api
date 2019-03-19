<?php
class Links_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

/*获取链接列表*/
	function get_links($perPage,$offset,$aid = 0){
		$table = "links";
		if($aid == 0){
			$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
			$query = $this->db->get($table,$perPage,$offset);
			$result = $query->result_array();
			return $result;
		}else{
			$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
			$query = $this->db->get_where($table,array("aid"=>$aid),$perPage,$offset);
			$result = $query->result_array();
			return $result;
		}		
	}

/*获取链接*/
	function get_link_info($aid){
		$table = "links";
		$query = $this->db->get_where($table,array("id"=>$aid));
		$result = $query->row_array();//返回数组
		return $result;
	}

/*获取分类*/
	function get_linkcate(){
		$table = "linkcate";
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}

/*插入链接*/
	function insert_links($links){
		$table = "links";
		$this->db->insert($table,$links);
		return $this->db->affected_rows();
	}

/*删除文章*/
	function del_links($id){
		$table = "links";
		$this->db->delete($table,array("id"=>$id));
		$result = $this->db->affected_rows();
		return $result;
	}

/*获取链接id*/
	function get_linkaid($aid){
		$table = "links";
		$query = $this->db->get_where($table,array("id"=>$aid));
		$result = $query->row_array();
		return $result['aid'];
	}


/*更新分类*/
	function update_cate($aid,$token){
		$table = "linkcate";
		$query = $this->db->get_where($table,array("aid"=>$aid));
		$result = $query->row_array();
		$this->db->where("aid",$aid);
		$result = $this->db->affected_rows();
		return $result;
	}
}
?>