<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

/*加载前台*/
	public function index() {	
		$this->load->view('dist/index.html');
	}
	
}

?>
