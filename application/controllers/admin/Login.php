<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('admin/Login_model');
		$this->load->model('admin/Common_model');
	}
	public function index(){
		if(isset($_POST['u_email']) && $_POST['u_email']!=""){
			$result = $this->Login_model->login_check();
			if(isset($result->adminloginid) && $result->adminloginid!=""){
				$this->session->set_flashdata('success_message', '"Welcome to Admin Dashboard","Success"');				redirect(base_url().'admin/dashboard');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'matrimonyappadmindashboard');
			}
		}else{
			$this->load->view('admin/login');
		}		
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('success_message', '"Logged Out Successsfully","Success"');
		redirect(base_url().'matrimonyappadmindashboard');
	}
}

