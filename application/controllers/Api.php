<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
header('Access-Control-Allow-Origin:*');
//加载CodeIgniter Rest Server模块 项目地址：https://github.com/chriskacerguis/codeigniter-restserver
require APPPATH . '/libraries/REST_Controller.php';
class Api extends \Restserver\Libraries\REST_Controller {
    function __construct()
    {
        parent::__construct();
    }

/*获取文档分类*/
    public function index_get()
    {
        $table = "category";//选定数据表
        $cid = $this->get('cid');//获取的id
        $query = $this->db->get($table);
        //检测是否为空
        if(empty($_GET['cid'])){
           //result_array();返回查询的所有数据，特别注意：row_array()为返回查询的第一条数据
            $data = $query->result_array();
             if(empty($data)){
                //如果数据为空，返回错误状态
                $this->set_response([
                    '状态' => FALSE,
                    '信息' => '暂无数据'
                ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
            }else{
                //成功，返回数据
                $this->response($data);
            }
        }else{
             $query = $this->db->get_where($table,array('cid'=>$cid));
             $data = $query->row_array();//定义数据
             $this->response($data);
        }
 
    }

/*获取所有文档*/
//访问方式：http://loclhost/api/article?id=17
     public function list_get()
    {
        $id = $this->get('id');//获取的id
        //检测是否为空
        if(empty($_GET['id'])){
            $this->response(array('error'=>'条件不能为空！',400));
        }
        $table = "article";
        //查询表中与条件id相等的cid的数据
        $query = $this->db->get_where($table,array('cid'=>$id));
        //result_array()返回所有匹配结果 row_array()返回一条查询结果
        $data = $query->result_array();//定义数据
        
        if(empty($data)){
            //如果数据为空，返回错误状态
            $this->set_response([
                '状态' => FALSE,
                '信息' => '暂无数据'
            ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }else{
            //成功，返回数据
            $this->response($data);
        }
    }

    //获取文档内容
      public function content_get()
    {
        $id = $this->get('id');//获取的id
        //检测是否为空
        if(empty($_GET['id'])){
            $this->response(array('error'=>'条件不能为空！',400));
        }
        $table = "article";
        //查询表中与条件id相等的cid的数据
        $query = $this->db->get_where($table,array('id'=>$id));
        //result_array()返回所有匹配结果 row_array()返回一条查询结果
        $data = $query->result_array();//定义数据
        
        if(empty($data)){
            //如果数据为空，返回错误状态
            $this->set_response([
                '状态' => FALSE,
                '信息' => '暂无数据'
            ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }else{
            //成功，返回数据
            $this->response($data);
        }
    }


/*获取链接分类 http://loclhost/index.php/api/linkcate */

    public function linkcate_get()
    {
        
    $table = "linkcate";//选定数据表
    $this->db->order_by('aid','asc');//升序排序
        $query = $this->db->get($table);
        //result_array();返回查询的所有数据，特别注意：row_array()为返回查询的第一条数据
        
        $data = $query->result_array();
         if(empty($data)){
            //如果数据为空，返回错误状态
            $this->set_response([
                '状态' => FALSE,
                '信息' => '暂无数据'
            ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }else{
            //成功，返回数据
            $this->response($data);
        }
    }

//获取链接 http://192.168.0.50/index.php/api/links?aid=13
       public function links_get()
    {
        $id = $this->get('aid');//获取的id
        //检测是否为空
        if(empty($_GET['aid'])){
            $this->response(array('error'=>'条件不能为空！',400));
        }
        $table = "links";
        //查询表中与条件id相等的cid的数据
        $query = $this->db->get_where($table,array('aid'=>$id));
        //result_array()返回所有匹配结果 row_array()返回一条查询结果
        $data = $query->result_array();//定义数据
        
        if(empty($data)){
            //如果数据为空，返回错误状态
            $this->set_response([
                '状态' => FALSE,
                '信息' => '暂无数据'
            ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }else{
            //成功，返回数据
            $this->response($data);
        }
    }


//预留分页接口
	public function fenye_get() {
	$pageSize = 5; //每页显示数据条数
	$result = $this->db->query('select * from article');
	$totalNum=$result->num_rows();//数据总数
	$totalPageCount = intval($totalNum/$pageSize); //总页数
  
	//判断当前页是哪一页
	$nowPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
	//上一页
	$prev = ($nowPage-1 <= 0) ? 1 : $nowPage-1;
	//下一页
	$next = ($nowPage+1 >= $totalPageCount) ? $totalPageCount : $nowPage+1;
	  
	//偏移量
	$offset = ($nowPage-1)*$pageSize;
	//查询内容
	$sql="SELECT id,author,createtime,title,description FROM article order by id DESC LIMIT $offset,$pageSize";
	//执行一次查询内容
	$query = $this->db->query($sql);
	//获得查询结构
	$result = $query->result_array();
	//放回json数据
	$this->response($result);
	}
}

?>