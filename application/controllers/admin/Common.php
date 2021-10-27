<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Common extends MY_Controller {
		function __construct() {
			parent::__construct();
			$this->login_required();
			$this->load->library(array('email','form_validation','session','pagination'));
			$this->load->model('admin/Settings_model');
			$this->load->model('admin/Common_model');
			$this->load->helper('url');
		}
		public function serviceslist(){
			$this->data['maserviceslist']=$this->Common_model->get_data_status('ma_servicemaster','servicemasterstatus',2,'servicemasterid','DESC');
			$this->data['page_title']='Services List';
			$this->data['page']='serviceslist';
			$this->admin_view('serviceslist');
		}
		public function resetnewpassword(){
			if(isset($_GET['user_registeredid']) && $_GET['user_registeredid']!=""){
				$this->data['page_title']='Reset Password';
				$this->data['page']='resetnewpassword';
				$this->admin_view('resetnewpassword');
			}else{
				redirect(base_url().'admin/common/allprofileslist');
			}
		}
		public function addservice(){
			$this->load->helper(array('common'));
			if(isset($_POST['servicemastername']) && $_POST['servicemastername']!=""){
				$error = 1;
				if(isset($_FILES['servicemasterwebimage']['name']) && $_FILES['servicemasterwebimage']['name'] != ''){
					$servicemasterwebimage = date('dmYHis').str_replace(" ", "", basename($_FILES['servicemasterwebimage']['name']));
					$catimgg = './servicepics/'.$servicemasterwebimage;
					if(move_uploaded_file($_FILES['servicemasterwebimage']['tmp_name'],$catimgg)){
						$error = 1;
					}else{
						$error = 0;
					}
				}else if(isset($_POST['h_servicemasterwebimage']) && $_POST['h_servicemasterwebimage']!=""){
					$servicemasterwebimage = $_POST['h_servicemasterwebimage'];
				}			
				$servicemastername = $_POST['servicemastername'];
				$servicemasterseo  = seo_friendly_url($servicemastername);
				$error1 = 1;
				if(isset($_FILES['servicemastermobileimage']['name']) && $_FILES['servicemastermobileimage']['name'] != ''){
					$servicemastermobileimage = 'mob_'.date('dmYHis').str_replace(" ", "", basename($_FILES['servicemastermobileimage']['name']));
					$cmimage = './servicepics/'.$servicemastermobileimage;
					if(move_uploaded_file($_FILES['servicemastermobileimage']['tmp_name'],$cmimage)){
						$error1 = 1;
					}else{
						$error1 = 0;
					}			
				}else if(isset($_POST['h_servicemastermobileimage']) && $_POST['h_servicemastermobileimage']!=""){
					$servicemastermobileimage = $_POST['h_servicemastermobileimage'];
				}
				$communitydata = array(
					'servicemastername'        => $servicemastername,
					'servicemasterwebimage'    => $servicemasterwebimage,
					'servicemastermobileimage' => $servicemastermobileimage,
					'servicemasterseo'         => $servicemasterseo,
				);			
				$insertid = $this->Common_model->add('ma_servicemaster',$communitydata);
				if($insertid){	
					$servicemasterdisplayid = 'SERVICE'.date('y').str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
					$communityudata = array(
						'servicemasterdisplayid' => $servicemasterdisplayid,
					);	
					$updatedstatus = $this->Common_model->update('ma_servicemaster',$communityudata,$insertid,'servicemasterid');
					$this->session->set_flashdata('success_message', '"Service added successfully","Success"');
					redirect(base_url().'admin/common/serviceslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/common/addservice');
				}
			}else{
				$this->data['page_title']='Add Service';
				$this->data['page']='addservice';
				$this->admin_view('addservice');
			}		
		}
		public function editservice(){
			$this->load->helper(array('common'));
			if(isset($_POST['servicemasterdisplayid']) && $_POST['servicemasterdisplayid']!=""){
				$servicemasterdisplayid = $_POST['servicemasterdisplayid'];
				$error = 1;
				if(isset($_FILES['servicemasterwebimage']['name']) && $_FILES['servicemasterwebimage']['name'] != ''){
					$servicemasterwebimage = date('dmYHis').str_replace(" ", "", basename($_FILES['servicemasterwebimage']['name']));
					$catimgg = './servicepics/'.$servicemasterwebimage;
					if(move_uploaded_file($_FILES['servicemasterwebimage']['tmp_name'],$catimgg)){
						$error = 1;
					}else{
						$error = 0;
					}
				}else if(isset($_POST['h_servicemasterwebimage']) && $_POST['h_servicemasterwebimage']!=""){
					$servicemasterwebimage = $_POST['h_servicemasterwebimage'];
				}			
				$servicemastername    = $_POST['servicemastername'];
				$error1 = 1;
				if(isset($_FILES['servicemastermobileimage']['name']) && $_FILES['servicemastermobileimage']['name'] != ''){
					$servicemastermobileimage = 'mob_'.date('dmYHis').str_replace(" ", "", basename($_FILES['servicemastermobileimage']['name']));
					$cmimage = './servicepics/'.$servicemastermobileimage;
					if(move_uploaded_file($_FILES['servicemastermobileimage']['tmp_name'],$cmimage)){
						$error1 = 1;
					}else{
						$error1 = 0;
					}			
				}else if(isset($_POST['h_servicemastermobileimage']) && $_POST['h_servicemastermobileimage']!=""){
					$servicemastermobileimage = $_POST['h_servicemastermobileimage'];
				}
				$servicemasterseo  = seo_friendly_url($servicemastername);
				$communitydata = array(
					'servicemastername'         => $servicemastername,
					'servicemasterseo'          => $servicemasterseo,
					'servicemasterwebimage'     => $servicemasterwebimage,
					'servicemastermobileimage'  => $servicemastermobileimage,
				);			
				$updatedstatus = $this->Common_model->update('ma_servicemaster',$communitydata,$servicemasterdisplayid,'servicemasterdisplayid');
				if($updatedstatus){	
					$this->session->set_flashdata('success_message','"Service Updated Successfully","Success"');
					redirect(base_url().'admin/common/serviceslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/common/editservice?servicemasterid='.$servicemasterdisplayid);
				}
			}else{
				if(isset($_GET['servicemasterid']) && $_GET['servicemasterid']!=""){
					$servicemasterdisplayid = $_GET['servicemasterid'];
					$this->data['servicedetails']=$this->Common_model->get_single_data('ma_servicemaster',$servicemasterdisplayid,'servicemasterdisplayid');
					$this->data['page_title']='Edit Service';
					$this->data['page']='editservice';
					$this->admin_view('editservice');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/common/serviceslist');
				}			
			}		
		}
		public function bannerslist(){
			$this->data['mabannerslist']=$this->Common_model->get_data_status('ma_banners','bannerstatus',2,'bannerid','DESC');
			$this->data['page_title']='Banner List';
			$this->data['page']='bannerslist';
			$this->admin_view('bannerslist');
		}
		public function addbanner(){
			$this->load->helper(array('common'));
			if(isset($_POST['bannertitle']) && $_POST['bannertitle']!=""){
				$error = 1;
				if(isset($_FILES['bannerwebimage']['name']) && $_FILES['bannerwebimage']['name'] != ''){
					$bannerwebimage = date('dmYHis').str_replace(" ", "", basename($_FILES['bannerwebimage']['name']));
					$catimgg = './bannerpics/'.$bannerwebimage;
					if(move_uploaded_file($_FILES['bannerwebimage']['tmp_name'],$catimgg)){
						$error = 1;
					}else{
						$error = 0;
					}
				}else if(isset($_POST['h_bannerwebimage']) && $_POST['h_bannerwebimage']!=""){
					$bannerwebimage = $_POST['h_bannerwebimage'];
				}			
				$bannertitle = $_POST['bannertitle'];
				$bannertitleseo  = seo_friendly_url($bannertitle);
				$error1 = 1;
				if(isset($_FILES['bannermobileimage']['name']) && $_FILES['bannermobileimage']['name'] != ''){
					$bannermobileimage = 'mob_'.date('dmYHis').str_replace(" ", "", basename($_FILES['bannermobileimage']['name']));
					$cmimage = './bannerpics/'.$bannermobileimage;
					if(move_uploaded_file($_FILES['bannermobileimage']['tmp_name'],$cmimage)){
						$error1 = 1;
					}else{
						$error1 = 0;
					}			
				}else if(isset($_POST['h_bannermobileimage']) && $_POST['h_bannermobileimage']!=""){
					$bannermobileimage = $_POST['h_bannermobileimage'];
				}
				$communitydata = array(
					'bannertitle'       => $bannertitle,
					'bannerwebimage'    => $bannerwebimage,
					'bannermobileimage' => $bannermobileimage,
				);			
				$insertid = $this->Common_model->add('ma_banners',$communitydata);
				if($insertid){	
					$bannerdisplayid = 'BANNER'.date('y').str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
					$communityudata = array(
						'bannerdisplayid' => $bannerdisplayid,
					);	
					$updatedstatus = $this->Common_model->update('ma_banners',$communityudata,$insertid,'bannerid');
					$this->session->set_flashdata('success_message', '"Banner added successfully","Success"');
					redirect(base_url().'admin/common/bannerslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/common/addbanner');
				}
			}else{
				$this->data['page_title']='Add Banner';
				$this->data['page']='addbanner';
				$this->admin_view('addbanner');
			}		
		}
		public function editbanner(){
			$this->load->helper(array('common'));
			if(isset($_POST['bannerdisplayid']) && $_POST['bannerdisplayid']!=""){
				$bannerdisplayid = $_POST['bannerdisplayid'];
				$error = 1;
				if(isset($_FILES['bannerwebimage']['name']) && $_FILES['bannerwebimage']['name'] != ''){
					$bannerwebimage = date('dmYHis').str_replace(" ", "", basename($_FILES['bannerwebimage']['name']));
					$catimgg = './bannerpics/'.$bannerwebimage;
					if(move_uploaded_file($_FILES['bannerwebimage']['tmp_name'],$catimgg)){
						$error = 1;
					}else{
						$error = 0;
					}
				}else if(isset($_POST['h_bannerwebimage']) && $_POST['h_bannerwebimage']!=""){
					$bannerwebimage = $_POST['h_bannerwebimage'];
				}			
				$bannertitle    = $_POST['bannertitle'];
				$error1 = 1;
				if(isset($_FILES['bannermobileimage']['name']) && $_FILES['bannermobileimage']['name'] != ''){
					$bannermobileimage = 'mob_'.date('dmYHis').str_replace(" ", "", basename($_FILES['bannermobileimage']['name']));
					$cmimage = './bannerpics/'.$bannermobileimage;
					if(move_uploaded_file($_FILES['bannermobileimage']['tmp_name'],$cmimage)){
						$error1 = 1;
					}else{
						$error1 = 0;
					}			
				}else if(isset($_POST['h_bannermobileimage']) && $_POST['h_bannermobileimage']!=""){
					$bannermobileimage = $_POST['h_bannermobileimage'];
				}
				$bannertitlerseo  = seo_friendly_url($bannertitle);
				$communitydata = array(
					'bannertitle'         => $bannertitle,
					'bannerwebimage'     => $bannerwebimage,
					'bannermobileimage'  => $bannermobileimage,
				);			
				$updatedstatus = $this->Common_model->update('ma_banners',$communitydata,$bannerdisplayid,'bannerdisplayid');
				if($updatedstatus){	
					$this->session->set_flashdata('success_message','"Banner Updated Successfully","Success"');
					redirect(base_url().'admin/common/bannerslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/common/editbanner?bannerid='.$servicemasterdisplayid);
				}
			}else{
				if(isset($_GET['bannerid']) && $_GET['bannerid']!=""){
					$bannerdisplayid = $_GET['bannerid'];
					$this->data['bannerdetails']=$this->Common_model->get_single_data('ma_banners',$bannerdisplayid,'bannerdisplayid');
					$this->data['page_title']='Edit Banner';
					$this->data['page']='editbanner';
					$this->admin_view('editbanner');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/common/bannerslist');
				}			
			}		
		}
		public function userserviceslist(){
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$sid = "";
			if(isset($_GET['sid']) && $_GET['sid']!=""){
				$sid = $_GET['sid'];
			}
			$this->data['userserviceslist'] = $this->Common_model->get_data_multiple_columns_records('ma_services','servicestatus',2,'serviceid','DESC','servicemasterid',$sid);
			
			$this->data['page_title']='User Services List';
			$this->data['page']='userserviceslist';
			$this->admin_view('userserviceslist');
		}
		public function adduserservice(){
			$this->load->helper(array('common'));
			if(isset($_POST['servicemasterid']) && $_POST['servicemasterid']!=""){
				if(isset($_POST['servicename']) && $_POST['servicename']!=""){
					$error = 1;
					if(isset($_FILES['servicewebimage']['name']) && $_FILES['servicewebimage']['name'] != ''){
						$servicewebimage = date('dmYHis').str_replace(" ", "", basename($_FILES['servicewebimage']['name']));
						$catimgg = './userservicepics/'.$servicewebimage;
						if(move_uploaded_file($_FILES['servicewebimage']['tmp_name'],$catimgg)){
							$error = 1;
						}else{
							$error = 0;
						}
					}else if(isset($_POST['h_servicewebimage']) && $_POST['h_servicewebimage']!=""){
						$servicewebimage = $_POST['h_servicewebimage'];
					}			
					$servicename = $_POST['servicename'];
					$serviceaccessname  = seo_friendly_url($servicename);
					$error1 = 1;
					if(isset($_FILES['servicemobileimage']['name']) && $_FILES['servicemobileimage']['name'] != ''){
						$servicemobileimage = 'mob_'.date('dmYHis').str_replace(" ", "", basename($_FILES['servicemobileimage']['name']));
						$cmimage = './userservicepics/'.$servicemobileimage;
						if(move_uploaded_file($_FILES['servicemobileimage']['tmp_name'],$cmimage)){
							$error1 = 1;
						}else{
							$error1 = 0;
						}			
					}else if(isset($_POST['h_servicemobileimage']) && $_POST['h_servicemobileimage']!=""){
						$servicemobileimage = $_POST['h_servicemobileimage'];
					}
					
					$servicemasterid ="";
					$serviceparentname ="";
					if(isset($_POST['servicemasterid']) && $_POST['servicemasterid']!=""){
						$servicemasterid = $_POST['servicemasterid'];
						$servicedetails = $this->Common_model->get_single_data('ma_servicemaster',$servicemasterid,'servicemasterdisplayid');
						if(isset($servicedetails->servicemastername) && $servicedetails->servicemastername!=""){
							$serviceparentname = ucfirst($servicedetails->servicemastername);
						}
					}
					$serviceemailaddress ="";
					if(isset($_POST['serviceemailaddress']) && $_POST['serviceemailaddress']!=""){
						$serviceemailaddress = $_POST['serviceemailaddress'];
					}
					$serviceprimarycontactnumber ="";
					if(isset($_POST['serviceprimarycontactnumber']) && $_POST['serviceprimarycontactnumber']!=""){
						$serviceprimarycontactnumber = $_POST['serviceprimarycontactnumber'];
					}
					$servicesecondarycontactnumber ="";
					if(isset($_POST['servicesecondarycontactnumber']) && $_POST['servicesecondarycontactnumber']!=""){
						$servicesecondarycontactnumber = $_POST['servicesecondarycontactnumber'];
					}
					$servicelandlinenumber ="";
					if(isset($_POST['servicelandlinenumber_c']) && $_POST['servicelandlinenumber_c']!=""){
						$servicelandlinenumberc = $_POST['servicelandlinenumber_c'];
						if(isset($_POST['servicelandlinenumber']) && $_POST['servicelandlinenumber']!=""){
							$servicelandlinenumber = $servicelandlinenumberc.' - '.$_POST['servicelandlinenumber'];
						}
					}					
					$servicewebsite ="";
					if(isset($_POST['servicewebsite']) && $_POST['servicewebsite']!=""){
						$servicewebsite = $_POST['servicewebsite'];
					}
					$serviceaddress ="";
					if(isset($_POST['serviceaddress']) && $_POST['serviceaddress']!=""){
						$serviceaddress = $_POST['serviceaddress'];
					}
					
					$serviceskil1 ="";
					if(isset($_POST['serviceskil1']) && $_POST['serviceskil1']!=""){
						$serviceskil1 = $_POST['serviceskil1'];
					}
					$serviceskil2 ="";
					if(isset($_POST['serviceskil2']) && $_POST['serviceskil2']!=""){
						$serviceskil2 = $_POST['serviceskil2'];
					}
					$serviceskil3 ="";
					if(isset($_POST['serviceskil3']) && $_POST['serviceskil3']!=""){
						$serviceskil3 = $_POST['serviceskil3'];
					}
					$serviceskil4 ="";
					if(isset($_POST['serviceskil4']) && $_POST['serviceskil4']!=""){
						$serviceskil4 = $_POST['serviceskil4'];
					}
					
					$servicefromdate ="";
					if(isset($_POST['servicefromdate']) && $_POST['servicefromdate']!=""){
						$servicefromdate = $_POST['servicefromdate'];
					}
					$servicetodate ="";
					if(isset($_POST['servicetodate']) && $_POST['servicetodate']!=""){
						$servicetodate = $_POST['servicetodate'];
					}
					
					$servicevaliditydays = 0;
					$date1 = date_create($servicefromdate);
					$date2 = date_create($servicetodate);
					$diff  = date_diff($date1,$date2);
					$servicevaliditydays = $diff->format("%a");
			
					$communitydata = array(
						'servicemasterid'      => $servicemasterid,
						'serviceparentname'    => $serviceparentname,
						'servicemobileimage'   => $servicemobileimage,
						'servicewebimage'      => $servicewebimage,
						'servicename'          => $servicename,
						'serviceaccessname'    => $serviceaccessname,
						'serviceemailaddress'            => $serviceemailaddress,
						'serviceprimarycontactnumber'    => $serviceprimarycontactnumber,
						'servicesecondarycontactnumber'  => $servicesecondarycontactnumber,
						'servicelandlinenumber' => $servicelandlinenumber,
						'serviceaddress' => $serviceaddress,
						'servicewebsite' => $servicewebsite,
						'serviceskil1'   => $serviceskil1,
						'serviceskil2'   => $serviceskil2,
						'serviceskil3'   => $serviceskil3,
						'serviceskil4'   => $serviceskil4,
						'servicefromdate' => $servicefromdate,
						'servicetodate'  => $servicetodate,
						'servicevaliditydays'  => $servicevaliditydays,
					);			
					$insertid = $this->Common_model->add('ma_services',$communitydata);
					if($insertid){	
						$servicedisplayid = 'USERSERVICE'.date('y').str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
						$communityudata = array(
							'servicedisplayid' => $servicedisplayid,
						);	
						$updatedstatus = $this->Common_model->update('ma_services',$communityudata,$insertid,'serviceid');
						$this->session->set_flashdata('success_message', '"Service added successfully","Success"');
						redirect(base_url().'admin/common/userserviceslist');
					}else{
						$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
						redirect(base_url().'admin/common/adduserservice');
					}
				}else{
					$this->session->set_flashdata('error_message', '"Service name is required.","Failed!"');
					redirect(base_url().'admin/common/adduserservice');
				}
			}else{
				$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
				$this->data['page_title']='User Add Service';
				$this->data['page']='adduserservice';
				$this->admin_view('adduserservice');
			}		
		}
		public function edituserservice(){
			$this->load->helper(array('common'));
			if(isset($_POST['servicedisplayid']) && $_POST['servicedisplayid']!=""){				
				$servicedisplayid = $_POST['servicedisplayid'];
				$error = 1;
				if(isset($_FILES['servicewebimage']['name']) && $_FILES['servicewebimage']['name'] != ''){
					$servicewebimage = date('dmYHis').str_replace(" ", "", basename($_FILES['servicewebimage']['name']));
					$catimgg = './userservicepics/'.$servicewebimage;
					if(move_uploaded_file($_FILES['servicewebimage']['tmp_name'],$catimgg)){
						$error = 1;
					}else{
						$error = 0;
					}
				}else if(isset($_POST['h_servicewebimage']) && $_POST['h_servicewebimage']!=""){
					$servicewebimage = $_POST['h_servicewebimage'];
				}			
				$servicename = $_POST['servicename'];
				$serviceaccessname  = seo_friendly_url($servicename);
				$error1 = 1;
				if(isset($_FILES['servicemobileimage']['name']) && $_FILES['servicemobileimage']['name'] != ''){
					$servicemobileimage = 'mob_'.date('dmYHis').str_replace(" ", "", basename($_FILES['servicemobileimage']['name']));
					$cmimage = './userservicepics/'.$servicemobileimage;
					if(move_uploaded_file($_FILES['servicemobileimage']['tmp_name'],$cmimage)){
						$error1 = 1;
					}else{
						$error1 = 0;
					}			
				}else if(isset($_POST['h_servicemobileimage']) && $_POST['h_servicemobileimage']!=""){
					$servicemobileimage = $_POST['h_servicemobileimage'];
				}
				
				$servicemasterid ="";
				$serviceparentname ="";
				if(isset($_POST['servicemasterid']) && $_POST['servicemasterid']!=""){
					$servicemasterid = $_POST['servicemasterid'];
					$servicedetails = $this->Common_model->get_single_data('ma_servicemaster',$servicemasterid,'servicemasterdisplayid');
					if(isset($servicedetails->servicemastername) && $servicedetails->servicemastername!=""){
						$serviceparentname = ucfirst($servicedetails->servicemastername);
					}
				}
				$serviceemailaddress ="";
				if(isset($_POST['serviceemailaddress']) && $_POST['serviceemailaddress']!=""){
					$serviceemailaddress = $_POST['serviceemailaddress'];
				}
				$serviceprimarycontactnumber ="";
				if(isset($_POST['serviceprimarycontactnumber']) && $_POST['serviceprimarycontactnumber']!=""){
					$serviceprimarycontactnumber = $_POST['serviceprimarycontactnumber'];
				}
				$servicesecondarycontactnumber ="";
				if(isset($_POST['servicesecondarycontactnumber']) && $_POST['servicesecondarycontactnumber']!=""){
					$servicesecondarycontactnumber = $_POST['servicesecondarycontactnumber'];
				}
				$servicelandlinenumber ="";
				if(isset($_POST['servicelandlinenumber_c']) && $_POST['servicelandlinenumber_c']!=""){
					$servicelandlinenumberc = $_POST['servicelandlinenumber_c'];
					if(isset($_POST['servicelandlinenumber']) && $_POST['servicelandlinenumber']!=""){
						$servicelandlinenumber = $servicelandlinenumberc.'-'.$_POST['servicelandlinenumber'];
					}
				}
				$servicewebsite ="";
				if(isset($_POST['servicewebsite']) && $_POST['servicewebsite']!=""){
					$servicewebsite = $_POST['servicewebsite'];
				}
				$serviceaddress ="";
				if(isset($_POST['serviceaddress']) && $_POST['serviceaddress']!=""){
					$serviceaddress = $_POST['serviceaddress'];
				}
				
				$serviceskil1 ="";
				if(isset($_POST['serviceskil1']) && $_POST['serviceskil1']!=""){
					$serviceskil1 = $_POST['serviceskil1'];
				}
				$serviceskil2 ="";
				if(isset($_POST['serviceskil2']) && $_POST['serviceskil2']!=""){
					$serviceskil2 = $_POST['serviceskil2'];
				}
				$serviceskil3 ="";
				if(isset($_POST['serviceskil3']) && $_POST['serviceskil3']!=""){
					$serviceskil3 = $_POST['serviceskil3'];
				}
				$serviceskil4 ="";
				if(isset($_POST['serviceskil4']) && $_POST['serviceskil4']!=""){
					$serviceskil4 = $_POST['serviceskil4'];
				}
				
				$servicefromdate ="";
				if(isset($_POST['servicefromdate']) && $_POST['servicefromdate']!=""){
					$servicefromdate = $_POST['servicefromdate'];
				}
				$servicetodate ="";
				if(isset($_POST['servicetodate']) && $_POST['servicetodate']!=""){
					$servicetodate = $_POST['servicetodate'];
				}
				$servicefeatured =0;
				if(isset($_POST['servicefeatured']) && $_POST['servicefeatured']!=""){
					$servicefeatured = $_POST['servicefeatured'];
				}
				
				$servicevaliditydays = 0;
				$date1 = date_create($servicefromdate);
				$date2 = date_create($servicetodate);
				$diff  = date_diff($date1,$date2);
				$servicevaliditydays = $diff->format("%a");
		
				$communitydata = array(
					'servicemasterid'      => $servicemasterid,
					'serviceparentname'    => $serviceparentname,
					'servicemobileimage'   => $servicemobileimage,
					'servicewebimage'      => $servicewebimage,
					'servicename'          => $servicename,
					'serviceaccessname'    => $serviceaccessname,
					'serviceemailaddress'            => $serviceemailaddress,
					'serviceprimarycontactnumber'    => $serviceprimarycontactnumber,
					'servicesecondarycontactnumber'  => $servicesecondarycontactnumber,
					'servicelandlinenumber' => $servicelandlinenumber,
					'serviceaddress' => $serviceaddress,
					'servicewebsite' => $servicewebsite,
					'serviceskil1'   => $serviceskil1,
					'serviceskil2'   => $serviceskil2,
					'serviceskil3'   => $serviceskil3,
					'serviceskil4'   => $serviceskil4,
					'servicefromdate' => $servicefromdate,
					'servicetodate'  => $servicetodate,
					'servicevaliditydays'  => $servicevaliditydays,
					'servicefeatured'  => $servicefeatured,
				);
				$updatedstatus = $this->Common_model->update('ma_services',$communitydata,$servicedisplayid,'servicedisplayid');
				if($updatedstatus){	
					$this->session->set_flashdata('success_message','"Service Updated Successfully","Success"');
					redirect(base_url().'admin/common/userserviceslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/common/edituserservice?serviceid='.$servicedisplayid);
				}
			}else{
				if(isset($_GET['serviceid']) && $_GET['serviceid']!=""){
					$servicedisplayid = $_GET['serviceid'];
					$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');					
					$this->data['servicedetails']=$this->Common_model->get_single_data('ma_services',$servicedisplayid,'servicedisplayid');
					$this->data['page_title']='Edit Service';
					$this->data['page']='edituserservice';
					$this->admin_view('edituserservice');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/common/userserviceslist');
				}			
			}		
		}
		public function useremailandmobilechecking(){
			if(isset($_POST['user_email']) && $_POST['user_email']!=""){
				$user_email = $_POST['user_email'];
				$getUserData = $this->Common_model->get_single_data_column('ma_users',$user_email,'user_email','2','user_status');				
				if(isset($getUserData->user_id) && $getUserData->user_id!=""){
					$user_id = $getUserData->user_id;
					$checked =0;
					if(isset($_POST['user_id']) && $_POST['user_id']!=""){
						$uid = $_POST['user_id'];
						if($user_id==$uid){
							$checked =1;
						}
					}
					if($checked){
						$user_mobile = $_POST['user_mobile'];
						$getUserData = $this->Common_model->get_single_data_column('ma_users',$user_mobile,'user_mobile','2','user_status');
						if(isset($getUserData->user_id) && $getUserData->user_id!=""){
							$user_id = $getUserData->user_id;
							$checked =0;
							if(isset($_POST['user_id']) && $_POST['user_id']!=""){
								$uid = $_POST['user_id'];
								if($user_id==$uid){
									$checked =1;
								}
							}
							if($checked){
								echo json_encode(array('status'=>TRUE,'output'=>'success'));exit; 
							}else{
								echo json_encode(array('status'=>FALSE,'output'=>'mobilealreadywithus'));exit; 	
							}					
						}else{
							echo json_encode(array('status'=>TRUE,'output'=>'success'));exit; 
						} 
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'emailalreadywithus'));exit; 
					}						
				}else{
					$user_mobile = $_POST['user_mobile'];
					$getUserData = $this->Common_model->get_single_data_column('ma_users',$user_mobile,'user_mobile','2','user_status');
					if(isset($getUserData->user_id) && $getUserData->user_id!=""){
						$user_id = $getUserData->user_id;
						$checked =0;
						if(isset($_POST['user_id']) && $_POST['user_id']!=""){
							$uid = $_POST['user_id'];
							if($user_id==$uid){
								$checked =1;
							}
						}
						if($checked){
							echo json_encode(array('status'=>TRUE,'output'=>'success'));exit; 
						}else{
							echo json_encode(array('status'=>FALSE,'output'=>'mobilealreadywithus'));exit; 	
						}					
					}else{
						echo json_encode(array('status'=>TRUE,'output'=>'success'));exit; 
					}
				}				
			}
			
		}
		public function saveuserprofiledata(){
			if(isset($_POST['user_email']) && $_POST['user_email']!="" && isset($_POST['user_mobile']) && $_POST['user_mobile']!=""){
				// echo "<pre>";print_r($_FILES);
				// echo "<pre>";print_r($_POST);exit;
				// ini_set('display_errors', 1);
				// ini_set('display_startup_errors', 1);
				// error_reporting(E_ALL);
				
				$user_email = $_POST['user_email'];
				$getUserData = $this->Common_model->get_single_data_column('ma_users',$user_email,'user_email','2','user_status');				
				if(isset($getUserData->user_id) && $getUserData->user_id!=""){
					$user_id = $getUserData->user_id;
					$checked =0;
					if(isset($_POST['user_id']) && $_POST['user_id']!=""){
						$uid = $_POST['user_id'];
						if($user_id==$uid){
							$checked =1;
						}
					}
					if($checked){
						$user_mobile = $_POST['user_mobile'];
						$getUserData = $this->Common_model->get_single_data_column('ma_users',$user_mobile,'user_mobile','2','user_status');
						if(isset($getUserData->user_id) && $getUserData->user_id!=""){
							$user_id = $getUserData->user_id;
							$checked =0;
							if(isset($_POST['user_id']) && $_POST['user_id']!=""){
								$uid = $_POST['user_id'];
								if($user_id==$uid){
									$checked =1;
								}
							}
							if($checked==0){
								$this->session->set_flashdata('error_message', '"Entered mobile number is already with our records.","Failed!"');
								redirect(base_url().'admin/common/addprofile');
							}					
						}
					}else{
						$this->session->set_flashdata('error_message', '"Entered email is already with our records.","Failed!"');
						redirect(base_url().'admin/common/addprofile');
					}						
				}else{
					$user_mobile = $_POST['user_mobile'];
					$getUserData = $this->Common_model->get_single_data_column('ma_users',$user_mobile,'user_mobile','2','user_status');
					if(isset($getUserData->user_id) && $getUserData->user_id!=""){
						$user_id = $getUserData->user_id;
						$checked =0;
						if(isset($_POST['user_id']) && $_POST['user_id']!=""){
							$uid = $_POST['user_id'];
							if($user_id==$uid){
								$checked =1;
							}
						}
						if($checked==0){
							$this->session->set_flashdata('error_message', '"Entered mobile is already with our records.","Failed!"');
							redirect(base_url().'admin/common/addprofile');
						}					
					}
				}				
				
				// echo "<pre>";print_r($_POST);exit;	
				
				// ma_users
				$masterData = array();
				$hideData = array();
				$masterData['user_display_name'] = $_POST['user_display_name'];
				$masterData['user_email'] = $_POST['user_email'];
				$hideData['urd_email'] = $_POST['user_email'];
				$urd_email_is_published = 0;
				if(isset($_POST['user_email']) && $_POST['user_email']!=""){
					if(isset($_POST['urd_email_is_published']) && $_POST['urd_email_is_published']=="on"){
						$urd_email_is_published = 1;
					}
				}
				if(isset($_POST['user_id']) && $_POST['user_id']==""){
					$user_encrpted_password = "";
					$user_encodeed_password = "";
					if(isset($_POST['user_encrpted_password']) && $_POST['user_encrpted_password']!=0){
						$user_encrpted_passwordd = $_POST['user_encrpted_password'];
						$user_encrpted_password  = md5($user_encrpted_passwordd);
						$user_encodeed_password  = base64_encode($user_encrpted_passwordd);
					}
					$masterData['user_encrpted_password'] = $user_encrpted_password;
					$masterData['user_encodeed_password'] = $user_encodeed_password;
				}
				
				$user_is_nri = 0;
				if(isset($_POST['user_is_nri']) && $_POST['user_is_nri']=="on"){
					$user_is_nri = 1;
				}
				$masterData['user_is_nri'] = $user_is_nri;
				$user_is_secondmarriageprofile = 0;
				if(isset($_POST['user_is_secondmarriageprofile']) && $_POST['user_is_secondmarriageprofile']=="on"){
					$user_is_secondmarriageprofile = 1;
				}
				$masterData['user_is_secondmarriageprofile'] = $user_is_secondmarriageprofile;
				$user_is_featured = 0;
				if(isset($_POST['user_is_featured']) && $_POST['user_is_featured']=="on"){
					$user_is_featured = 1;
				}
				$masterData['user_is_featured'] = $user_is_featured;
				
				// echo "<pre>";print_r($masterData);exit;
				
				$hideData['urd_email_is_published'] = $urd_email_is_published;
				$masterData['user_mobile'] = $_POST['user_mobile'];
				$hideData['urd_primaryconactnumber'] = $_POST['user_mobile'];
				$urd_primarycontactnumber_is_published = 0;
				if(isset($_POST['urd_primarycontactnumber_is_published']) && $_POST['urd_primarycontactnumber_is_published']=="on"){
					$urd_primarycontactnumber_is_published = 1;
				}
				$hideData['urd_primarycontactnumber_is_published'] = $urd_primarycontactnumber_is_published;
				$hideData['urd_contactnumber'] = $_POST['urd_contactnumber'];
				$urd_contactnumber_is_published = 0;
				if(isset($_POST['urd_contactnumber_is_published']) && $_POST['urd_contactnumber_is_published']=="on"){
					$urd_contactnumber_is_published = 1;
				}
				$hideData['urd_contactnumber_is_published'] = $urd_contactnumber_is_published;
				$hideData['urd_landlinenumber'] ="";
				if(isset($_POST['urd_landlinenumber_c']) && $_POST['urd_landlinenumber_c']!=""){
					$hideData['urd_landlinenumber'] = $_POST['urd_landlinenumber_c']."-".$_POST['urd_landlinenumber'];
				}
				// $hideData['urd_landlinenumber'] = $_POST['urd_landlinenumber'];
				$urd_landinenumber_is_published = 0;
				if(isset($_POST['urd_landinenumber_is_published']) && $_POST['urd_landinenumber_is_published']=="on"){
					$urd_landinenumber_is_published = 1;
				}
				$hideData['urd_landinenumber_is_published'] = $urd_landinenumber_is_published;
				
				$urd_native_district = "";
				if(isset($_POST['urd_native_district']) && $_POST['urd_native_district']!=""){
					$urd_native_district = $_POST['urd_native_district'];
				}
				$hideData['urd_native_district'] = $urd_native_district;
				$urd_communication_address_is_published = 0;
				if(isset($_POST['urd_communication_address_is_published']) && $_POST['urd_communication_address_is_published']=="on"){
					$urd_communication_address_is_published = 1;
				}
				$hideData['urd_communication_address_is_published'] = $urd_communication_address_is_published;
				$urd_communication_resident_type = "";
				if(isset($_POST['urd_communication_resident_type']) && $_POST['urd_communication_resident_type']!=""){
					$urd_communication_resident_type = $_POST['urd_communication_resident_type'];
				}
				$hideData['urd_communication_resident_type'] = $urd_communication_resident_type;				
				$urd_communication_address = "";
				if(isset($_POST['urd_communication_address']) && $_POST['urd_communication_address']!=""){
					$urd_communication_address = $_POST['urd_communication_address'];
				}
				$hideData['urd_communication_address'] = $urd_communication_address;				
								
				$masterData['user_gender'] = $_POST['user_gender'];
				
				
				$masterData['user_updatedat'] = date('Y-m-d H:i:s');
				$hideData['urd_updatedat'] = date('Y-m-d H:i:s');
				
				$hideData['urd_profile_pic'] = NULL;
				$error = 1;
				$urd_profilepicimage = NULL;
				if(isset($_FILES['urd_profile_pic']['name']) && $_FILES['urd_profile_pic']['name'] != ''){
					$urd_profilepicimage = date('dmYHis').str_replace(" ", "", basename($_FILES['urd_profile_pic']['name']));
					$catimgg = './userpics/'.$urd_profilepicimage;
					if(move_uploaded_file($_FILES['urd_profile_pic']['tmp_name'],$catimgg)){
						$error = 1;
					}else{
						$error = 0;
					}
				}else if(isset($_POST['h_urd_profile_pic']) && $_POST['h_urd_profile_pic']!=""){
					$urd_profilepicimage = $_POST['h_urd_profile_pic'];
				}
				$masterData['user_profilepic'] = $urd_profilepicimage;
				$hideData['urd_profile_pic'] = $urd_profilepicimage;
				if(isset($_POST['user_id']) && $_POST['user_id']!=""){
					// $masterData['user_status'] = 1;
					$user_id = $_POST['user_id'];
					if(isset($_FILES['urd_profile_pic']['name']) && $_FILES['urd_profile_pic']['name'] != ''){
						$user_profilepic = $this->Common_model->get_single_data('ma_users',$user_id,'user_id')->user_profilepic;
						if($user_profilepic!=""){
							unlink("./userpics/$user_profilepic");
						}
					}
					$updatestatus = $this->Common_model->update('ma_users',$masterData,$user_id,'user_id');
					$insertid = $user_id;
				}else{
					$masterData['user_status'] = 3;
					$masterData['user_craetedat'] = date('Y-m-d H:i:s');
					$insertid = $this->Common_model->add('ma_users',$masterData);
					if($insertid){	
						if($_POST['user_gender']=='female'){
							$user_registeredid = 'B'.date('y').'10'.str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
						}else{
							$user_registeredid = 'G'.date('y').'10'.str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
						}							
						$unquineData = array(
							'user_registeredid' => $user_registeredid,
						);	
						$uinsertid = $this->Common_model->update('ma_users',$unquineData,$insertid,'user_id');		
					}
				}
				if($insertid){					
					$urd_profilepic_is_published =0;
					if(isset($_POST['urd_profilepic_is_published']) && $_POST['urd_profilepic_is_published']=="on"){
						$urd_profilepic_is_published = 1;
					}
					$hideData['urd_profilepic_is_published'] = $urd_profilepic_is_published;
					// Delete records
					$hideData['urd_user_id'] = $insertid;
					$deleted = $this->Common_model->delete_single_row('ma_user_restricted_details',$insertid,'urd_user_id');
					$hidinsertid = $this->Common_model->add('ma_user_restricted_details',$hideData);
					// ma_user_personal_info
					$personalarray = array();
					$upi_dateofbirth = "";
					if(isset($_POST['upi_dateofbirth']) && $_POST['upi_dateofbirth']!=0){
						$upi_dateofbirth = $_POST['upi_dateofbirth'];
					}
					$personalarray['upi_dateofbirth'] = $upi_dateofbirth;
					$upi_age = "";
					if(isset($_POST['upi_age']) && $_POST['upi_age']!=0){
						$upi_age = $_POST['upi_age'];
					}
					$personalarray['upi_age'] = $upi_age;
					$upi_birth_timings_h = 0;
					$upi_birth_timings_m = 0;
					$upi_birth_timings   = "0-0";
					if(isset($_POST['upi_birth_timings_h']) && $_POST['upi_birth_timings_h']!=0){
						$upi_birth_timings_h = $_POST['upi_birth_timings_h'];
						$upi_birth_timings_m = 0;
						if(isset($_POST['upi_birth_timings_m']) && $_POST['upi_birth_timings_m']!=0){
							$upi_birth_timings_m = $_POST['upi_birth_timings_m'];
						}
						$upi_birth_timings = $upi_birth_timings_h.'-'.$upi_birth_timings_m;
					}
					$personalarray['upi_birth_timings'] = $upi_birth_timings;
					$upi_birthplace = "";
					if(isset($_POST['upi_birthplace']) && $_POST['upi_birthplace']!=""){
						$upi_birthplace = $_POST['upi_birthplace'];
					}
					$personalarray['upi_birthplace'] = $upi_birthplace;
					$upi_nri_living_country_name = "";
					if(isset($_POST['upi_nri_living_country_name']) && $_POST['upi_nri_living_country_name']!=""){
						$upi_nri_living_country_name = $_POST['upi_nri_living_country_name'];
					}
					$personalarray['upi_nri_living_country_name'] = $upi_nri_living_country_name;
					$upi_nri_living_country_name = "";
					if(isset($_POST['upi_nri_living_country_name']) && $_POST['upi_nri_living_country_name']!=""){
						$upi_nri_living_country_name = $_POST['upi_nri_living_country_name'];
					}
					$personalarray['upi_nri_living_country_name'] = $upi_nri_living_country_name;
					$upi_gothram = "";
					if(isset($_POST['upi_gothram']) && $_POST['upi_gothram']!=""){
						$upi_gothram = $_POST['upi_gothram'];
					}
					$personalarray['upi_gothram'] = $upi_gothram;
					
					$upi_caste   ="";
					$upi_castename ="";
					if(isset($_POST['upi_caste']) && $_POST['upi_caste']!=""){
						$upi_caste = $_POST['upi_caste'];
						$dataExlode = explode('-',$upi_caste);
						$upi_caste   = $dataExlode[0];
						$upi_castename = $dataExlode[1];					
					}
					$personalarray['upi_caste']     = $upi_caste;
					$personalarray['upi_castename'] = $upi_castename;
					
					$upi_star   ="";
					$upi_starname ="";
					if(isset($_POST['upi_star']) && $_POST['upi_star']!=""){
						$upi_star = $_POST['upi_star'];
						$dataExlode = explode('-',$upi_star);
						$upi_star   = $dataExlode[0];
						$upi_starname = $dataExlode[1];					
					}
					$personalarray['upi_star']     = $upi_star;
					$personalarray['upi_starname'] = $upi_starname;	
					
					$upi_rassi   ="";
					$upi_rassiname ="";
					if(isset($_POST['upi_rassi']) && $_POST['upi_rassi']!=""){
						$upi_rassi = $_POST['upi_rassi'];
						$dataExlode = explode('-',$upi_rassi);
						$upi_rassi   = $dataExlode[0];
						$upi_rassiname = $dataExlode[1];					
					}
					$personalarray['upi_rassi']     = $upi_rassi;
					$personalarray['upi_rassiname'] = $upi_rassiname;
					
					$upi_leg   ="";
					$upi_legname ="";
					if(isset($_POST['upi_leg']) && $_POST['upi_leg']!=""){
						$upi_leg = $_POST['upi_leg'];
						$dataExlode = explode('-',$upi_leg);
						$upi_leg   = $dataExlode[0];
						$upi_legname = $dataExlode[1];					
					}
					$personalarray['upi_leg']     = $upi_leg;
					$personalarray['upi_legname'] = $upi_legname;
					
					$upi_height = "";
					if(isset($_POST['upi_height']) && $_POST['upi_height']!=""){
						$upi_height = $_POST['upi_height'];
					}
					$personalarray['upi_height'] = $upi_height;
					
					$upi_complexion = "";
					if(isset($_POST['upi_complexion']) && $_POST['upi_complexion']!=""){
						$upi_complexion = $_POST['upi_complexion'];
					}
					$personalarray['upi_complexion'] = $upi_complexion;
					
					$upi_maritalstatus = "";
					if(isset($_POST['upi_maritalstatus']) && $_POST['upi_maritalstatus']!=""){
						$upi_maritalstatus = $_POST['upi_maritalstatus'];
					}
					$personalarray['upi_maritalstatus'] = $upi_maritalstatus;
					
					$upi_manglik_status = "";
					if(isset($_POST['upi_manglik_status']) && $_POST['upi_manglik_status']!=""){
						$upi_manglik_status = $_POST['upi_manglik_status'];
					}
					$personalarray['upi_manglik_status'] = $upi_manglik_status;				
					$personalarray['upi_updateat'] = date('Y-m-d H:i:s');
					
					$personalarray['upi_user_id'] = $insertid;
					$deleted = $this->Common_model->delete_single_row('ma_user_personal_info',$insertid,'upi_user_id');
					$ppinsertid = $this->Common_model->add('ma_user_personal_info',$personalarray);
					
					// ma_user_family_details
					$familyarray = array();
							
					$familyarray['upd_fathername'] = $_POST['upd_fathername'];
					$familyarray['upd_mothername'] = $_POST['upd_mothername'];
					$familyarray['upd_surname']    = $_POST['upd_surname'];
					$familyarray['upd_father_profession']    = $_POST['upd_father_profession'];
					$familyarray['upd_mother_profession']    = $_POST['upd_mother_profession'];
					$familyarray['upd_noofbrothers'] = $_POST['upd_noofbrothers'];
					$familyarray['upd_noofsisters']  = $_POST['upd_noofsisters'];
					if(isset($_POST['upd_noofbrothers']) && $_POST['upd_noofbrothers']!=0){
						$upd_elder_younger1 = "";
						if(isset($_POST['upd_elder_younger1']) && $_POST['upd_elder_younger1']!=""){
							$upd_elder_younger1 = $_POST['upd_elder_younger1'];
						}
						$familyarray['upd_elder_younger1']  = $upd_elder_younger1;
						$upd_brothername1 = "";
						if(isset($_POST['upd_brothername1']) && $_POST['upd_brothername1']!=""){
							$upd_brothername1 = $_POST['upd_brothername1'];
						}
						$familyarray['upd_brothername1']  = $upd_brothername1;
						$upd_marital_status1 = "";
						if(isset($_POST['upd_marital_status1']) && $_POST['upd_marital_status1']!=""){
							$upd_marital_status1 = $_POST['upd_marital_status1'];
						}
						$familyarray['upd_marital_status1']  = $upd_marital_status1;
						$upd_brother1_profession = "";
						if(isset($_POST['upd_brother1_profession']) && $_POST['upd_brother1_profession']!=""){
							$upd_brother1_profession = $_POST['upd_brother1_profession'];
						}
						$familyarray['upd_brother1_profession']  = $upd_brother1_profession;
						$upd_elder_younger2 = "";
						if(isset($_POST['upd_elder_younger2']) && $_POST['upd_elder_younger2']!=""){
							$upd_elder_younger2 = $_POST['upd_elder_younger2'];
						}
						$familyarray['upd_elder_younger2']  = $upd_elder_younger2;
						$upd_brothername2 = "";
						if(isset($_POST['upd_brothername2']) && $_POST['upd_brothername2']!=""){
							$upd_brothername2 = $_POST['upd_brothername2'];
						}
						$familyarray['upd_brothername2']  = $upd_brothername2;
						$upd_marital_status2 = "";
						if(isset($_POST['upd_marital_status2']) && $_POST['upd_marital_status2']!=""){
							$upd_marital_status2 = $_POST['upd_marital_status2'];
						}
						$familyarray['upd_marital_status2']  = $upd_marital_status2;
						$upd_brother2_profession = "";
						if(isset($_POST['upd_brother2_profession']) && $_POST['upd_brother2_profession']!=""){
							$upd_brother2_profession = $_POST['upd_brother2_profession'];
						}
						$familyarray['upd_brother2_profession']  = $upd_brother2_profession;
						$upd_elder_younger3 = "";
						if(isset($_POST['upd_elder_younger3']) && $_POST['upd_elder_younger3']!=""){
							$upd_elder_younger3 = $_POST['upd_elder_younger3'];
						}
						$familyarray['upd_elder_younger3']  = $upd_elder_younger3;
						$upd_brothername3 = "";
						if(isset($_POST['upd_brothername3']) && $_POST['upd_brothername3']!=""){
							$upd_brothername3 = $_POST['upd_brothername3'];
						}
						$familyarray['upd_brothername3']  = $upd_brothername3;
						$upd_marital_status3 = "";
						if(isset($_POST['upd_marital_status3']) && $_POST['upd_marital_status3']!=""){
							$upd_marital_status3 = $_POST['upd_marital_status3'];
						}
						$familyarray['upd_marital_status3']  = $upd_marital_status3;
						$upd_brother3_profession = "";
						if(isset($_POST['upd_brother3_profession']) && $_POST['upd_brother3_profession']!=""){
							$upd_brother3_profession = $_POST['upd_brother3_profession'];
						}
						$familyarray['upd_brother3_profession']  = $upd_brother3_profession;
						$upd_elder_younger4 = "";
						if(isset($_POST['upd_elder_younger4']) && $_POST['upd_elder_younger4']!=""){
							$upd_elder_younger4 = $_POST['upd_elder_younger4'];
						}
						$familyarray['upd_elder_younger4']  = $upd_elder_younger4;
						$upd_brothername4 = "";
						if(isset($_POST['upd_brothername4']) && $_POST['upd_brothername4']!=""){
							$upd_brothername4 = $_POST['upd_brothername4'];
						}
						$familyarray['upd_brothername4']  = $upd_brothername4;
						$upd_marital_status4 = "";
						if(isset($_POST['upd_marital_status4']) && $_POST['upd_marital_status4']!=""){
							$upd_marital_status4 = $_POST['upd_marital_status4'];
						}
						$familyarray['upd_marital_status4']  = $upd_marital_status4;
						$upd_brother4_profession = "";
						if(isset($_POST['upd_brother4_profession']) && $_POST['upd_brother4_profession']!=""){
							$upd_brother4_profession = $_POST['upd_brother4_profession'];
						}
						$familyarray['upd_brother4_profession']  = $upd_brother4_profession;
						$upd_elder_younger5 = "";
						if(isset($_POST['upd_elder_younger5']) && $_POST['upd_elder_younger5']!=""){
							$upd_elder_younger5 = $_POST['upd_elder_younger5'];
						}
						$familyarray['upd_elder_younger5']  = $upd_elder_younger5;
						$upd_brothername5 = "";
						if(isset($_POST['upd_brothername5']) && $_POST['upd_brothername5']!=""){
							$upd_brothername5 = $_POST['upd_brothername5'];
						}
						$familyarray['upd_brothername5']  = $upd_brothername5;
						$upd_marital_status5 = "";
						if(isset($_POST['upd_marital_status5']) && $_POST['upd_marital_status5']!=""){
							$upd_marital_status5 = $_POST['upd_marital_status5'];
						}
						$familyarray['upd_marital_status5']  = $upd_marital_status5;
						$upd_brother5_profession = "";
						if(isset($_POST['upd_brother5_profession']) && $_POST['upd_brother5_profession']!=""){
							$upd_brother5_profession = $_POST['upd_brother5_profession'];
						}
						$familyarray['upd_brother5_profession']  = $upd_brother5_profession;
					}					
					if(isset($_POST['upd_noofsisters']) && $_POST['upd_noofsisters']!=0){
						$upd_sister_elder_younger1 = "";
						if(isset($_POST['upd_sister_elder_younger1']) && $_POST['upd_sister_elder_younger1']!=""){
							$upd_sister_elder_younger1 = $_POST['upd_sister_elder_younger1'];
						}
						$familyarray['upd_sister_elder_younger1']  = $upd_sister_elder_younger1;
						$upd_sistername1 = "";
						if(isset($_POST['upd_sistername1']) && $_POST['upd_sistername1']!=""){
							$upd_sistername1 = $_POST['upd_sistername1'];
						}
						$familyarray['upd_sistername1']  = $upd_sistername1;
						$upd_sister_marital_status1 = "";
						if(isset($_POST['upd_sister_marital_status1']) && $_POST['upd_sister_marital_status1']!=""){
							$upd_sister_marital_status1 = $_POST['upd_sister_marital_status1'];
						}
						$familyarray['upd_sister_marital_status1']  = $upd_sister_marital_status1;
						$upd_sister1_profession = "";
						if(isset($_POST['upd_sister1_profession']) && $_POST['upd_sister1_profession']!=""){
							$upd_sister1_profession = $_POST['upd_sister1_profession'];
						}
						$familyarray['upd_sister1_profession']  = $upd_sister1_profession;
						$upd_sister_elder_younger2 = "";
						if(isset($_POST['upd_sister_elder_younger2']) && $_POST['upd_sister_elder_younger2']!=""){
							$upd_sister_elder_younger2 = $_POST['upd_sister_elder_younger2'];
						}
						$familyarray['upd_sister_elder_younger2']  = $upd_sister_elder_younger2;
						$upd_sistername2 = "";
						if(isset($_POST['upd_sistername2']) && $_POST['upd_sistername2']!=""){
							$upd_sistername2 = $_POST['upd_sistername2'];
						}
						$familyarray['upd_sistername2']  = $upd_sistername2;
						$upd_sister_marital_status2 = "";
						if(isset($_POST['upd_sister_marital_status2']) && $_POST['upd_sister_marital_status2']!=""){
							$upd_sister_marital_status2 = $_POST['upd_sister_marital_status2'];
						}
						$familyarray['upd_sister_marital_status2']  = $upd_sister_marital_status2;
						$upd_sister2_profession = "";
						if(isset($_POST['upd_sister2_profession']) && $_POST['upd_sister2_profession']!=""){
							$upd_sister2_profession = $_POST['upd_sister2_profession'];
						}
						$familyarray['upd_sister2_profession']  = $upd_sister2_profession;
						$upd_sister_elder_younger3 = "";
						if(isset($_POST['upd_sister_elder_younger3']) && $_POST['upd_sister_elder_younger3']!=""){
							$upd_sister_elder_younger3 = $_POST['upd_sister_elder_younger3'];
						}
						$familyarray['upd_sister_elder_younger3']  = $upd_sister_elder_younger3;
						$upd_sistername3 = "";
						if(isset($_POST['upd_sistername3']) && $_POST['upd_sistername3']!=""){
							$upd_sistername3 = $_POST['upd_sistername3'];
						}
						$familyarray['upd_sistername3']  = $upd_sistername3;
						$upd_sister_marital_status3 = "";
						if(isset($_POST['upd_sister_marital_status3']) && $_POST['upd_sister_marital_status3']!=""){
							$upd_sister_marital_status3 = $_POST['upd_sister_marital_status3'];
						}
						$familyarray['upd_sister_marital_status3']  = $upd_sister_marital_status3;
						$upd_sister3_profession = "";
						if(isset($_POST['upd_sister3_profession']) && $_POST['upd_sister3_profession']!=""){
							$upd_sister3_profession = $_POST['upd_sister3_profession'];
						}
						$familyarray['upd_sister3_profession']  = $upd_sister3_profession;
						$upd_sister_elder_younger4 = "";
						if(isset($_POST['upd_sister_elder_younger4']) && $_POST['upd_sister_elder_younger4']!=""){
							$upd_sister_elder_younger4 = $_POST['upd_sister_elder_younger4'];
						}
						$familyarray['upd_sister_elder_younger4']  = $upd_sister_elder_younger4;
						$upd_sistername4 = "";
						if(isset($_POST['upd_sistername4']) && $_POST['upd_sistername4']!=""){
							$upd_sistername4 = $_POST['upd_sistername4'];
						}
						$familyarray['upd_sistername4']  = $upd_sistername4;
						$upd_sister_marital_status4 = "";
						if(isset($_POST['upd_sister_marital_status4']) && $_POST['upd_sister_marital_status4']!=""){
							$upd_sister_marital_status4 = $_POST['upd_sister_marital_status4'];
						}
						$familyarray['upd_sister_marital_status4']  = $upd_sister_marital_status4;
						$upd_sister4_profession = "";
						if(isset($_POST['upd_sister4_profession']) && $_POST['upd_sister4_profession']!=""){
							$upd_sister4_profession = $_POST['upd_sister4_profession'];
						}
						$familyarray['upd_sister4_profession']  = $upd_sister4_profession;
						$upd_sister_elder_younger5 = "";
						if(isset($_POST['upd_sister_elder_younger5']) && $_POST['upd_sister_elder_younger5']!=""){
							$upd_sister_elder_younger5 = $_POST['upd_sister_elder_younger5'];
						}
						$familyarray['upd_sister_elder_younger5']  = $upd_sister_elder_younger5;
						$upd_sistername5 = "";
						if(isset($_POST['upd_sistername5']) && $_POST['upd_sistername5']!=""){
							$upd_sistername5 = $_POST['upd_sistername5'];
						}
						$familyarray['upd_sistername5']  = $upd_sistername5;
						$upd_sister_marital_status5 = "";
						if(isset($_POST['upd_sister_marital_status5']) && $_POST['upd_sister_marital_status5']!=""){
							$upd_sister_marital_status5 = $_POST['upd_sister_marital_status5'];
						}
						$familyarray['upd_sister_marital_status5']  = $upd_sister_marital_status5;
						$upd_sister5_profession = "";
						if(isset($_POST['upd_sister5_profession']) && $_POST['upd_sister5_profession']!=""){
							$upd_sister5_profession = $_POST['upd_sister5_profession'];
						}
						$familyarray['upd_sister5_profession']  = $upd_sister5_profession;
					}
					$upd_any_other_requirements ="";
					if(isset($_POST['upd_any_other_requirements']) && $_POST['upd_any_other_requirements']!=""){
						$upd_any_other_requirements = $_POST['upd_any_other_requirements'];
					}
					$familyarray['upd_any_other_requirements']  = $upd_any_other_requirements;
					$familyarray['upd_updatedat']  = date('Y-m-d H:i:s');
					
					$familyarray['upd_user_id'] = $insertid;
					$deleted = $this->Common_model->delete_single_row('ma_user_family_details',$insertid,'upd_user_id');
					$ffinsertid = $this->Common_model->add('ma_user_family_details',$familyarray);
					
					// ma_user_educational_details
					$eduarray = array();
					$ued_education_qualifications ="";
					if(isset($_POST['ued_education_qualifications']) && $_POST['ued_education_qualifications']!=""){
						$ued_education_qualifications = $_POST['ued_education_qualifications'];
					}
					$eduarray['ued_education_qualifications']  = $ued_education_qualifications;
					$ued_profession_id   ="";
					$ued_profession_name ="";
					if(isset($_POST['ued_profession_id']) && $_POST['ued_profession_id']!=""){
						$ued_profession_id = $_POST['ued_profession_id'];
						$dataExlode = explode('-',$ued_profession_id);
						$ued_profession_id   = $dataExlode[0];
						$ued_profession_name = $dataExlode[1];					
					}
					$eduarray['ued_profession_id']    = $ued_profession_id;
					$eduarray['ued_profession_name']  = $ued_profession_name;				
					$ued_place_work ="";
					if(isset($_POST['ued_place_work']) && $_POST['ued_place_work']!=""){
						$ued_place_work = $_POST['ued_place_work'];
					}
					$eduarray['ued_place_work']  = $ued_place_work;				
					$ued_company_name ="";
					if(isset($_POST['ued_company_name']) && $_POST['ued_company_name']!=""){
						$ued_company_name = $_POST['ued_company_name'];
					}
					$eduarray['ued_company_name']  = $ued_company_name;
					$ued_job_role ="";
					if(isset($_POST['ued_job_role']) && $_POST['ued_job_role']!=""){
						$ued_job_role = $_POST['ued_job_role'];
					}
					$eduarray['ued_job_role']  = $ued_job_role;
					$ued_income ="";
					if(isset($_POST['ued_income']) && $_POST['ued_income']!=""){
						$ued_income = $_POST['ued_income'];
					}
					$eduarray['ued_income']  = $ued_income;
					$ued_othersourceofincome ="";
					if(isset($_POST['ued_othersourceofincome']) && $_POST['ued_othersourceofincome']!=""){
						$ued_othersourceofincome = $_POST['ued_othersourceofincome'];
					}
					$eduarray['ued_othersourceofincome']  = $ued_othersourceofincome;
					$eduarray['ued_updatedat']  = date('Y-m-d H:i:s');
					
					$eduarray['ued_user_id'] = $insertid;
					$deleted = $this->Common_model->delete_single_row('ma_user_educational_details',$insertid,'ued_user_id');
					$eduinsertid = $this->Common_model->add('ma_user_educational_details',$eduarray);
					
					// ma_user_partner_prefered_details
					$parnterarray = array();
					$uppd_from_age ="";
					if(isset($_POST['uppd_from_age']) && $_POST['uppd_from_age']!=""){
						$uppd_from_age = $_POST['uppd_from_age'];
					}
					$parnterarray['uppd_from_age']  = $uppd_from_age;
					$uppd_to_age ="";
					if(isset($_POST['uppd_to_age']) && $_POST['uppd_to_age']!=""){
						$uppd_to_age = $_POST['uppd_to_age'];
					}
					$parnterarray['uppd_to_age']  = $uppd_to_age;
					$uppd_qualification ="";
					if(isset($_POST['uppd_qualification']) && $_POST['uppd_qualification']!=""){
						$uppd_qualification = $_POST['uppd_qualification'];
					}
					$parnterarray['uppd_qualification']  = $uppd_qualification;
					$uppd_profession   ="";
					$uppd_professionname ="";
					if(isset($_POST['uppd_profession']) && $_POST['uppd_profession']!=""){
						$uppd_profession = $_POST['uppd_profession'];
						$dataExlode = explode('-',$uppd_profession);
						$uppd_profession   = $dataExlode[0];
						$uppd_professionname = $dataExlode[1];					
					}
					$parnterarray['uppd_profession'] = $uppd_profession;
					$parnterarray['uppd_professionname'] = $uppd_professionname;
					$uppd_eating_habits ="";
					if(isset($_POST['uppd_eating_habits']) && $_POST['uppd_eating_habits']!=""){
						$uppd_eating_habits = $_POST['uppd_eating_habits'];
					}
					$parnterarray['uppd_eating_habits']  = $uppd_eating_habits;
					$uppd_stateid   ="";
					$uppd_area ="";
					if(isset($_POST['uppd_stateid']) && $_POST['uppd_stateid']!=""){
						$uppd_stateid = $_POST['uppd_stateid'];
						$dataExlode = explode('-',$uppd_stateid);
						$uppd_stateid   = $dataExlode[0];
						$uppd_area = $dataExlode[1];					
					}
					$parnterarray['uppd_stateid'] = $uppd_stateid;
					$parnterarray['uppd_area'] = $uppd_area;
					$uppd_other_requirement ="";
					if(isset($_POST['uppd_other_requirement']) && $_POST['uppd_other_requirement']!=""){
						$uppd_other_requirement = $_POST['uppd_other_requirement'];
					}
					$parnterarray['uppd_other_requirement']  = $uppd_other_requirement;
					$parnterarray['uppd_updatedat']  = date('Y-m-d H:i:s');
					
					$parnterarray['uppd_user_id'] = $insertid;
					$deleted = $this->Common_model->delete_single_row('ma_user_partner_prefered_details',$insertid,'uppd_user_id');
					$parnterinsertid = $this->Common_model->add('ma_user_partner_prefered_details',$parnterarray);
					$this->session->set_flashdata('success_message', '"Profile added successfully","Success"');
					redirect(base_url().'admin/common/allprofileslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try some time again.","Failed!"');
					redirect(base_url().'admin/common/addprofile');
				}			
			}else{
				$this->session->set_flashdata('error_message', '"Required fields are required.","Failed!"');
				redirect(base_url().'admin/common/addprofile');
			}
		} 
		public function aprovalstatusactions(){
			if(isset($_POST['us_user_id']) && $_POST['us_user_id']!=""){
				$userId = $_POST['us_user_id'];
				$getUserData = $this->Common_model->get_single_data('ma_users',$userId,'user_id');
				if(isset($getUserData->user_id) && $getUserData->user_id!=""){
					$user_id = $getUserData->user_id;
					
					$us_fromdate      = $_POST['us_fromdate'];
					$us_todate        = $_POST['us_todate'];
					$us_paymentamount = $_POST['us_paymentamount'];
					$us_paymentoptionn = $_POST['us_paymentoption'];
					$us_paymentoption =0;
					if($us_paymentoptionn=='on'){
						$us_paymentoption =1;
					}
					$mAccess = array();
					$mAccess['us_fromdate']      = $us_fromdate;
					$mAccess['us_todate']        = $us_todate;
					$mAccess['us_paymentamount'] = $us_paymentamount;
					$mAccess['us_paymentoption'] = $us_paymentoption;
					$mAccess['us_user_id']       = $user_id;					
					$mAccess['us_createdat']     = date('Y-m-d H:i:s');					
					$user_tottrailperiod_days = 0;
					$date1 = date_create($us_fromdate);
					$date2 = date_create($us_todate);
					$diff  = date_diff($date1,$date2);
					$user_tottrailperiod_days = $diff->format("%a");
					$mAccess['us_subscription_days'] = $user_tottrailperiod_days;
					$us_id = $this->Common_model->add('ma_user_subscriptions',$mAccess);
					if(isset($_POST['renewalopt']) && $_POST['renewalopt']=='renewal'){
						$unquineData = array(
							'user_status' => 1,
							'user_payment_status' => 1,
							'user_trailperiod_fromdate' => $us_fromdate,
							'user_trailperiod_todate' => $us_todate,
							'user_payment_amount' => $us_paymentamount,
							'user_tottrailperiod_days' => $user_tottrailperiod_days,
							'user_updatedat' => date('Y-m-d H:i:s')
						);	
						$uinsertid = $this->Common_model->update('ma_users',$unquineData,$user_id,'user_id');
					}else{
						// ma_users
						if($getUserData->user_gender=='female'){
							$user_registeredid = 'B'.date('y').'10'.str_pad((int)$user_id, 2, "0", STR_PAD_LEFT);
						}else{
							$user_registeredid = 'G'.date('y').'10'.str_pad((int)$user_id, 2, "0", STR_PAD_LEFT);
						}							
						$unquineData = array(
							'user_registeredid' => $user_registeredid,
							'user_status' => 1,
							'user_payment_status' => 1,
							'user_trailperiod_fromdate' => $us_fromdate,
							'user_trailperiod_todate' => $us_todate,
							'user_payment_amount' => $us_paymentamount,
							'user_tottrailperiod_days' => $user_tottrailperiod_days,
							'user_updatedat' => date('Y-m-d H:i:s')
						);	
						$uinsertid = $this->Common_model->update('ma_users',$unquineData,$user_id,'user_id');		
						$insertid = $user_id;
						if(isset($_POST['updatesubscribe']) && $_POST['updatesubscribe']!=1){
    						// ma_user_restricted_details 
    						$hideData      = array();
    						$hideData['urd_email']               = $getUserData->user_email;
    						$hideData['urd_primaryconactnumber'] = $getUserData->user_mobile;
    						$hideData['urd_updatedat'] = date('Y-m-d H:i:s');					
    						$hideData['urd_profile_pic'] = NULL;		
    						$hideData['urd_user_id'] = $insertid;
    						$deleted = $this->Common_model->delete_single_row('ma_user_restricted_details',$insertid,'urd_user_id');
    						$hidinsertid = $this->Common_model->add('ma_user_restricted_details',$hideData);						
    						// ma_user_personal_info
    						$personalarray = array();
    						$personalarray['upi_updateat'] = date('Y-m-d H:i:s');					
    						$personalarray['upi_user_id'] = $insertid;
    						$deleted = $this->Common_model->delete_single_row('ma_user_personal_info',$insertid,'upi_user_id');
    						$ppinsertid = $this->Common_model->add('ma_user_personal_info',$personalarray);
    						// ma_user_family_details
    						$familyarray = array();				
    						$familyarray['upd_updatedat']  = date('Y-m-d H:i:s');					
    						$familyarray['upd_user_id'] = $insertid;
    						$deleted = $this->Common_model->delete_single_row('ma_user_family_details',$insertid,'upd_user_id');
    						$ffinsertid = $this->Common_model->add('ma_user_family_details',$familyarray);
    						// ma_user_educational_details
    						$eduarray = array();	
    						$eduarray['ued_updatedat']  = date('Y-m-d H:i:s');
    						$eduarray['ued_user_id'] = $insertid;
    						$deleted = $this->Common_model->delete_single_row('ma_user_educational_details',$insertid,'ued_user_id');
    						$eduinsertid = $this->Common_model->add('ma_user_educational_details',$eduarray);
    						// ma_user_partner_prefered_details
    						$parnterarray = array();
    						$parnterarray['uppd_updatedat']  = date('Y-m-d H:i:s');					
    						$parnterarray['uppd_user_id'] = $insertid;
    						$deleted = $this->Common_model->delete_single_row('ma_user_partner_prefered_details',$insertid,'uppd_user_id');
    						$parnterinsertid = $this->Common_model->add('ma_user_partner_prefered_details',$parnterarray);
						}
					}
					$this->load->helper(array('common'));
					$toemail   = $getUserData->user_email;
					$fromemail = GAMILACCOUNT;
					if(isset($_POST['updatesubscribe']) && $_POST['updatesubscribe']!=1){
						$subject   = "Your profile has been activated from MatrimonyApp.";
						$passwordLink = "<a target='_blank' href='".base_url()."'>".base_url()."</a>";					
						$messgae  = "You can start using the app and search for profiles in your MatrimonyApp account.";
						$messgae .= "\n\n";
						$messgae .= "Access to below the link.";
						$messgae .= "\n\n";
						$messgae .= $passwordLink;
					}else{
						$subject   = "Subscribe plan Confirmation";
						$passwordLink = "<a target='_blank' href='".base_url()."'>".base_url()."</a>";					
						$messgae  = "Your subscribe plan has been changed successfully by MatrimonyApp.";
						$messgae .= "\n\n";
						$messgae .= "Access to below the link.";
						$messgae .= "\n\n";
						$messgae .= $passwordLink;
					}
					$mailSentStatus = sendemailtoall($fromemail,$toemail,$subject,$messgae,$attachment="");
					$successmessage = 0;
					if($mailSentStatus==1){
						$successmessage = 1;
						$this->session->set_flashdata('success_message', '"Profile is approved successfully.","Success!"');
					}else{
						$this->session->set_flashdata('success_message', '"Profile is approved successfully. But mail not sent successfully.","Success!"');
					}
					echo json_encode(array('status'=>TRUE,'output'=>'success'));exit; 
				}else{
					echo json_encode(array('status'=>FALSE,'output'=>'Profile is not exixts'));exit; 
				}		
			}else{
				echo json_encode(array('status'=>FALSE,'output'=>'User id is reqired.'));exit; 
			}
		}
		public function addprofile(){			
			$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','DESC');
			$this->data['starslist'] = $this->Common_model->get_data_status_without_delete_records('ma_stars','starstatus',1,'starid','DESC');
			$this->data['raasislist'] = $this->Common_model->get_data_status_without_delete_records('ma_raasi','raasistatus',1,'raasiid','DESC');
			$this->data['heightslist'] = $this->Common_model->get_data_status_without_delete_records('ma_heights','heightstatus',1,'heightid','ASC');
			$this->data['legs'] = $this->Common_model->get_data_status_without_delete_records('ma_legs','legstatus',1,'legid','ASC');
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['areaslist'] = $this->Common_model->get_data_status_without_delete_records('ma_areas','areastatus',1,'areadisplayid','DESC');
			$this->data['page_title']='Add Profile';
			$this->data['page']='addprofile';
			$this->admin_view('add-profile');
		}
		public function editprofile(){			
			$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','DESC');
			$this->data['starslist'] = $this->Common_model->get_data_status_without_delete_records('ma_stars','starstatus',1,'starid','DESC');
			$this->data['raasislist'] = $this->Common_model->get_data_status_without_delete_records('ma_raasi','raasistatus',1,'raasiid','DESC');
			$this->data['heightslist'] = $this->Common_model->get_data_status_without_delete_records('ma_heights','heightstatus',1,'heightid','ASC');
			$this->data['legs'] = $this->Common_model->get_data_status_without_delete_records('ma_legs','legstatus',1,'legid','ASC');
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['areaslist'] = $this->Common_model->get_data_status_without_delete_records('ma_areas','areastatus',1,'areadisplayid','DESC');
			if(isset($_GET['user_id']) && $_GET['user_id']!=""){
				$user_id = $_GET['user_id'];
				$userDetails = $this->Common_model->get_single_data('ma_users',$user_id,'user_registeredid');
				if(isset($userDetails->user_id) && $userDetails->user_id!=""){
					$this->data['userdetails'] = $userDetails;
					$user_id = $userDetails->user_id;
					$this->data['urddetails'] = $this->Common_model->get_single_data('ma_user_restricted_details',$user_id,'urd_user_id');
					$this->data['upidetails'] = $this->Common_model->get_single_data('ma_user_personal_info',$user_id,'upi_user_id');
					$this->data['uppdetails'] = $this->Common_model->get_single_data('ma_user_partner_prefered_details',$user_id,'uppd_user_id');
					$this->data['ufpdetails'] = $this->Common_model->get_single_data('ma_user_family_details',$user_id,'upd_user_id');
					$this->data['ueddetails'] = $this->Common_model->get_single_data('ma_user_educational_details',$user_id,'ued_user_id');
					$this->data['page_title']='Edit Profile';
					$this->data['page']='editprofile';
					$this->admin_view('editprofile');
				}else{
					redirect(base_url().'admin/common/allprofileslist');
				}			
			}else{
				redirect(base_url().'admin/common/allprofileslist');
			}			
		}
		public function allprofileslist(){
			if(isset($_GET['genderstatus']) && $_GET['genderstatus']!=""){
				if($_GET['genderstatus']=='male'){
					$this->data['userslist'] = $this->Common_model->get_data_multiple_columns_records('ma_users','user_status',2,'user_id','DESC','user_gender','male');
				}else if($_GET['genderstatus']=='female'){
					$this->data['userslist'] = $this->Common_model->get_data_multiple_columns_records('ma_users','user_status',2,'user_id','DESC','user_gender','female');
				}				
			}else{
				$this->data['userslist'] = $this->Common_model->get_data_multiple_columns_records('ma_users','user_status',2,'user_id','DESC','user_status',$value="");
			}
			$this->data['page_title']='All Profiles List';
			$this->data['page']='allprofileslist';
			$this->admin_view('allprofileslist');
		}
		public function waitingprofiles(){
			if(isset($_GET['genderstatus']) && $_GET['genderstatus']!=""){
				if($_GET['genderstatus']=='male'){
					$this->data['userslist'] = $this->Common_model->get_data_status_without_delete_records_double('ma_users','user_status',3,'user_id','DESC','user_gender','male');
				}else if($_GET['genderstatus']=='female'){
					$this->data['userslist'] = $this->Common_model->get_data_status_without_delete_records_double('ma_users','user_status',3,'user_id','DESC','user_gender','female');
				}				
			}else{
				$this->data['userslist'] = $this->Common_model->get_data_status_without_delete_records('ma_users','user_status',3,'user_id','DESC');
			}
			$this->data['page_title']='Waiting for Approval profiles';
			$this->data['page']='waitingprofiles';
			$this->admin_view('waitingprofiles');
		}
		public function nriprofiles(){
			if(isset($_GET['genderstatus']) && $_GET['genderstatus']!=""){
				if($_GET['genderstatus']=='male'){
					$this->data['userslist'] = $this->Common_model->get_data_2multiple_columns_records('ma_users','user_status',2,'user_id','DESC','user_is_nri',1,'user_gender','male');
				}else if($_GET['genderstatus']=='female'){
					$this->data['userslist'] = $this->Common_model->get_data_2multiple_columns_records('ma_users','user_status',2,'user_id','DESC','user_is_nri',1,'user_gender','female');
				}				
			}else{
				$this->data['userslist'] = $this->Common_model->get_data_multiple_columns_records('ma_users','user_status',2,'user_id','DESC','user_is_nri',1);
			}			
			$this->data['page_title']='NRI Profiles';
			$this->data['page']='nriprofiles';
			$this->admin_view('nriprofiles');
		}
		public function secondmarriageprofiles(){
			if(isset($_GET['genderstatus']) && $_GET['genderstatus']!=""){
				if($_GET['genderstatus']=='male'){
					$this->data['userslist'] = $this->Common_model->get_data_2multiple_columns_records('ma_users','user_status',2,'user_id','DESC','user_is_secondmarriageprofile',1,'user_gender','male');
				}else if($_GET['genderstatus']=='female'){
					$this->data['userslist'] = $this->Common_model->get_data_2multiple_columns_records('ma_users','user_status',2,'user_id','DESC','user_is_secondmarriageprofile',1,'user_gender','female');
				}				
			}else{
				$this->data['userslist'] = $this->Common_model->get_data_multiple_columns_records('ma_users','user_status',2,'user_id','DESC','user_is_secondmarriageprofile',1);
			}			
			$this->data['page_title']='Second Marriage Profiles';
			$this->data['page']='secondmarriageprofiles';
			$this->admin_view('secondmarriageprofiles');
		}
		public function userlikedprofiles(){
			if(isset($_GET['userid']) && $_GET['userid']!=""){
				$user_id = $_GET['userid'];
				$this->data['userdetails'] = $this->Common_model->get_single_data('ma_users','user_id',$user_id);
				$this->data['userslist'] = $this->Common_model->get_data_status_without_delete_records_double('ma_user_liked_profiles','ulp_status',1,'ulp_id','ASC','user_id',$user_id);
				$this->data['page_title']='User Liked Profiles';
				$this->data['page']='userlikedprofiles';
				$this->admin_view('userlikedprofiles');
			}
		}
		public function neartoexpiredprofiles(){
			if(isset($_GET['genderstatus']) && $_GET['genderstatus']!=""){
				if($_GET['genderstatus']=='male'){
					$this->data['userslist'] = $this->Common_model->neartoexpiredprofiles('ma_users','user_status',1,'user_tottrailperiod_days','ASC','user_payment_status',1,'user_gender','male');
				}else if($_GET['genderstatus']=='female'){
					$this->data['userslist'] = $this->Common_model->neartoexpiredprofiles('ma_users','user_status',1,'user_tottrailperiod_days','ASC','user_payment_status',1,'user_gender','female');
				}				
			}else{
				$this->data['userslist'] = $this->Common_model->neartoexpiredprofiles('ma_users','user_status',1,'user_tottrailperiod_days','ASC','user_payment_status',1,'','');
			}			
			$this->data['page_title']='Near to Expired Marriage Profiles';
			$this->data['page']='neartoexpiredprofiles';
			$this->admin_view('neartoexpiredprofiles');
		}
		public function familymembers(){
			if(isset($_GET['alphserach']) && $_GET['alphserach']!=""){
				$alphserach = $_GET['alphserach'];
				if(isset($_GET['bloodgroup']) && $_GET['bloodgroup']!=""){
					$bloodgroup = $_GET['bloodgroup'];
					$this->data['communityinfo'] = $this->Common_model->searchresultsdetails('ma_family_members','profile_blood_group',$bloodgroup,'profile_fullname',$alphserach,'profile_status',2,'fmid','DESC');
				}else{
					$this->data['communityinfo'] = $this->Common_model->searchresultsdetails('ma_family_members','profile_blood_group','','profile_fullname',$alphserach,'profile_status',2,'fmid','DESC');
				}
			}else{
				if(isset($_GET['bloodgroup']) && $_GET['bloodgroup']!=""){
					$bloodgroup = $_GET['bloodgroup'];
					$this->data['communityinfo'] = $this->Common_model->searchresultsdetails('ma_family_members','profile_blood_group',$bloodgroup,'profile_fullname','','profile_status',2,'fmid','DESC');
				}else{
					$this->data['communityinfo'] = $this->Common_model->get_data_status('ma_family_members','profile_status',2,'fmid','DESC');
				}				
			}			
			$this->data['bloodgroupsslistt'] = $this->Common_model->get_data_status_without_delete_records('ma_bloodgroups','status',1,'id','ASC');
			$this->data['page_title']='Family Collections';
			$this->data['page']='familymembers';
			$this->admin_view('familymembers');
		}
		function editfamilyprofile(){
			if(isset($_POST['profile_fullname']) && $_POST['profile_fullname']!=""){
				// echo "<pre>";print_r($_POST);exit;
				$profile_fullname = $_POST['profile_fullname'];
				$profile_middlename = $_POST['profile_middlename'];
				$profile_surname = $_POST['profile_surname'];
				$profile_fathername = $_POST['profile_fathername'];
				$profile_mothername = $_POST['profile_mothername'];
				$profile_occupation = $_POST['profile_occupation'];
				$profile_gothram = $_POST['profile_gothram'];
				$profile_marital_status = $_POST['profile_marital_status'];
				$profile_nri = $_POST['profile_nri'];
				$profile_blood_group = $_POST['profile_blood_group'];
				$profile_qualification = $_POST['profile_qualification'];
				$profile_community_status = $_POST['profile_community_status'];
				
				$dddate  = $_POST['profile_dob_date'];
				$ddmonth = $_POST['profile_dob_month'];
				$ddyear  = $_POST['profile_dob_year'];
				
				$profile_dob = $ddyear.'-'.$ddmonth.'-'.$dddate;
				
				$profile_native_district = $_POST['profile_native_district'];
				$profile_residence_type = $_POST['profile_residence_type'];
				$profile_present_address ="";
				if(isset($_POST['profile_present_address']) && $_POST['profile_present_address']!=""){
					$profile_present_address = $_POST['profile_present_address'];
				}
				$profile_phone = $_POST['profile_phone'];
				$profile_email = $_POST['profile_email'];
				
				$profile_house_no  = $_POST['profile_house_no'];
				$profile_plot_no   = $_POST['profile_plot_no'];
				$profile_street_no = $_POST['profile_street_no'];
				$profile_land_mark = $_POST['profile_land_mark'];
				$profile_area      = $_POST['profile_area'];
				$profile_mandal    = $_POST['profile_mandal'];
				$profile_district  = $_POST['profile_district'];
				$profile_state     = $_POST['profile_state'];
				$profile_location_area = $_POST['profile_location_area'];
				$profile_location_area_name = $_POST['profile_location_area_name'];
				
				
				
				$profile_status   = 1;
				$profile_createdat = date("Y-m-d H:i:s");
				$profile_updatedat = date("Y-m-d H:i:s");
				$dataArray = array(
					'profile_fullname' => $profile_fullname,				
					'profile_middlename' => $profile_middlename,				
					'profile_surname' => $profile_surname,				
					'profile_fathername' => $profile_fathername,				
					'profile_mothername' => $profile_mothername,				
					'profile_occupation' => $profile_occupation,				
					'profile_gothram' => $profile_gothram,				
					'profile_marital_status' => $profile_marital_status,				
					'profile_nri' => $profile_nri,				
					'profile_community_status' => $profile_community_status,				
					'profile_dob' => $profile_dob,				
					'profile_native_district' => $profile_native_district,				
					'profile_residence_type' => $profile_residence_type,				
					'profile_present_address' => $profile_present_address,				
					'profile_blood_group' => $profile_blood_group,				
					'profile_qualification' => $profile_qualification,				
					'profile_house_no' => $profile_house_no,				
					'profile_plot_no' => $profile_plot_no,				
					'profile_street_no' => $profile_street_no,				
					'profile_land_mark' => $profile_land_mark,				
					'profile_area' => $profile_area,				
					'profile_mandal' => $profile_mandal,				
					'profile_district' => $profile_district,				
					'profile_state' => $profile_state,				
					'profile_location_area' => $profile_location_area,				
					'profile_location_area_name' => $profile_location_area_name,				
					'profile_updatedat' => $profile_updatedat,				
				);
				$userId   = $_POST['fmid'];	
				$updateStatus = $this->Common_model->update('ma_family_members',$dataArray,$userId,'fmid');
				if($updateStatus!=0){	
					// delete_single_row
					$deleteStatus = $this->Common_model->delete_single_row('ma_family_members_bloods',$userId,'profile_parentid');
					if(isset($_POST['profile_partner_member_name']) && count($_POST['profile_partner_member_name'])>0){
						$cnt = count($_POST['profile_partner_member_name']);
						for($i=0;$i<$cnt;$i++){
							$ddate  = $_POST['profile_partner_dob_date'][$i];
							$dmonth = $_POST['profile_partner_dob_month'][$i];
							$dyear  = $_POST['profile_partner_dob_year'][$i];
							$profile_partner_dob_date = $dyear.'-'.$dmonth.'-'.$ddate;
							// get_single_data
							$profile_partner_qualification_profession_name ="";
							if(isset($_POST['profile_partner_qualification'][$i]) && $_POST['profile_partner_qualification'][$i]!=""){
								$profile_partner_qualification = $_POST['profile_partner_qualification'][$i];
								$qualification_profession_name = $this->Common_model->get_single_data('ma_qualification',$profile_partner_qualification,'qualificationuqid');
								if(isset($qualification_profession_name->id) && $qualification_profession_name->id!=""){
									$profile_partner_qualification_profession_name = $qualification_profession_name->qualificationname;
								}
							}
							$profile_partner_profession_name ="";
							if(isset($_POST['profile_partner_profession'][$i]) && $_POST['profile_partner_profession'][$i]!=""){
								$profile_partner_profession = $_POST['profile_partner_profession'][$i];
								$profession_name = $this->Common_model->get_single_data('ma_professions',$profile_partner_profession,'professiondisplayid');
								if(isset($profession_name->professionid) && $profession_name->professionid!=""){
									$profile_partner_profession_name = $profession_name->professionname;
								}
							}
							$profile_parnter_blood_group_name ="";
							if(isset($_POST['profile_parnter_blood_group'][$i]) && $_POST['profile_parnter_blood_group'][$i]!=""){
								$profile_parnter_blood_group = $_POST['profile_parnter_blood_group'][$i];
								$parnter_blood_group_name = $this->Common_model->get_single_data('ma_bloodgroups',$profile_parnter_blood_group,'bggroupuqid');
								if(isset($parnter_blood_group_name->id) && $parnter_blood_group_name->id!=""){
									$profile_parnter_blood_group_name = $parnter_blood_group_name->bggroup;
								}
							}
							
							$dataarr = array(
								'profile_parentid' =>$userId,
								'profile_partner_member_name' =>$_POST['profile_partner_member_name'][$i],
								'profile_partner_realtion'    =>$_POST['profile_partner_realtion'][$i],
								'profile_partner_mobile'    =>$_POST['profile_partner_mobile'][$i],
								'profile_partner_location'    =>$_POST['profile_partner_location'][$i],
								'profile_partner_marital_status' =>$_POST['profile_partner_marital_status'][$i],
								'profile_partner_qualification_profession' =>$_POST['profile_partner_qualification'][$i],		
								'profile_partner_qualification_profession_name' =>$profile_partner_qualification_profession_name,		
								'profile_partner_profession' =>$_POST['profile_partner_profession'][$i],		
								'profile_partner_profession_name' =>$profile_partner_profession_name,	
								'profile_parnter_blood_group' =>$_POST['profile_parnter_blood_group'][$i],
								'profile_parnter_blood_group_name' =>$profile_parnter_blood_group_name,										
								'profile_partner_dob_date' =>$profile_partner_dob_date
							);
							// echo "<pre>";print_r($dataarr);exit;
							$insertIdd = $this->Common_model->add('ma_family_members_bloods',$dataarr);
						}
						if($insertIdd){
							$this->session->set_flashdata('success_message', '"Family member added","Success"');
							redirect(base_url().'admin/common/familymembers');
						}else{
							$this->session->set_flashdata('success_message', '"Family member added","Success"');
							redirect(base_url().'admin/common/familymembers');
						}	
					}					
				}else{
					$this->session->set_flashdata('success_message', '"Family member adding Fail","Fail"');
					redirect(base_url().'admin/common/familymembers');
				}				
			}else{
				$userinfo = array();
				// ini_set('display_errors', 1);
				// ini_set('display_startup_errors', 1);
				// error_reporting(E_ALL);
				if(isset($_GET['user_id']) && $_GET['user_id']!=""){
					$profile_registeredid = $_GET['user_id'];
				}
				$getinfo = $this->Common_model->get_single_data('ma_family_members',$profile_registeredid,'profile_registeredid');
				if(isset($getinfo->fmid) && $getinfo->fmid!=""){
					$userId   = $getinfo->fmid;			
					$userinfo = $this->Common_model->getFamailyDetails('ma_family_members',$userId,'fmid',1,'profile_status');
					$bloodrelationsinfo = $this->Common_model->get_data_status_without_delete_records('ma_family_members_bloods','profile_parentid',$userId,'pmmid','ASC');
					$this->data['boomrelations'] = $bloodrelationsinfo;
					$this->data['userinfo'] = $userinfo;
					$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','ASC');
					$this->data['qualificationslist'] = $this->Common_model->get_data_status_without_delete_records('ma_qualification','status',1,'id','ASC');
					$this->data['bloodgroupsslist'] = $this->Common_model->get_data_status_without_delete_records('ma_bloodgroups','status',1,'id','ASC');
					$this->data['citieslist'] = $this->Common_model->get_data_status_without_delete_records('ma_cities','status',1,'cityname','ASC');
					$this->data['page_title']='Edit Family Member';
					$this->data['page']='editfamilyprofile';
					$this->admin_view('editfamilyprofile');
				}
			}
		}
	}