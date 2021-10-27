<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Common_model extends CI_Model {
    function dbsave(){
        $this->load->dbutil();
        $prefs = array(
			'format'        => 'zip',                       
			'filename'      => date('d-M-Y').'-mybackup.sql', 
			'add_drop'      => TRUE,
			'add_insert'    => TRUE,  
			'newline'       => "\n" 
        );
        $backup = $this->dbutil->backup($prefs);
        $this->load->helper('file');
        write_file('mybackup.zip', $backup);
        $this->load->helper('download');
        force_download('mybackup.zip', $backup);
    }	
    function get_data($table){
		// $this->db->where('status',1);
        return $this->db->get($table)->result();
    }
	function get_data_status_without_delete_records($table,$columname,$status,$orderBy,$orderType){
		$this->db->where($columname,$status);
		if($orderBy!=""){
			$this->db->order_by($orderBy,$orderType);
		}		
        return $this->db->get($table)->result();
    }
	function get_data_status_without_delete_records_double($table,$columname,$status,$orderBy,$orderType,$othercolumnname,$value){
		$this->db->where($columname,$status);
		if($value!=""){
			$this->db->where($othercolumnname,$value);
		}
		if($orderBy!=""){
			$this->db->order_by($orderBy,$orderType);
		}		
        return $this->db->get($table)->result();
    }
	function get_data_status($table,$columnname,$status,$ordercolumnname,$orderby){
		$this->db->where($columnname.'!=',$status);
		if($ordercolumnname!=""){
			$this->db->order_by($ordercolumnname,$orderby);
		}		
        return $this->db->get($table)->result();
    }
	function get_data_multiple_columns_records($table,$columnname,$status,$ordercolumnname,$orderby,$othercolumnname,$value){
		$this->db->where($columnname.'!=',$status);
		if($value!=""){
			$this->db->where($othercolumnname,$value);
		}
		if($ordercolumnname!=""){
			$this->db->order_by($ordercolumnname,$orderby);
		}
        return $this->db->get($table)->result(); 
    }
	function get_data_2multiple_columns_records($table,$columnname,$status,$ordercolumnname,$orderby,$othercolumnname,$value,$othercolumnname2,$value2){
		$this->db->where($columnname.'!=',$status);
		if($value!=""){
			$this->db->where($othercolumnname,$value);
		}
		if($value2!=""){
			$this->db->where($othercolumnname2,$value2);
		}
		if($ordercolumnname!=""){
			$this->db->order_by($ordercolumnname,$orderby);
		}		
        return $this->db->get($table)->result();
    }
	function get_data_equal_multiple_columns_records($table,$columnname,$status,$ordercolumnname,$orderby,$othercolumnname,$value,$othercolumnname2,$value2){
		$this->db->where($columnname.'=',$status);
		if($value!=""){
			$this->db->where($othercolumnname,$value);
		}
		if($othercolumnname2=='randomsilk'){
			$this->db->order_by($value2, 'RANDOM');
		}else{
			if($value2!=""){
				$this->db->where($othercolumnname2,$value2);
			}
			if($ordercolumnname!=""){
				$this->db->order_by($ordercolumnname,$orderby);
			}
		}	
		// echo $this->db->get_compiled_select();
		// exit();
        return $this->db->get($table)->result();
    }
	function neartoexpiredprofiles($table,$columnname,$status,$ordercolumnname,$orderby,$othercolumnname,$value,$othercolumnname2,$value2){
		$this->db->where($columnname.'=',$status);
		if($value!=""){
			$this->db->where($othercolumnname,$value);
		}
		if($othercolumnname2=='randomsilk'){
			$this->db->order_by($value2, 'RANDOM');
		}else{
			if($value2!=""){
				$this->db->where($othercolumnname2,$value2);
			}
			if($ordercolumnname!=""){
				$this->db->order_by($ordercolumnname,$orderby);
			}
		}	
		$this->db->where('user_tottrailperiod_days<=',15);
		// echo $this->db->get_compiled_select();
		// exit();
        return $this->db->get($table)->result();
    }
	function add($table,$data){
        $this->db->set($data);
        if($this->db->insert($table)){
            return $this->db->insert_id();
        }else{
            return 0;
        }
    }
	function get_single_data($table,$id,$columnname){
        $this->db->where($columnname,$id);
        return $this->db->get($table)->row();
    }
	function get_single_data_column($table,$id,$columnname,$status,$stcolumnname){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
        $this->db->where($columnname,$id);
		if($status==2){
			$this->db->where($stcolumnname.'!=',$status);
		}else{
			$this->db->where($stcolumnname,$status);
		} 		
        return $this->db->get($table)->row();
    }
	function get_single_data_multiple_columns($table,$id,$columnname,$status,$stcolumnname,$otherid,$othercolumnname){
        $this->db->where($columnname,$id);
        $this->db->where($othercolumnname,$otherid);
		if($status==2){
			$this->db->where($stcolumnname.'!=',$status);
		}else{
			$this->db->where($stcolumnname,$status);
		}        
        return $this->db->get($table)->row();
    }
	function update($table,$data,$id,$columnname){
        $this->db->set($data);
		$this->db->where($columnname,$id);
        if($this->db->update($table)){
            return true;
        }else{
            return false;
        }
    }
	function update_status_actions($table,$data,$id,$columnname){
        $this->db->set($data);
		$this->db->where($columnname,$id);
        if($this->db->update($table)){
            return true;
        }else{
            return false;
        }
    }
	function delete_single_row($table,$id,$columnname){
		$this->db->where($columnname, $id);
		if($this->db->delete($table)){
			return true;
		}else{
			return false;
		}
    }
	// fronetnd Query	
	function showuserslist($table,$columnname,$status,$ordercolumnname,$orderby,$othercolumnname,$value,$othercolumnname2,$value2){
		$this->db->join('ma_user_personal_info','ma_user_personal_info.upi_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_restricted_details','ma_user_restricted_details.urd_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_educational_details','ma_user_educational_details.ued_user_id = ma_users.user_id','left');
		$this->db->where($columnname.'=',$status);
		if($value!=""){
			$this->db->where($othercolumnname,$value);
		}
		if($othercolumnname2=='randomsilk'){
			$this->db->order_by($ordercolumnname,$orderby);
		}else{
			if($value2!=""){
				$this->db->where($othercolumnname2,$value2);
			}
			if($ordercolumnname!=""){
				$this->db->order_by($ordercolumnname,$orderby);
			}
		}
		$this->db->limit(10);		
		// echo $this->db->get_compiled_select();
		// exit();
        return $this->db->get($table)->result();
    }
	function homeshowuserslist($stt,$featured){
		$this->db->join('ma_user_personal_info','ma_user_personal_info.upi_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_restricted_details','ma_user_restricted_details.urd_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_educational_details','ma_user_educational_details.ued_user_id = ma_users.user_id','left');
		if($featured=='featured'){
			$this->db->where('user_is_featured=',1);
		}
		if($stt=='nri'){
			$this->db->where('user_is_nri=',1);
		}else if($stt=='male'){
			$this->db->where('user_gender=',$stt);
		}else if($stt=='female'){
			$this->db->where('user_gender=',$stt);
		}
		$this->db->where('user_status=',1);		
		$this->db->order_by('user_id', 'RANDOM');
		$this->db->limit(10);
        return $this->db->get('ma_users')->result();
	}
	function countofprofiles($type){
		if($type=="nri"){
			$sql ="SELECT COUNT(user_id) AS cntprofiles FROM ma_users WHERE user_payment_status=1 AND user_settleted_status=0 AND user_is_nri=1 AND user_status=1 ORDER BY user_id DESC";
		}else if($type=="secondmarriage"){
			$sql ="SELECT COUNT(user_id) AS cntprofiles FROM ma_users WHERE user_payment_status=1 AND user_settleted_status=0 AND user_is_secondmarriageprofile=1 AND user_status=1 ORDER BY user_id DESC";
		}else{
			$sql ="SELECT COUNT(user_id) AS cntprofiles FROM ma_users WHERE user_payment_status=1 AND user_settleted_status=0 AND user_status=1 AND user_gender='$type' ORDER BY user_id DESC";
		}		
		return $this->db->query($sql)->row();
	}
	public function get_user_profiles($table,$columnname,$status,$ordercolumnname,$orderby,$othercolumnname,$value,$othercolumnname2,$value2,$limit,$start) 
	{
       	$this->db->join('ma_user_personal_info','ma_user_personal_info.upi_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_restricted_details','ma_user_restricted_details.urd_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_educational_details','ma_user_educational_details.ued_user_id = ma_users.user_id','left');
		$this->db->where($columnname.'=',$status);
		$this->db->where('user_settleted_status=',0);
		$this->db->where('user_payment_status=',1);
		if($value!=""){
			$this->db->where($othercolumnname,$value);
		}
		if($othercolumnname2=='randomsilk'){
			$this->db->order_by($ordercolumnname,$orderby);
		}else{
			if($value2!=""){
				$this->db->where($othercolumnname2,$value2);
			}
			if($ordercolumnname!=""){
				$this->db->order_by($ordercolumnname,$orderby);
			}
		}
		$this->db->limit($limit, $start);	
		// echo $this->db->get_compiled_select();
		// exit();
        return $this->db->get($table)->result();
    }
	function countoflikedprofiles($userid){
		$sql ="SELECT COUNT(ulp_id) AS cntprofiles FROM ma_user_liked_profiles WHERE ulp_user_id_from='$userid' AND ulp_status=1";
		return $this->db->query($sql)->row();
	}
	public function get_user_liked_profiles($table,$columnname,$status,$ordercolumnname,$orderby,$othercolumnname,$value,$limit,$start) 
	{
       	$this->db->join('ma_users','ma_users.user_id = ma_user_liked_profiles.ulp_user_id_to','left');
       	$this->db->join('ma_user_personal_info','ma_user_personal_info.upi_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_restricted_details','ma_user_restricted_details.urd_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_educational_details','ma_user_educational_details.ued_user_id = ma_users.user_id','left');
		$this->db->where($columnname.'=',$status);
		$this->db->where('user_status=',1);
		$this->db->where('user_settleted_status=',0);
		$this->db->where('user_payment_status=',1);
		if($value!=""){
			$this->db->where($othercolumnname,$value);
		}
		if($ordercolumnname!=""){
			$this->db->order_by($ordercolumnname,$orderby);
		}
		$this->db->limit($limit, $start);	
		// echo $this->db->get_compiled_select();
		// exit();
        return $this->db->get($table)->result();
    }
	function countofservices($type,$servicemasterid){
		// if($type=="featured"){
			$sql ="SELECT COUNT(serviceid) AS cntservices FROM ma_services WHERE servicemasterid='$servicemasterid' AND servicefeatured=1 AND servicestatus=1 ORDER BY serviceid DESC";
		// }else if($type=="latest"){
			// $sql ="SELECT COUNT(serviceid) AS cntservices FROM ma_services WHERE servicemasterid='$servicemasterid' AND servicestatus=1 ORDER BY serviceid DESC";
		// }		
		return $this->db->query($sql)->row();
	}
	public function getServiceList($table,$columnname,$status,$ordercolumnname,$orderby,$othercolumnname,$value,$othercolumnname2,$value2,$limit,$start){
		if($value!=""){
			$this->db->where($othercolumnname,$value);
		}		
		// if($value2!=""){
			// $this->db->where($othercolumnname2,$value2);
		// }
		if($ordercolumnname!=""){
			$this->db->order_by($othercolumnname2,$orderby);
			$this->db->order_by($ordercolumnname,$orderby);
		}
		$this->db->limit($limit, $start);
		// echo $this->db->get_compiled_select();
		// exit();
		return $this->db->get($table)->result();
	}
	function getFamailyDetails($table,$id,$columnname,$status,$stcolumnname){
		$this->db->where($columnname,$id);
		if($status==2){
			$this->db->where($stcolumnname.'!=',$status);
		}else{
			$this->db->where($stcolumnname,$status);
		} 
        return $this->db->get($table)->row();
    }
	function getUserDetails($table,$id,$columnname,$status,$stcolumnname){
		$this->db->join('ma_user_personal_info','ma_user_personal_info.upi_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_restricted_details','ma_user_restricted_details.urd_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_educational_details','ma_user_educational_details.ued_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_family_details','ma_user_family_details.upd_user_id = ma_users.user_id','left');
		$this->db->join('ma_user_partner_prefered_details','ma_user_partner_prefered_details.uppd_user_id = ma_users.user_id','left');
	    $this->db->where($columnname,$id);
		if($status==2){
			$this->db->where($stcolumnname.'!=',$status);
		}else{
			$this->db->where($stcolumnname,$status);
		} 
        return $this->db->get($table)->row();
    }
	function searchingprofiles($user_gender,$uppd_from_age,$uppd_to_age,$uppd_professionname,$upi_caste,$limit,$offset,$registerid){
		if($uppd_professionname!="" && $upi_caste!=""){
			$sql = "SELECT * FROM ma_users u LEFT JOIN ma_user_restricted_details urd ON urd.urd_user_id = u.user_id LEFT JOIN ma_user_personal_info upi ON upi.upi_user_id = u.user_id LEFT JOIN ma_user_partner_prefered_details uppd ON uppd.uppd_user_id = u.user_id LEFT JOIN ma_user_educational_details ued ON ued.ued_user_id = u.user_id WHERE user_gender = '$user_gender' AND uppd_from_age>='$uppd_from_age' AND uppd_to_age <='$uppd_to_age' AND uppd_profession = '$uppd_professionname' AND upi_caste = '$upi_caste' AND user_status=1 AND user_payment_status=1 AND user_settleted_status=0 ORDER BY user_id DESC LIMIT $offset,$limit";
		}else if($uppd_professionname!="" && $upi_caste==""){
			$sql = "SELECT * FROM ma_users u LEFT JOIN ma_user_restricted_details urd ON urd.urd_user_id = u.user_id LEFT JOIN ma_user_personal_info upi ON upi.upi_user_id = u.user_id LEFT JOIN ma_user_partner_prefered_details uppd ON uppd.uppd_user_id = u.user_id LEFT JOIN ma_user_educational_details ued ON ued.ued_user_id = u.user_id WHERE user_gender = '$user_gender' AND uppd_from_age>='$uppd_from_age' AND uppd_to_age <='$uppd_to_age' AND uppd_profession = '$uppd_professionname' AND user_status=1 AND user_payment_status=1 AND user_settleted_status=0 ORDER BY user_id DESC LIMIT $offset,$limit";
		}else if($uppd_professionname=="" && $upi_caste!=""){
			$sql = "SELECT * FROM ma_users u LEFT JOIN ma_user_restricted_details urd ON urd.urd_user_id = u.user_id LEFT JOIN ma_user_personal_info upi ON upi.upi_user_id = u.user_id LEFT JOIN ma_user_partner_prefered_details uppd ON uppd.uppd_user_id = u.user_id LEFT JOIN ma_user_educational_details ued ON ued.ued_user_id = u.user_id WHERE user_gender = '$user_gender' AND uppd_from_age>='$uppd_from_age' AND uppd_to_age <='$uppd_to_age' AND upi_caste = '$upi_caste' AND user_status=1 AND user_payment_status=1 AND user_settleted_status=0 ORDER BY user_id DESC LIMIT $offset,$limit";
		}else{
			if($registerid!=""){
				$sql = "SELECT * FROM ma_users u LEFT JOIN ma_user_restricted_details urd ON urd.urd_user_id = u.user_id LEFT JOIN ma_user_personal_info upi ON upi.upi_user_id = u.user_id LEFT JOIN ma_user_partner_prefered_details uppd ON uppd.uppd_user_id = u.user_id LEFT JOIN ma_user_educational_details ued ON ued.ued_user_id = u.user_id WHERE user_registeredid = '$registerid' AND user_status=1 AND user_payment_status=1 AND user_settleted_status=0 ORDER BY user_id DESC LIMIT 1";
			}else{
				$sql = "SELECT * FROM ma_users u LEFT JOIN ma_user_restricted_details urd ON urd.urd_user_id = u.user_id LEFT JOIN ma_user_personal_info upi ON upi.upi_user_id = u.user_id LEFT JOIN ma_user_partner_prefered_details uppd ON uppd.uppd_user_id = u.user_id LEFT JOIN ma_user_educational_details ued ON ued.ued_user_id = u.user_id WHERE user_gender = '$user_gender' AND uppd_from_age>='$uppd_from_age' AND uppd_to_age <='$uppd_to_age' AND user_status=1 AND user_payment_status=1 AND user_settleted_status=0 ORDER BY user_id DESC LIMIT $offset,$limit";
			}			
		}
		// echo "<pre>";print_r($sql);exit;
		if($registerid!=""){
			return $this->db->query($sql)->result();
		}else{
			return $this->db->query($sql)->result();
		}		
	}
	function countofsearchingprofiles($user_gender,$uppd_from_age,$uppd_to_age,$uppd_professionname,$upi_caste){
		if($uppd_professionname!="" && $upi_caste!=""){
			$sql = "SELECT COUNT(user_id) as cnt FROM ma_users u LEFT JOIN ma_user_restricted_details urd ON urd.urd_user_id = u.user_id LEFT JOIN ma_user_personal_info upi ON upi.upi_user_id = u.user_id LEFT JOIN ma_user_partner_prefered_details uppd ON uppd.uppd_user_id = u.user_id WHERE user_gender = '$user_gender' AND uppd_from_age>='$uppd_from_age' AND uppd_to_age <='$uppd_to_age' AND uppd_profession = '$uppd_professionname' AND upi_caste = '$upi_caste' AND user_status=1 AND user_payment_status=1 AND user_settleted_status=0";
		}else if($uppd_professionname!="" && $upi_caste==""){
			$sql = "SELECT COUNT(user_id) as cnt FROM ma_users u LEFT JOIN ma_user_restricted_details urd ON urd.urd_user_id = u.user_id LEFT JOIN ma_user_personal_info upi ON upi.upi_user_id = u.user_id LEFT JOIN ma_user_partner_prefered_details uppd ON uppd.uppd_user_id = u.user_id WHERE user_gender = '$user_gender' AND uppd_from_age>='$uppd_from_age' AND uppd_to_age <='$uppd_to_age' AND uppd_profession = '$uppd_professionname' AND user_status=1 AND user_payment_status=1 AND user_settleted_status=0";
		}else if($uppd_professionname=="" && $upi_caste!=""){
			$sql = "SELECT COUNT(user_id) as cnt FROM ma_users u LEFT JOIN ma_user_restricted_details urd ON urd.urd_user_id = u.user_id LEFT JOIN ma_user_personal_info upi ON upi.upi_user_id = u.user_id LEFT JOIN ma_user_partner_prefered_details uppd ON uppd.uppd_user_id = u.user_id WHERE user_gender = '$user_gender' AND uppd_from_age>='$uppd_from_age' AND uppd_to_age <='$uppd_to_age' AND upi_caste = '$upi_caste' AND user_status=1 AND user_payment_status=1 AND user_settleted_status=0";
		}else{
			$sql = "SELECT COUNT(user_id) as cnt FROM ma_users u LEFT JOIN ma_user_restricted_details urd ON urd.urd_user_id = u.user_id LEFT JOIN ma_user_personal_info upi ON upi.upi_user_id = u.user_id LEFT JOIN ma_user_partner_prefered_details uppd ON uppd.uppd_user_id = u.user_id WHERE user_gender = '$user_gender' AND uppd_from_age>='$uppd_from_age' AND uppd_to_age <='$uppd_to_age' AND user_status=1 AND user_payment_status=1 AND user_settleted_status=0";
		}
		return $this->db->query($sql)->row();
	}
	function searchresultsdetails($tablename,$columnone,$columnonevalue,$columntwo,$columntwovalue,$statuscolumn,$statusvalue,$ordercolumn,$ordertype){
		if($columntwovalue!=""){
			if($columnonevalue!=""){
				$sql = "SELECT * FROM ".$tablename." WHERE ".$statuscolumn." != ".$statusvalue." AND ".$columnone."='".$columnonevalue."' AND ".$columntwo." LIKE '%".$columntwovalue."%' ORDER BY ".$ordercolumn." ".$ordertype."";
			}else{
				$sql = "SELECT * FROM ".$tablename." WHERE ".$statuscolumn." != ".$statusvalue." AND  ".$columntwo." LIKE '%".$columntwovalue."%' ORDER BY ".$ordercolumn." ".$ordertype."";
			}
		}else{
			$sql = "SELECT * FROM ".$tablename." WHERE ".$statuscolumn." != ".$statusvalue." AND ".$columnone."='".$columnonevalue."' ORDER BY ".$ordercolumn." ".$ordertype."";
		}	
		return $this->db->query($sql)->result();
	}
}