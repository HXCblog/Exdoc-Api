<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Linkcate extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('Login_model','Linkcate_model'));
		//登录判断
		if(!$this->Login_model->is_logged_in()) {
			redirect('Login/index');
		}
	}

/*获取文档分类列表*/
	public function index(){
		//查询分类信息
		$data['info'] = $this->Linkcate_model->get_linkcate();
		//分配变量输出模板
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/linkcate');
		$this->load->view('Admin/footer');
	}
	
/*添加新文档分类*/
	public function addcate() {
		//获取分类信息
		$linkcate = $this->input->post('linkcate');
		$info = array("linkcate"=>$linkcate);
		//执行添加操作
		if($this->Linkcate_model->add_linkcate($info)) {
			redirect('Linkcate/index');//返回
		}
	}

/*栏目分类修改*/
	public function changecate() {
		//获取分类id和分类信息
		$aid = $this->uri->segment(3);
		$linkcate = $this->input->post('linkcate');
		$info = array("linkcate"=>$linkcate);
		//执行更新操作
		if($this->Linkcate_model->update_linkcate($aid,$info)) {
			redirect('Linkcate/index');//返回
		}
	}

/*删除文档分类*/
	public function delcate() {
		//获取分类id
		$aid = $this->uri->segment(3);
		//执行删除操作
		if($this->Linkcate_model->del_linkcate($aid)) {
			$data['tips'] = "删除成功!";
		} else {
			$data['tips'] = "删除失败!";
		}
		$data['route'] = site_url("Linkcate/index");
		//作出提示并跳转
		$this->load->view("tips",$data);//提示页
	}
}


?>
