<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->login_required();
		}
		public function index(){
			// error_reporting(E_ALL);
			// ini_set("display_errors", 1);		
			$this->data['page_title']='Dashboard';
			$this->data['page']='dashboard';
			$this->admin_view('dashboard');
		}
	}

