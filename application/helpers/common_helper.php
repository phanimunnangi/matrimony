<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

    function seo_friendly_url($string){
		$string = str_replace(array('[\', \']'), '', $string);
		$string = preg_replace('/\[.*\]/U', '', $string);
		$string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
		$string = htmlentities($string, ENT_COMPAT, 'utf-8');
		$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
		$string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
		return strtolower(trim($string, '-'));
	}
	function isCheckedUser($userid,$profileid){
		$ci=& get_instance();
		$ci->load->database(); 
		$reported = 0;
		$sql ="SELECT ulp_id FROM ma_user_liked_profiles WHERE ulp_user_id_from='$userid' AND ulp_user_id_to='$profileid' AND ulp_status='1'";
		$query = $ci->db->query($sql);
		$row = $query->row();	
		if(isset($row->ulp_id) && $row->ulp_id!=""){
			$reported = 1;
		}else{
			$reported = 0;
		}
		return $reported;
	}
	function sendemailtoall($fromemail,$toemail,$subject,$message,$attachment=""){
		$reported =0;
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = GAMILACCOUNT; 
		$config['smtp_pass'] = GMAILPASSWORD;
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$ci->email->initialize($config);
		$ci->email->from($fromemail, 'Matrimonyapp');
		$list = array($toemail);
		$ci->email->to($list);
		$ci->email->subject($subject);
		$ci->email->message($message);
		if($ci->email->send()){
			$reported = 1;
		} else {
			$errorReport = $ci->email->print_debugger();
		}
		return $reported;
	}
	
  
   

