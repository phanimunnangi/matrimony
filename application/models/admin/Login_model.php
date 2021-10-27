<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Login_model extends CI_Model {
		function login_check(){
			$username = $this->input->post('u_email');
			$password = md5($this->input->post('u_password'));
			$this->db->where('adminloginemail', $username);
		    $this->db->where('adminpassword', $password);
		    $query = $this->db->get('ma_adminlogins');
		    if($query->num_rows() == 1)
	        {   
	            $row = $query->row();
				$data = array(
					'userid'    => $row->adminloginid,
					'username'  => ucfirst($row->adminloginname),
					'email'     => $row->adminloginemail,
					'logintype' => $row->adminlogintype,
					'validated' => true
				);
				$this->session->set_userdata($data);
				return $query->row();
			}else{
			  return false;
			}
		}
	}