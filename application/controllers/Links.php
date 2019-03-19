<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Links extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('Login_model','Links_model'));
		if(!$this->Login_model->is_logged_in()){
			redirect('Login/index');
		}
	}

/*链接分页*/
	public function index() {	
		//加载分页类
		$this->load->library('pagination');                                              
		//配置分页类
		$perPage = 12;//分页数量
		$config['base_url'] = site_url('Links/index');//分页所在模板
		$config['total_rows'] = $this->db->count_all_results('links');//需要处理分页数据的总量
		$config['per_page'] = $perPage;//每页展现的数量
		$config['uri_segment'] = 3;//自动检测你 URI 的哪一段包含页数
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['first_tag_open'] = '<span class="layui-btn" role = "button">';//第一个链接的起始标签。
		$config['first_tag_close'] = '</span>&nbsp;&nbsp;';//第一个链接的结束标签
		$config['last_tag_open'] = '<span class="layui-btn" role = "button">';//最后一个链接的起始标签
		$config['last_tag_close'] = '</span>&nbsp;&nbsp;';//最后一个链接的结束标签
		$config['num_tag_open'] = '<span class="layui-btn layui-btn-primary" role = "button">';//数字链接的起始标签
		$config['num_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['cur_tag_open'] = '<span class="layui-btn layui-btn-primary" role = "button">';//当前页链接的起始标签
		$config['cur_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['prev_tag_open'] = '<span class="layui-btn" role = "button">';
		$config['prev_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['next_tag_open'] = '<span class="layui-btn" role = "button">';
		$config['next_tag_close'] = '</span>&nbsp;&nbsp;';
		$this->pagination->initialize($config);
		//生成分页
		$data['fenlinks'] = $this->pagination->create_links();
		//获取数据
		$offset = $this->uri->segment(3);
		$links = $this->Links_model->get_links($perPage, $offset);
		//获取分类
		$linkcate = $this->Links_model->get_linkcate();
		//将分类id替换为分类名
		foreach($links as &$val) {
			foreach($linkcate as $var) {
				if($val['aid'] == $var['aid']) {
					$val['aid'] = $var['linkcate'];
				}
			}
		}
		$data['links'] = $links;
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/links');
		$this->load->view('Admin/footer');
	}


/*添加链接分类*/
	public function addlink() {
		//获取分类信息
		$data['linkcate'] = $this->Links_model->get_linkcate();
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/addlink');
		$this->load->view('Admin/footer');
	}

/*添加新链接*/
	public function insertlink() {
		$linkcate = $this->input->post('linkcate');
		$name = $this->input->post('name');
		$link = $this->input->post('link');
		$info = array("aid"=>$linkcate,"name"=>$name,"link"=>$link);
		if($this->Links_model->insert_links($info) && $this->Links_model->update_cate($linkcate,1)){
			redirect('Links/index');
		}
	}


/*删除链接*/
	public function dellink() {
		$mid = $this->uri->segment(3);
		$aid = $this->Links_model->get_linkaid($mid);
		//执行删除操作		
		if($this->Links_model->del_links($mid) && $this->Links_model->update_cate($aid,0)){
			$data['tips'] = "删除成功!";
		} else {
			$data['tips'] = "删除失败!";
		}
		$data['route'] = site_url('Links/index');
		//输出信息并跳转
		$this->load->view('tips',$data);
	}
	
}

?>
