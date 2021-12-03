<?php
	class LoaddingPage extends MY_Controller {
		function __construct() {
			parent::__construct();
			$this->load->library(array('email','form_validation','session','pagination'));
			$this->load->database();       
			$this->load->model('admin/Common_model');			
			$this->load->library('pagination');
			$this->load->helper('url');	
		}
		public function fmemberCollections(){
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
				if(isset($_SESSION['loginwith']) && $_SESSION['loginwith']=='CommunityProtal'){
					$userId   = $_SESSION['userId'];	
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
								redirect(base_url().'family-members?register_error=profileaddingsuccess');
							}else{
								$this->session->set_flashdata('success_message', '"Family member added","Success"');
								redirect(base_url().'family-members?register_error=profileaddingsuccess');
							}	
						}					
					}else{
						$this->session->set_flashdata('success_message', '"Family member adding Fail","Fail"');
						redirect(base_url().'family-members?register_error=profileaddingfail');
					}
				}else{
					$this->session->set_flashdata('success_message', '"Family member adding Fail","Fail"');
					redirect(base_url().'family-members?register_error=profileaddingfail');
				}
			}else{
				$userinfo = array();
				// ini_set('display_errors', 1);
				// ini_set('display_startup_errors', 1);
				// error_reporting(E_ALL);
				if(isset($_SESSION['loginwith']) && $_SESSION['loginwith']=='CommunityProtal'){
					$userId   = $_SESSION['userId'];
					$userinfo = $this->Common_model->getFamailyDetails('ma_family_members',$userId,'fmid',1,'profile_status');
					$bloodrelationsinfo = $this->Common_model->get_data_status_without_delete_records('ma_family_members_bloods','profile_parentid',$userId,'pmmid','ASC');
					$this->data['boomrelations'] = $bloodrelationsinfo;
					$this->data['userinfo'] = $userinfo;
				}
				$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','ASC');
				$this->data['qualificationslist'] = $this->Common_model->get_data_status_without_delete_records('ma_qualification','status',1,'id','ASC');
				$this->data['bloodgroupsslist'] = $this->Common_model->get_data_status_without_delete_records('ma_bloodgroups','status',1,'id','ASC');
				$this->data['citieslist'] = $this->Common_model->get_data_status_without_delete_records('ma_cities','status',1,'cityname','ASC');
				$this->front_view('fmember-collections');	
			}
		} 
		public function index()
		{
			$this->load->helper(array('common'));
			// ini_set('display_errors', 1);
			// ini_set('display_startup_errors', 1);
			// error_reporting(E_ALL);
			$this->data['successstoires'] = $this->Common_model->get_data_status_without_delete_records('ma_success_stories','ssstatus',1,'ssid','DESC');
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','DESC');
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$this->data['groomuserslist'] = $this->Common_model->showuserslist('ma_users','user_status',1,'user_id','DESC','user_gender','male','randomsilk','user_id','ma_user_restricted_details','user_id','randomsilk','user_id');
			$this->data['brideuserslist'] = $this->Common_model->showuserslist('ma_users','user_status',1,'user_id','DESC','user_gender','female','randomsilk','user_id');
			$this->data['nrihomepageuserprofiles'] = $this->Common_model->homeshowuserslist('nri','featured');
			$this->data['malehomepageuserprofiles'] = $this->Common_model->homeshowuserslist('male','featured');
			$this->data['femalehomepageuserprofiles'] = $this->Common_model->homeshowuserslist('female','featured');
			$this->front_view('index');	
		}
		public function aboutus()
		{
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$this->front_view('aboutus');	
		}
		public function how()
		{ 
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$this->front_view('how');	
		}
		public function disclaimer()
		{
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$this->front_view('desclimer');	
		}
		public function brideGroomListing()
		{
			$this->load->helper(array('common'));
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','DESC');
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$countofusers = $this->Common_model->countofprofiles('female')->cntprofiles;
			$config = array();
			$config["base_url"] = base_url() . "bride-profiles";
			$config["total_rows"] = $countofusers;
			$config["per_page"] = 10;
			$config['num_links'] = 20;
			//sample
			$config['display_pages'] =TRUE;
			$config['use_page_numbers'] =TRUE;	
			
			$config['full_tag_open'] = '<ul class="pagination mt-0 animation">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
			$config['prev_tag_open'] = '<li class="page-item rounded-2">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
			$config['next_tag_open'] = '<li class="page-item rounded-2">';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item rounded-2">';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item rounded-2 active">';
			$config['cur_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li class="page-item rounded-2">';
			$config['num_tag_close'] = '</li>';	
			
			$this->pagination->initialize($config);			
			$page = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
			if($page > 0){
				$start=($page-1)*$config["per_page"];
			}else{
				$start = $page;
			}
			if($page==0){
				$fpage  = 1;
				if($config["per_page"] > $countofusers){
					$ofpage = $countofusers;
				}else{
					$ofpage = $config["per_page"];
				}					
			}else{
				$fpage  = $start+1;
				$ofpage = $start+$config["per_page"];
				if($ofpage > $countofusers){
					$ofpage = $countofusers;
				}					
			}
			$this->data['pageno']  = $fpage;
			$this->data['fpageno'] = $ofpage;
			$this->data['slinks'] = $this->pagination->create_links();
			$this->data['totcnt'] = $countofusers;
			$this->data['page_title'] = "Bride Profiles";
			$this->data['profiles'] = $this->Common_model->get_user_profiles('ma_users','user_status',1,'user_id','DESC','user_gender','female','randomsilk','user_id',$config["per_page"],$start);
			$this->front_view('profiles');	
		}
		public function groomListing()
		{
			$this->load->helper(array('common'));
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','DESC');
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$countofusers = $this->Common_model->countofprofiles('male')->cntprofiles;
			$config = array();
			$config["base_url"] = base_url() . "groom-profiles";
			$config["total_rows"] = $countofusers;
			$config["per_page"] = 10;
			// $config["uri_segment"] = 3;
			$config['num_links'] = 20;
			//sample
			$config['display_pages'] =TRUE;
			$config['use_page_numbers'] =TRUE;	
			
			$config['full_tag_open'] = '<ul class="pagination mt-0 animation">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
			$config['prev_tag_open'] = '<li class="page-item rounded-2">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
			$config['next_tag_open'] = '<li class="page-item rounded-2">';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item rounded-2">';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item rounded-2 active">';
			$config['cur_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li class="page-item rounded-2">';
			$config['num_tag_close'] = '</li>';	
			
			$this->pagination->initialize($config);			
			$page = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
			if($page > 0){
				$start=($page-1)*$config["per_page"];
			}else{
				$start = $page;
			}
			if($page==0){
				$fpage  = 1;
				if($config["per_page"] > $countofusers){
					$ofpage = $countofusers;
				}else{
					$ofpage = $config["per_page"];
				}					
			}else{
				$fpage  = $start+1;
				$ofpage = $start+$config["per_page"];
				if($ofpage > $countofusers){
					$ofpage = $countofusers;
				}					
			}
			$this->data['pageno']  = $fpage;
			$this->data['fpageno'] = $ofpage;

			$this->data['slinks'] = $this->pagination->create_links();
			$this->data['page_title'] = "Groom Profiles";
			$this->data['totcnt'] = $countofusers;
			$this->data['profiles'] = $this->Common_model->get_user_profiles('ma_users','user_status',1,'user_id','DESC','user_gender','male','randomsilk','user_id',$config["per_page"],$start);
			$this->front_view('profiles');	
		}
		public function nrisListing()
		{
			$this->load->helper(array('common'));
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','DESC');
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$countofusers = $this->Common_model->countofprofiles('nri')->cntprofiles;
			$config = array();
			$config["base_url"] = base_url() . "nri-profiles";
			$config["total_rows"] = $countofusers;
			$config["per_page"] = 10;
			// $config["uri_segment"] = 3;
			$config['num_links'] = 20;
			//sample
			$config['display_pages'] =TRUE;
			$config['use_page_numbers'] =TRUE;	
			
			$config['full_tag_open'] = '<ul class="pagination mt-0 animation">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
			$config['prev_tag_open'] = '<li class="page-item rounded-2">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
			$config['next_tag_open'] = '<li class="page-item rounded-2">';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item rounded-2">';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item rounded-2 active">';
			$config['cur_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li class="page-item rounded-2">';
			$config['num_tag_close'] = '</li>';	
			
			$this->pagination->initialize($config);			
			$page = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
			if($page > 0){
				$start=($page-1)*$config["per_page"];
			}else{
				$start = $page;
			}
			if($page==0){
				$fpage  = 1;
				if($config["per_page"] > $countofusers){
					$ofpage = $countofusers;
				}else{
					$ofpage = $config["per_page"];
				}					
			}else{
				$fpage  = $start+1;
				$ofpage = $start+$config["per_page"];
				if($ofpage > $countofusers){
					$ofpage = $countofusers;
				}					
			}
			$this->data['pageno']  = $fpage;
			$this->data['fpageno'] = $ofpage;
			$this->data['slinks'] = $this->pagination->create_links();
			$this->data['page_title'] = "NRI's Profiles";
			$this->data['totcnt'] = $countofusers;
			$this->data['profiles'] = $this->Common_model->get_user_profiles('ma_users','user_status',1,'user_id','DESC','user_is_nri',1,'randomsilk','user_id',$config["per_page"],$start);
			$this->front_view('profiles');	
		}
		public function secondmarriagesListing()
		{
			$this->load->helper(array('common'));
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','DESC');
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$countofusers = $this->Common_model->countofprofiles('secondmarriage')->cntprofiles;
			$config = array();
			$config["base_url"] = base_url() . "secondmarriage-profiles";
			$config["total_rows"] = $countofusers;
			$config["per_page"] = 10;
			// $config["uri_segment"] = 3;
			$config['num_links'] = 20;
			// sample
			$config['display_pages'] =TRUE;
			$config['use_page_numbers'] =TRUE;	

			$config['full_tag_open'] = '<ul class="pagination mt-0 animation">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
			$config['prev_tag_open'] = '<li class="page-item rounded-2">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
			$config['next_tag_open'] = '<li class="page-item rounded-2">';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item rounded-2">';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item rounded-2 active">';
			$config['cur_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li class="page-item rounded-2">';
			$config['num_tag_close'] = '</li>';	
			
			$this->pagination->initialize($config);			
			$page = ($this->uri->segment(2))? $this->uri->segment(2) : 0;
			if($page > 0){
				$start=($page-1)*$config["per_page"];
			}else{
				$start = $page;
			}
			if($page==0){
				$fpage  = 1;
				if($config["per_page"] > $countofusers){
					$ofpage = $countofusers;
				}else{
					$ofpage = $config["per_page"];
				}					
			}else{
				$fpage  = $start+1;
				$ofpage = $start+$config["per_page"];
				if($ofpage > $countofusers){
					$ofpage = $countofusers;
				}					
			}
			$this->data['pageno']  = $fpage;
			$this->data['fpageno'] = $ofpage;
			$this->data['slinks'] = $this->pagination->create_links();
			$this->data['page_title'] = "Second Marriage Profiles";			
			$this->data['totcnt'] = $countofusers;
			$this->data['profiles'] = $this->Common_model->get_user_profiles('ma_users','user_status',1,'user_id','DESC','user_is_secondmarriageprofile',1,'randomsilk','user_id',$config["per_page"],$start);
			$this->front_view('profiles');	
		}
		public function servicesListing(){
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$page = $this->uri->segment(2);
			$servicename = $this->uri->segment(2);
			$serivceinfo = $this->Common_model->get_single_data('ma_servicemaster',"$page",'servicemasterseo')->servicemasterdisplayid;
			$servicemasterid = "";
			$servicemastername = "";
			if(isset($serivceinfo->servicemasterdisplayid) && $serivceinfo->servicemasterdisplayid!=""){
				$servicemastername = $serivceinfo->servicemastername;
				$servicemasterid = $serivceinfo->servicemasterdisplayid;
			}
			$countofservices = $this->Common_model->countofservices('featured',$servicemasterid)->cntservices;
			$config = array();
			$config["base_url"] = base_url() . "services/".$page;
			$config["total_rows"] = $countofservices;
			$config["per_page"] = 10;
			$config['num_links'] = 20;
			//sample
			$config['display_pages'] =TRUE;
			$config['use_page_numbers'] =TRUE;	
			
			$config['full_tag_open'] = '<ul class="pagination mt-0 animation">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
			$config['prev_tag_open'] = '<li class="page-item rounded-2">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
			$config['next_tag_open'] = '<li class="page-item rounded-2">';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item rounded-2">';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item rounded-2 active">';
			$config['cur_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li class="page-item rounded-2">';
			$config['num_tag_close'] = '</li>';	
			
			$this->pagination->initialize($config);			
			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
			if($page > 0){
				$start=($page-1)*$config["per_page"];
			}else{
				$start = $page;
			}
			$this->data['slinks'] = $this->pagination->create_links();
			$this->data['page_title'] = $servicemastername;
			$this->data['msservicename'] = $servicename;
			$this->data['pagent'] = $page;
			$this->data['typeoflist'] = 'Featured';
			$this->data['totcnt'] = $countofservices;
			$fuserserviceslistt="";
			$luserserviceslistt="";
			$servicefeatured = 'servicefeatured';
			$value =1;
			$fuserserviceslistt = $this->Common_model->getServiceList('ma_services','servicestatus',1,'serviceid','DESC','servicemasterid',$servicemasterid,$servicefeatured,$value,$config["per_page"],$start);
			$this->data['fuserserviceslist'] = $fuserserviceslistt; 
			$this->data['luserserviceslist'] = $luserserviceslistt;
			$this->front_view('services');
		}
		public function packages()
		{
			$this->data = array();
			$this->front_view('packages');	
		}
		public function contactus()
		{
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$this->front_view('contactus');	
		}
		public function servicesInfo()
		{
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$this->front_view('services-info');	
		}
		public function terms()
		{
			$data = array();
			$this->front_view('terms',$data);	
		}
		public function privacyPolicy()
		{
			$data = array();
			$this->front_view('privacy-policy',$data);	
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
		public function loginsubmitprocess(){
			if(isset($_POST['user_email']) && $_POST['user_email']!=""){
				if(isset($_POST['user_encrpted_password']) && $_POST['user_encrpted_password']!=""){	
					$user_email = $_POST['user_email'];
					$user_encrpted_password = $_POST['user_encrpted_password'];
					if(is_numeric($user_email)){
						$resultSet = $this->Common_model->get_single_data_multiple_columns('ma_users',$user_email,'user_mobile',1,'user_status',md5($user_encrpted_password),'user_encrpted_password');
					}else if(filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
						$resultSet = $this->Common_model->get_single_data_multiple_columns('ma_users',$user_email,'user_email',1,'user_status',md5($user_encrpted_password),'user_encrpted_password');
					}
					if(isset($resultSet->user_id) && $resultSet->user_id!=""){
						$_SESSION['user_registeredid']  = $resultSet->user_registeredid;
						$_SESSION['userId']      = $resultSet->user_id;
						$_SESSION['userName']    = $resultSet->user_display_name;
						$_SESSION['userEmail']   = $resultSet->user_email;
						$_SESSION['userMobile']  = $resultSet->user_mobile;
						$_SESSION['userGender']  = $resultSet->user_gender;
						echo json_encode(array('status'=>true,'output'=>'success'));exit;
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>"loginfail"));exit; 
					}
				}else{
					echo json_encode(array('status'=>FALSE,'output'=>"passwordisrequired"));exit;  
				}
			}else{
				echo json_encode(array('status'=>FALSE,'output'=>"emailormobileisrequired"));exit; 
			}		
		}		
		public function loginsubmitfor()
		{
			if(isset($_SESSION['user_registeredid']) && $_SESSION['user_registeredid']!=""){
				$user_id = $_SESSION['user_registeredid'];
				redirect(base_url().'?register_error=loginsuccessful');
			}else{
				redirect(base_url().'?register_error=loginattemptfail');
			}
		}	
		public function logoutaction(){
			session_start();
			session_destroy();
			redirect(base_url());
		}
		public function emailChecking(){
			$this->load->helper(array('common'));
			$toemail   = 'munnangi.phani@gmail.com';
			$fromemail = GAMILACCOUNT;
			$subject   = "Registration Confirmation";
			$messgae   = "Your registration is successful waiting for site administration approval.";
			$mailSentStatus = sendemailtoall($fromemail,$toemail,$subject,$messgae,$attachment="");
			echo $mailSentStatus;
			exit; 
		}
		public function communitydetails(){
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
			$this->front_view('community-details');	
		}
	}
?>