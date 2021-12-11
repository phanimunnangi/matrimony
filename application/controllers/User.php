<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends MY_Controller {
		function __construct() {
			parent::__construct();
			$this->load->library(array('email','form_validation','session','pagination'));
			$this->load->model('admin/Common_model');
			$this->load->library('pagination');
			$this->load->helper('url');     
		}
		public function getMemberAddittionalInfo(){
			$html="";
			if(isset($_POST['counter']) && $_POST['counter']!=""){
				$professionslist = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','ASC');
				$qualificationslist = $this->Common_model->get_data_status_without_delete_records('ma_qualification','status',1,'id','ASC');
				$bloodgroupsslist = $this->Common_model->get_data_status_without_delete_records('ma_bloodgroups','status',1,'id','ASC');
				$counter = $_POST['counter'];				
				$html.='<td class="" style="border:none">
               <div class="">						
						<label class="text-weight-bold">Member Details '.$counter.'</label>
						<div class="row">						
						<!-- Father Name Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="profile_partner_member_name[]" id="profile_partner_member_name_'.$counter.'" class="form-control animation rounded-2" placeholder="Member Name">
									<span id="error_profile_partner_member_name_'.$counter.'" style="color:red;"></span>
								</div>
							</div>
						<!-- Father Name Ends -->
						<!-- Qualification & Profession Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select name="profile_partner_realtion[]" id="profile_partner_realtion_'.$counter.'" class="custom-select">
										<option value="">Relation With Head</option>
										<option value="wife">Wife</option>
										<option value="son">Son</option>
										<option value="daughter">Daughter</option>
									</select>
									<span id="error_profile_partner_realtion_'.$counter.'" style="color:red;"></span>
								</div>
							</div>
							
						<!-- Qualification & Profession Ends -->
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<input value="" type="text" name="profile_partner_mobile[]" id="profile_partner_mobile_'.$counter.'" class="form-control animation rounded-2" placeholder="Mobile">
								<span id="error_profile_partner_mobile_'.$counter.'" style="color:red;"></span>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<input value="" type="text" name="profile_partner_location[]" id="profile_partner_location_'.$counter.'" class="form-control animation rounded-2" placeholder="Location">
								<span id="error_profile_partner_location_'.$counter.'" style="color:red;"></span>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<select name="profile_partner_marital_status[]" id="profile_partner_marital_status_'.$counter.'" class="custom-select">
											<option value="">Marital Status</option>
											<option value="single">Single</option>
											<option value="married">Married</option>
											<option value="divorce">Divorce</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<select name="profile_parnter_blood_group[]" id="profile_parnter_blood_group_'.$counter.'" class="custom-select">
											<option value="">Blood Group</option>';
											foreach($bloodgroupsslist as $bgroups){
												$html.='<option value="'.$bgroups->bggroupuqid.'">'. ucfirst($bgroups->bggroup).'</option>';
											}
										$html.='</select>
										<span id="error_profile_parnter_blood_group_'.$counter.'" style="color:red;"></span>
									</div>
								</div>
							</div>
						</div>
						<!-- Qualification & Profession Starts -->
						<div class="col-md-6 col-sm-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<select name="profile_partner_qualification[]" id="profile_partner_qualification_'.$counter.'" class="custom-select">
											<option value="">Qualification</option>';
											foreach($qualificationslist as $qualifications){
												$html.='<option value="'.$qualifications->qualificationuqid.'">'.ucfirst($qualifications->qualificationname).'</option>';
											}
										$html.='</select>
										<span id="error_profile_partner_qualification_'.$counter.'" style="color:red;"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<select name="profile_partner_profession[]" id="profile_partner_profession_'.$counter.'" class="custom-select">
											<option value="">Profession</option>';
											foreach($professionslist as $professions){
												$html.='<option value="'.$professions->professiondisplayid.'">'.ucfirst($professions->professionname).'</option>';
											}
										$html.='</select>
										<span id="error_profile_partner_qualification_profession_'.$counter.'" style="color:red;"></span>
									</div>
								</div>
							</div>
						</div>
						<!-- Qualification & Profession Ends -->
						
						<!-- Date of Birth Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="text-weight-medium">Date of Birth</label>
									<div class="d-flex justify-content-between">
										<select required name="profile_partner_dob_date[]" id="profile_partner_dob_date_'.$counter.'" class="custom-select alt-1">';
											for($d=1;$d<=31;$d++){ 
												$dateDate = "";
												$datepadding = str_pad($d, 2, "0", STR_PAD_LEFT);
											
										$html.='<option value="'.$d.'">'.$datepadding.'</option>';
											}
										$html.='</select>
										<select required name="profile_partner_dob_month[]" id="profile_partner_dob_month_'.$counter.'" class="custom-select alt-1 mx-2">';
											$formattedMonthArray = array(
												"01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr",
												"05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug",
												"09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec",
											);
											foreach($formattedMonthArray as $key=>$month) {
												$html.='<option value="'.$key.'">'.$month.'</option>';
											}										
										$html.='</select>
										<select required name="profile_partner_dob_year[]" id="profile_partner_dob_year_'.$counter.'" class="custom-select alt-1">';
											$yearv = date('Y'); $laste20years = $yearv; 
											for($i=1980;$i<=$laste20years;$i++) { 
												$html.='<option value='.$i.'>'.$i.'</option>';
											} 
										$html.='</select>
									</div>
								</div>
							</div>
						<!-- Date of Birth Ends -->						
						</div>
					<!-- Fields Ends -->				
					</div>
				</td>';
			}			
			echo json_encode(array('status'=>TRUE,'htmlData'=>$html));exit; 
		}
		public function likeduserprofiles(){
			if(isset($_SESSION['userId']) && $_SESSION['userId']!=""){
				$userId = $_SESSION['userId'];
				// ini_set('display_errors', 1);
				// ini_set('display_startup_errors', 1);
				// error_reporting(E_ALL);
				$this->load->helper(array('common'));
				$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
				$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
				$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','DESC');
				$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
				$countofusers = $this->Common_model->countoflikedprofiles('female')->cntprofiles;
				$config = array();
				$config["base_url"] = base_url() . "likeduserprofiles";
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
				$this->data['page_title'] = "Liked Profiles";
				$this->data['profiles'] = $this->Common_model->get_user_liked_profiles('ma_user_liked_profiles','ulp_status',1,'ulp_user_id_to','DESC','ulp_user_id_from',$userId,$config["per_page"],$start);
				$this->front_view('profiles');
			}else{
				redirect(base_url());
			}
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
						'servicevaliditydays'  => $servicevaliditydays,
						'servicecreatedat'  => date('Y-m-d H:i:s'),
						'serviceupdatedat'  => date('Y-m-d H:i:s'),
						'servicestatus'  => 3
					);			
					$insertid = $this->Common_model->add('ma_services',$communitydata);
					if($insertid){	
						$servicedisplayid = 'USERSERVICE'.date('y').str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
						$communityudata = array(
							'servicedisplayid' => $servicedisplayid,
						);	
						$updatedstatus = $this->Common_model->update('ma_services',$communityudata,$insertid,'serviceid');
						redirect(base_url().'?register_error=servicefoundsuccess');
					}else{
						redirect(base_url().'?register_error=fail');
					}
				}else{
					redirect(base_url().'services-info');
				}
			}else{
				redirect(base_url().'services-info');
			}	
		}
		public function profileLikedorDisliked(){
			if(isset($_POST['loggeduserid']) && $_POST['loggeduserid']!=""){
				if(isset($_POST['loggeduserid']) && $_POST['loggeduserid']!=""){
					$ulp_user_id_from  = $_POST['loggeduserid'];
					$getLoggedUserInfo = $this->Common_model->get_single_data('ma_users',$ulp_user_id_from,'user_id');
					$ulp_user_id_to = $_POST['profileid'];
					$getProfileUserInfo = $this->Common_model->get_single_data('ma_users',$ulp_user_id_to,'user_id');
					$getDetails = $this->Common_model->get_single_data_multiple_columns('ma_user_liked_profiles',$ulp_user_id_from,'ulp_user_id_from',1,'ulp_status',$ulp_user_id_to,'ulp_user_id_to');
					if(isset($getDetails->ulp_id) && $getDetails->ulp_id!=""){
						$ulp_id = $getDetails->ulp_id;
						$updatestatus = $this->Common_model->delete_single_row('ma_user_liked_profiles',$ulp_id,'ulp_id');
						if($updatestatus!=""){
							echo json_encode(array('status'=>TRUE,'output'=>'success'));exit; 
						}else{
							echo json_encode(array('status'=>FALSE,'output'=>'fail'));exit; 
						}				
					}else{
						$masterData = array(
							'ulp_user_id_from' => $ulp_user_id_from,
							'ulp_user_id_to'   => $ulp_user_id_to,
							'ulp_createdat'    => date('Y-m-d H:i:s'),
							'ulp_updatedat'    => date('Y-m-d H:i:s')
						);
						$insertid = $this->Common_model->add('ma_user_liked_profiles',$masterData);
						if($insertid!=""){
							echo json_encode(array('status'=>TRUE,'output'=>'success'));exit; 
						}else{
							echo json_encode(array('status'=>FALSE,'output'=>'fail'));exit; 
						}	
					}
				}else{
					echo json_encode(array('status'=>FALSE,'output'=>'profileuseridrequired'));exit; 
				}				
			}else{
				echo json_encode(array('status'=>FALSE,'output'=>'loggeduseridrequired'));exit; 
			}			
		}
		public function subscribeemailsave(){
			if(isset($_POST['subscribeid']) && $_POST['subscribeid']!=""){
				$subscribeid = $_POST['subscribeid'];
			$getSubscribe=$this->Common_model->get_single_data_column('ma_subscribers',$subscribeid,'sbemail',1,'sbstatus');
				$subscribeid = $_POST['subscribeid'];
				$sbipaddress = $_SERVER['REMOTE_ADDR'];
				$masterData = array(
					'sbipaddress' => $sbipaddress,
					'sbemail'     => $subscribeid,
					'sbcreatedat' => date('Y-m-d H:i:s'),
					'sbupdatedat' => date('Y-m-d H:i:s')
				);
				if(isset($getSubscribe->sbid) && $getSubscribe->sbid!=""){
					$sbid = $getSubscribe->sbid;
					$updatestatus = $this->Common_model->update('ma_subscribers',$masterData,$sbid,'sbid');
					if($updatestatus!=""){
						echo json_encode(array('status'=>TRUE,'output'=>'success'));exit; 
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'fail'));exit; 
					}
				}else{
					$insertid = $this->Common_model->add('ma_subscribers',$masterData);
					if($insertid!=""){
						echo json_encode(array('status'=>TRUE,'output'=>'success'));exit; 
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'fail'));exit; 
					}					
				}
			}else{
				echo json_encode(array('status'=>FALSE,'output'=>'subscribeemailisrequired'));exit; 
			}
		}
		public function checkProfileId(){
			if(isset($_POST['profileid']) && $_POST['profileid']!=""){
				$page = $_POST['profileid'];
				$userDetails=$this->Common_model->getUserDetails('ma_users',$page,'user_registeredid',1,'user_status');
				if(isset($userDetails->user_id) && $userDetails->user_id!=""){
					echo json_encode(array('status'=>TRUE,'output'=>'profileidisvalid'));exit; 
				}else{
					echo json_encode(array('status'=>FALSE,'output'=>'profileisnotfound'));exit; 
				}
			}else{
				echo json_encode(array('status'=>FALSE,'output'=>'profileisrequired'));exit; 
			}
		}
		public function searchProfiles(){
			$ses = $this->session->userdata();
			$this->load->helper(array('common'));
			if(isset($_GET['registerid']) && $_GET['registerid']!=""){
				$registerid   = $_GET['registerid'];
				$serachresults = $this->Common_model->searchingprofiles($user_gender="",$uppd_from_age="",$uppd_to_age="",$uppd_professionname="",$upi_caste="",$per_page="",$start="",$registerid);
				$this->data['serachedprofiles'] = $serachresults;
			}else if(isset($ses['userGender']) && $ses['userGender']!=""){
				// ini_set('display_errors', 1);
				// ini_set('display_startup_errors', 1);
				// error_reporting(E_ALL);
				$user_gender   = ($ses['userGender'] == 'male')?'female':'male';//$_GET['gendersearch'];
				$uppd_from_age = $_GET['fromagesearch'];
				$uppd_to_age   = $_GET['toagesearch'];
				if(isset($_GET['professionsearch']) && $_GET['professionsearch']=="emptyprofession"){
					$uppd_professionname = "";
				}else{
					$uppd_professionname = $_GET['professionsearch'];
				}
				if(isset($_GET['castesearch']) && $_GET['castesearch']=="emptycaste"){
					$upi_caste = "";
				}else{
					$upi_caste = $_GET['castesearch'];
				}
				$countofusers = $this->Common_model->countofsearchingprofiles($user_gender,$uppd_from_age,$uppd_to_age,$uppd_professionname,$upi_caste)->cnt;
				$config = array();
				$config["base_url"] = base_url() ."searchprofiles?gendersearch=".$user_gender."&fromagesearch=".$uppd_from_age."&toagesearch=".$uppd_to_age."&professionsearch=".$uppd_professionname."&castesearch=".$upi_caste.'&pageno=';
				$config["total_rows"] = $countofusers;
				$config["per_page"] = 10;
				$config['num_links'] = 20;
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
				if(isset($_GET['pageno']) && $_GET['pageno']!=""){
					$pagenumber = $_GET['pageno'];
					$pagee = explode('/',$pagenumber);
					$page  = $pagee[1];
				}else{
					$page =0;
				}
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
				$this->data['slinks']  = $this->pagination->create_links();
				$this->data['totcnt']  = $countofusers;
				$serachresults = $this->Common_model->searchingprofiles($user_gender,$uppd_from_age,$uppd_to_age,$uppd_professionname,$upi_caste,$config["per_page"],$start,$registerid="");
				$this->data['serachedprofiles'] = $serachresults;
			}else{
				$this->data['serachedprofiles'] = array();
				$this->data['slinks'] = "";
				$this->data['totcnt'] = 0;
			}
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','DESC');
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$this->front_view('searchprofiles');
		}
		public function viewProfile(){
			$page = $this->uri->segment(2);
			if(isset($_SESSION['userId']) && $_SESSION['userId']!=""){				
				if($page!=""){
					$userDetails=$this->Common_model->getUserDetails('ma_users',$page,'user_registeredid',1,'user_status');
					if(isset($userDetails->user_id) && $userDetails->user_id!=""){
						if($_SESSION['userGender']!=$userDetails->user_gender){
							$this->data['userinfo'] = $userDetails;							
							$this->front_view('viewprofile');
						}else{
							redirect(base_url());
						}
					}else{
						redirect(base_url());
					}
				}else{
					redirect(base_url());
				}
			}else{
				redirect(base_url());
			}			
		}
		public function saveuserprofiledata(){
			
			
			if(isset($_POST['user_email']) && $_POST['user_email']!="" && isset($_POST['user_mobile']) && $_POST['user_mobile']!=""){
				$_POST['user_id'] = $this->user_register();
				//echo $user_id; die;
				// echo "<pre>";print_r($_FILES);
				// echo "<pre>";print_r($_POST);exit;
				// ini_set('display_errors', 1);
				// ini_set('display_startup_errors', 1);
				// error_reporting(E_ALL);
				if($_POST['user_email'] == ''){
					
				}
				$user_email = $_POST['user_email'];
				$user_mobile = $_POST['user_mobile'];
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
				$hideData['urd_landlinenumber'] = $_POST['urd_landlinenumber'];
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
								
				$masterData['user_gender'] = $_POST['user_gender'];//$_SESSION['userGender'];
				$user_isagree =0;
				if(isset($_POST['user_isagree']) && $_POST['user_isagree']=="on"){
					$user_isagree = 1;
				}
				$masterData['user_isagree'] = $user_isagree;
				
				
				$masterData['user_updatedat'] = date('Y-m-d H:i:s');
				$masterData['user_craetedat'] = date('Y-m-d H:i:s');
				$hideData['urd_updatedat'] = date('Y-m-d H:i:s');
				
				$hideData['urd_profile_pic'] = NULL;
				$error = 1;
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
					$insertid = $this->Common_model->add('ma_users',$masterData);
					if($insertid){	
						if($_POST['user_gender']=='female'){
							$user_registeredid = 'TBMICB'.date('y').'10'.str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
						}else{
							$user_registeredid = 'TBMICG'.date('y').'10'.str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
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
					$upi_birth_timings_s = 0;
					$upi_birth_timings   = "0-0";
					if(isset($_POST['upi_birth_timings_h']) && $_POST['upi_birth_timings_h']!=0){
						$upi_birth_timings_h = $_POST['upi_birth_timings_h'];
						if(isset($_POST['upi_birth_timings_m']) && $_POST['upi_birth_timings_m']!=0){
							$upi_birth_timings_m = $_POST['upi_birth_timings_m'];
						}
						if(isset($_POST['upi_birth_timings_sec']) && $_POST['upi_birth_timings_sec']!=0){
							$upi_birth_timings_s = $_POST['upi_birth_timings_sec'];
						}
						$upi_birth_timings = $upi_birth_timings_h.'-'.$upi_birth_timings_m.'-'.$upi_birth_timings_s;
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
					$upi_physicaldisability = 'No';
					if(isset($_POST['upi_physicaldisability']) && $_POST['upi_physicaldisability']!=""){
						$upi_physicaldisability = $_POST['upi_physicaldisability'];
					}
					$personalarray['upi_physicaldisability'] = $upi_physicaldisability;
					
					$upi_will_to_marry_widow = 'No';
					if(isset($_POST['upi_will_to_marry_widow']) && $_POST['upi_will_to_marry_widow']!=""){
						$upi_will_to_marry_widow = $_POST['upi_will_to_marry_widow'];
					}
					$personalarray['upi_will_to_marry_widow'] = $upi_will_to_marry_widow;
					
					$upi_livingtogether = 'No';
					if(isset($_POST['upi_livingtogether']) && $_POST['upi_livingtogether']!=""){
						$upi_livingtogether = $_POST['upi_livingtogether'];
					}
					$personalarray['upi_livingtogether'] = $upi_livingtogether;
					
					$upi_have_childerns = 'No';
					if(isset($_POST['upi_have_childerns']) && $_POST['upi_have_childerns']!=""){
						$upi_have_childerns = $_POST['upi_have_childerns'];
					}
					$personalarray['upi_have_childerns'] = $upi_have_childerns;
					
					$upi_noofchilderns = 0;
					if(isset($_POST['upi_noofchilderns']) && $_POST['upi_noofchilderns']!=""){
						$upi_noofchilderns = $_POST['upi_noofchilderns'];
					}
					$personalarray['upi_noofchilderns'] = $upi_noofchilderns;
					
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
					
					$upd_elder_brothers =0;
					if(isset($_POST['upd_elder_brothers']) && $_POST['upd_elder_brothers']!=""){
						$upd_elder_brothers = $_POST['upd_elder_brothers'];
					}
					$familyarray['upd_elder_brothers']  = $upd_elder_brothers;
					
					$upd_younger_brothers =0;
					if(isset($_POST['upd_younger_brothers']) && $_POST['upd_younger_brothers']!=""){
						$upd_younger_brothers = $_POST['upd_younger_brothers'];
					}
					$familyarray['upd_younger_brothers']  = $upd_younger_brothers;
					
					$upd_married_brothers =0;
					if(isset($_POST['upd_married_brothers']) && $_POST['upd_married_brothers']!=""){
						$upd_married_brothers = $_POST['upd_married_brothers'];
					}
					$familyarray['upd_married_brothers']  = $upd_married_brothers;
					
					$upd_elder_sisters =0;
					if(isset($_POST['upd_elder_sisters']) && $_POST['upd_elder_sisters']!=""){
						$upd_elder_sisters = $_POST['upd_elder_sisters'];
					}
					$familyarray['upd_elder_sisters']  = $upd_elder_sisters;
					
					$upd_younger_sisters =0;
					if(isset($_POST['upd_younger_sisters']) && $_POST['upd_younger_sisters']!=""){
						$upd_younger_sisters = $_POST['upd_younger_sisters'];
					}
					$familyarray['upd_younger_sisters']  = $upd_younger_sisters;
					
					$upd_married_sisters =0;
					if(isset($_POST['upd_married_sisters']) && $_POST['upd_married_sisters']!=""){
						$upd_married_sisters = $_POST['upd_married_sisters'];
					}
					$familyarray['upd_married_sisters']  = $upd_married_sisters;
					
					
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
					
					$uppd_from_height ="";
					if(isset($_POST['uppd_from_height']) && $_POST['uppd_from_height']!=""){
						$uppd_to_age = $_POST['uppd_from_height'];
					}
					$parnterarray['uppd_from_height']  = $uppd_from_height;
					
					$uppd_to_height ="";
					if(isset($_POST['uppd_to_height']) && $_POST['uppd_to_height']!=""){
						$uppd_to_age = $_POST['uppd_to_height'];
					}
					$parnterarray['uppd_to_height']  = $uppd_to_height;
					
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
					$this->session->set_flashdata('success_message', '"Profile added successfully, Please verify your email and wait for Admin approval","Success"');
					redirect(base_url().'editprofile?register_error=profilesuccess');
				}else{
					$this->session->set_flashdata('error_message', '"Please try some time again.","Failed!"');
					redirect(base_url().'editprofile?register_error=profilefail');
				}			
			}else{
				$this->session->set_flashdata('error_message', '"Required fields are required.","Failed!"');
				redirect(base_url().'editprofile?profile=requiredparameters');
			}
		} 
		public function editProfile(){
			// echo "<pre>";print_r($_SESSION);exit;
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['subcasteslist'] = $this->Common_model->get_data_status_without_delete_records('ma_community_subcastes','subcastestatus',1,'subcasteid','DESC');
			$this->data['professionslist'] = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','DESC');
			$this->data['starslist'] = $this->Common_model->get_data_status_without_delete_records('ma_stars','starstatus',1,'starid','DESC');
			$this->data['raasislist'] = $this->Common_model->get_data_status_without_delete_records('ma_raasi','raasistatus',1,'raasiid','DESC');
			$this->data['heightslist'] = $this->Common_model->get_data_status_without_delete_records('ma_heights','heightstatus',1,'heightid','ASC');
			$this->data['legs'] = $this->Common_model->get_data_status_without_delete_records('ma_legs','legstatus',1,'legid','ASC');
			$this->data['areaslist'] = $this->Common_model->get_data_status_without_delete_records('ma_areas','areastatus',1,'areadisplayid','DESC');
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			//if(isset($_SESSION['user_registeredid']) && $_SESSION['user_registeredid']!=""){
			//	$userRegisteredid = $_SESSION['user_registeredid'];
				//if($userRegisteredid!=""){
					//$userinfo=$this->Common_model->getUserDetails('ma_users',$userRegisteredid,'user_registeredid',1,'user_status');
					$this->data['page_title'] = '';
					if(isset($_SESSION['user_registeredid']) && $_SESSION['user_registeredid']!=""){
						$userRegisteredid = $_SESSION['user_registeredid'];
						$userinfo=$this->Common_model->getUserDetails('ma_users',$userRegisteredid,'user_registeredid',1,'user_status');
					}
					if(isset($userinfo->user_id) && $userinfo->user_id!=""){
						$this->data['userdetails'] = $userinfo;							
						$this->front_view('editprofile');
					}else{
						$this->front_view('editprofile');
					}
				//}else{
				//	redirect(base_url());
				//}
			/*}else{
				redirect(base_url());
			}	*/		
		}
		public function userrefferachecking(){
			if(isset($_POST['user_referal_code']) && $_POST['user_referal_code']!=""){
				if(isset($_POST['register_from']) && $_POST['register_from']==2){
					$user_referal_code = $_POST['user_referal_code'];
					$getUserData = $this->Common_model->get_single_data_column('ma_referal_codes',$user_referal_code,'rfname','2','rfstatus');	
					if(isset($getUserData->rfid) && $getUserData->rfid!=""){
						echo json_encode(array('status'=>TRUE,'output'=>'success'));exit; 
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'notinrecords'));exit; 
					}
				}else{
					echo json_encode(array('status'=>FALSE,'output'=>'somethingwentwrong'));exit; 
				}
			}else{
				echo json_encode(array('status'=>FALSE,'output'=>'referralcodeisrequired'));exit; 
			}
		}
		public function useremailandmobilechecking(){
			// register_from
			if(isset($_POST['register_from']) && $_POST['register_from']==2){
				if(isset($_POST['user_email']) && $_POST['user_email']!=""){
					$user_email = $_POST['user_email'];
					$getUserData = $this->Common_model->get_single_data_column('ma_family_members',$user_email,'profile_email','2','profile_status');				
					if(isset($getUserData->fmid) && $getUserData->fmid!=""){
						$user_id = $getUserData->fmid;
						$checked =0;
						if(isset($_POST['fmid']) && $_POST['fmid']!=""){
							$uid = $_POST['fmid'];
							if($user_id==$uid){
								$checked =1;
							}
						}
						if($checked){
							$user_mobile = $_POST['user_mobile'];
							$getUserData = $this->Common_model->get_single_data_column('ma_family_members',$user_mobile,'profile_phone','2','profile_status');
							if(isset($getUserData->fmid) && $getUserData->fmid!=""){
								$user_id = $getUserData->fmid;
								$checked =0;
								if(isset($_POST['fmid']) && $_POST['fmid']!=""){
									$uid = $_POST['fmid'];
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
						$getUserData = $this->Common_model->get_single_data_column('ma_family_members',$user_mobile,'profile_phone','2','profile_status');
						if(isset($getUserData->fmid) && $getUserData->fmid!=""){
							$user_id = $getUserData->fmid;
							$checked =0;
							if(isset($_POST['fmid']) && $_POST['fmid']!=""){
								$uid = $_POST['fmid'];
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
			}else{
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
			
		}
		public function registersubmit(){
			if(isset($_POST['registerthru']) && $_POST['registerthru']==2){
				if(isset($_POST['user_email']) && $_POST['user_email']!=""){
					$user_email = $_POST['user_email'];
					$getUserData = $this->Common_model->get_single_data_column('ma_family_members',$user_email,'profile_email','2','profile_status');				
					if(isset($getUserData->fmid) && $getUserData->fmid!=""){
						$user_id = $getUserData->fmid;
						$checked =0;
						if(isset($_POST['fmid']) && $_POST['fmid']!=""){
							$uid = $_POST['fmid'];
							if($user_id==$uid){
								$checked =1;
							}
						}
						if($checked){
							$user_mobile = $_POST['user_mobile'];
							$getUserData = $this->Common_model->get_single_data_column('ma_family_members',$user_mobile,'profile_phone','2','profile_status');
							if(isset($getUserData->fmid) && $getUserData->fmid!=""){
								$user_id = $getUserData->fmid;
								$checked =0;
								if(isset($_POST['fmid']) && $_POST['fmid']!=""){
									$uid = $_POST['fmid'];
									if($user_id==$uid){
										$checked =1;
									}
								}
								if($checked==0){
									$this->session->set_flashdata('error_message', '"Entered mobile number is already with our records.","Failed!"');
									redirect(base_url().'?register_error=mobileissue');
								}					
							}
						}else{
							$this->session->set_flashdata('error_message', '"Entered email is already with our records.","Failed!"');
							redirect(base_url().'?register_error=emailissue');
						}						
					}else{
						$user_mobile = $_POST['user_mobile'];
						$getUserData = $this->Common_model->get_single_data_column('ma_family_members',$user_mobile,'profile_phone','2','profile_status');
						if(isset($getUserData->fmid) && $getUserData->fmid!=""){
							$user_id = $getUserData->fmid;
							$checked =0;
							if(isset($_POST['fmid']) && $_POST['fmid']!=""){
								$uid = $_POST['fmid'];
								if($user_id==$uid){
									$checked =1;
								}
							}
							if($checked==0){
								$this->session->set_flashdata('error_message', '"Entered mobile number is already with our records.","Failed!"');
								redirect(base_url().'?register_error=mobileissue');
							}					
						}
					}
					if(isset($_POST['user_referal_code']) && $_POST['user_referal_code']!=""){
						$user_referal_code = $_POST['user_referal_code'];
						$getUserData = $this->Common_model->get_single_data_column('ma_referal_codes',$user_referal_code,'rfname','2','rfstatus');	
						if(isset($getUserData->rfid) && $getUserData->rfid!=""){
							$success =1;
						}else{
							$this->session->set_flashdata('error_message', '"Entered refferal code is not in records.","Failed!"');
							redirect(base_url().'?register_error=refferalissue');
						}						
					}else{
						$this->session->set_flashdata('error_message', '"Refferal code is required.","Failed!"');
						redirect(base_url().'?register_error=refferalissue');
					}
								
					//  ma_family_members
					$maFamilyMembers = array();
					$hideData = array();
					$maFamilyMembers['profile_fullname'] = ucfirst($_POST['user_display_name']);
					$maFamilyMembers['profile_email'] = $_POST['user_email'];
					$maFamilyMembers['profile_phone'] = $_POST['user_mobile'];
					$user_encrpted_password = "";
					$user_encodeed_password = "";
					// if(isset($_POST['user_encrpted_password']) && $_POST['user_encrpted_password']!=""){
						$user_encrpted_passwordd = rand(10000,99999);///$_POST['user_encrpted_password'];
						$profile_password  = md5($user_encrpted_passwordd);
						$user_encodeed_password  = base64_encode($user_encrpted_passwordd);
					// } 
					$maFamilyMembers['profile_password'] = $profile_password;
					$maFamilyMembers['profile_encrpted_password'] = $user_encodeed_password;
					$maFamilyMembers['profile_status'] = 3;
					$maFamilyMembers['profile_updatedat'] = date('Y-m-d H:i:s');
					$maFamilyMembers['profile_createdat'] = date('Y-m-d H:i:s');
					$insertid = $this->Common_model->add('ma_family_members',$maFamilyMembers);
					if($insertid){
						$registeredid = str_pad($insertid, 2, "0", STR_PAD_LEFT);
						$dataArray = array(
							'profile_registeredid' => 'PROFILE'.$registeredid,
						);
						$updateStatus = $this->Common_model->update('ma_family_members',$dataArray,$insertid,'fmid');
						$getUserData = $this->Common_model->get_single_data_column('ma_referal_codes',$user_referal_code,'rfname','2','rfstatus');
						if(isset($getUserData->rfid) && $getUserData->rfid!=""){
							$rfid   = $getUserData->rfid;
							$rfname = $getUserData->rfname;
							$refferal_userid = $getUserData->rfuserid;
							$maReferalCodes = array();
							$maReferalCodes['refferalid'] = $rfid;
							$maReferalCodes['refferalcode'] = $rfname;
							$maReferalCodes['userid'] = $insertid;
							$maReferalCodes['username'] = ucfirst($_POST['user_display_name']);
							$maReferalCodes['refferal_userid'] = $refferal_userid;
							$maReferalCodes['status'] = 1;
							$maReferalCodes['createdat'] = date('Y-m-d H:i:s');
							$maReferalCodes['updatedat'] = date('Y-m-d H:i:s');
							$insertid = $this->Common_model->add('ma_referal_used_users',$maReferalCodes);
							$getReffearlData = $this->Common_model->get_data_status_without_delete_records('ma_referal_used_users','refferalid',$rfid,'','');
							if(isset($getReffearlData) && count($getReffearlData)>0){
								$cnt = count($getReffearlData);
								$maReferalCodesUsed = array();
								$maReferalCodesUsed['rfusedcount'] = $cnt;
								$updateStatus = $this->Common_model->update('ma_referal_codes',$maReferalCodesUsed,$rfid,'rfid');
							}
							$rfname = $this->random_strings(10); 
							$datepadding = str_pad($insertid, 2, "0", STR_PAD_LEFT);
							$rfstrtolower = strtolower($rfname.$datepadding);
							$rfstrtoupper = strtoupper($rfname.$datepadding);
							$addRefferalCode = array();
							$addRefferalCode['rfuqid'] = $rfstrtolower;
							$addRefferalCode['rfuserid']   = $insertid;
							$addRefferalCode['rfname']     = $rfstrtoupper;
							$addRefferalCode['rfcreatedat'] = date('Y-m-d H:i:s');
							$addRefferalCode['rfupdatedat'] = date('Y-m-d H:i:s');
							$insertid = $this->Common_model->add('ma_referal_codes',$addRefferalCode);
						}												
						$this->load->helper(array('common'));
						$toemail   = $_POST['user_email'];
						$fromemail = GAMILACCOUNT;
						$subject   = "Registration Confirmation";
						$messgae   = "Your registration is successful waiting for site administration approval.";
						$mailSentStatus = sendemailtoall($fromemail,$toemail,$subject,$messgae,$attachment="");
						$successmessage = 0;
						if($mailSentStatus==1){
							$successmessage = 1;
						}
						redirect(base_url().'?register_error=successful');
					}else{
						$this->session->set_flashdata('error_message', '"Please try some time again.","Failed!"');
						redirect(base_url().'?register_error=notinserted');
					}
				}
			}else{
				if(isset($_POST['user_email']) && $_POST['user_email']!="" && isset($_POST['user_mobile']) && $_POST['user_mobile']!=""){				
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
									redirect(base_url().'?register_error=mobileissue');
								}					
							}
						}else{
							$this->session->set_flashdata('error_message', '"Entered email is already with our records.","Failed!"');
							redirect(base_url().'?register_error=emailissue');
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
								redirect(base_url().'?register_error=mobileissue');
							}					
						}
					}				
					
					// ma_users
					$masterData = array();
					$hideData = array();
					$masterData['user_display_name'] = ucfirst($_POST['user_display_name']);
					$masterData['user_email'] = $_POST['user_email'];
					$masterData['user_mobile'] = $_POST['user_mobile'];
					$hideData['urd_email'] = $_POST['user_email'];
					$user_encrpted_password = "";
					$user_encodeed_password = "";
					// if(isset($_POST['user_encrpted_password']) && $_POST['user_encrpted_password']!=""){
						$user_encrpted_passwordd = $_POST['user_encrpted_password'];
						$user_encrpted_password  = md5($user_encrpted_passwordd);
						$user_encodeed_password  = base64_encode($user_encrpted_passwordd);
					// } 
					$masterData['user_encrpted_password'] = $user_encrpted_password;
					$masterData['user_encodeed_password'] = $user_encodeed_password;
					$masterData['user_gender'] = $_POST['user_gender'];
					$masterData['user_create_profile_for'] = $_POST['user_create_profile_for'];
					$masterData['user_status'] = 3;
					$masterData['user_updatedat'] = date('Y-m-d H:i:s');
					$masterData['user_craetedat'] = date('Y-m-d H:i:s');
					$hideData['urd_updatedat'] = date('Y-m-d H:i:s');
					$hideData['urd_profile_pic'] = NULL;
					// echo "<pre>";print_r($masterData);exit;
					$insertid = $this->Common_model->add('ma_users',$masterData);
					if($insertid){
						// $getUserData = $this->Common_model->get_single_data_column('ma_users',$insertid,'user_id','3','user_status');
						// echo "<pre>";print_r($getUserData);exit;
						if($_POST['user_gender']=='female'){
							$user_registeredid = 'TBMICB'.date('y').'10'.str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
						}else{
							$user_registeredid = 'TBMICG'.date('y').'10'.str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
						}							
						$unquineData = array(
							'user_registeredid' => $user_registeredid,
						);	
						$uinsertid = $this->Common_model->update('ma_users',$unquineData,$insertid,'user_id');		
						$this->load->helper(array('common'));
						$toemail   = $_POST['user_email'];
						$fromemail = GAMILACCOUNT;
						$subject   = "Registration Confirmation";
						$messgae   = "Your registration is successful waiting for site administration approval.</br>Username: ".$toemail."</br>Password: ".$user_encrpted_passwordd;
						$mailSentStatus = sendemailtoall($fromemail,$toemail,$subject,$messgae,$attachment="");
						$successmessage = 0;
						if($mailSentStatus==1){
							$successmessage = 1;
						}
						redirect(base_url().'?register_error=successful');
					}else{
						$this->session->set_flashdata('error_message', '"Please try some time again.","Failed!"');
						redirect(base_url().'?register_error=notinserted');
					}			
				}else{
					$this->session->set_flashdata('error_message', '"Required fields are required.","Failed!"');
					redirect(base_url().'?register_error=notinserted');
				}
			}			
		} 
		public function user_register(){			
			if(isset($_POST['user_email']) && $_POST['user_email']!="" && isset($_POST['user_mobile']) && $_POST['user_mobile']!=""){				
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
								//redirect(base_url().'?register_error=mobileissue');
							}					
						}
					}else{
						$this->session->set_flashdata('error_message', '"Entered email is already with our records.","Failed!"');
						//redirect(base_url().'?register_error=emailissue');
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
							//redirect(base_url().'?register_error=mobileissue');
						}					
					}
				}				
				
				// ma_users
				$masterData = array();
				$hideData = array();
				$masterData['user_display_name'] = ucfirst($_POST['user_display_name']);
				$masterData['user_email'] = $_POST['user_email'];
				$masterData['user_mobile'] = $_POST['user_mobile'];
				$hideData['urd_email'] = $_POST['user_email'];
				$user_encrpted_password = "";
				$user_encodeed_password = "";
				// if(isset($_POST['user_encrpted_password']) && $_POST['user_encrpted_password']!=""){
					$user_encrpted_passwordd = rand(10000,100000);//$_POST['user_encrpted_password'];
					$user_encrpted_password  = md5($user_encrpted_passwordd);
					$user_encodeed_password  = base64_encode($user_encrpted_passwordd);
				// } 
				$masterData['user_encrpted_password'] = $user_encrpted_password;
				$masterData['user_encodeed_password'] = $user_encodeed_password;
				$masterData['user_gender'] = $_POST['user_gender'];
				$masterData['user_create_profile_for'] = $_POST['user_create_profile_for'];
				$masterData['user_status'] = 3;
				$masterData['user_updatedat'] = date('Y-m-d H:i:s');
				$masterData['user_craetedat'] = date('Y-m-d H:i:s');
				$hideData['urd_updatedat'] = date('Y-m-d H:i:s');
				$hideData['urd_profile_pic'] = NULL;
				// echo "<pre>";print_r($masterData);exit;
				$insertid = $this->Common_model->add('ma_users',$masterData);
				if($insertid){
					// $getUserData = $this->Common_model->get_single_data_column('ma_users',$insertid,'user_id','3','user_status');
					// echo "<pre>";print_r($getUserData);exit;
					if($_POST['user_gender']=='female'){
						$user_registeredid = 'B'.date('y').'10'.str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
					}else{
						$user_registeredid = 'G'.date('y').'10'.str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
					}							
					$unquineData = array(
						'user_registeredid' => $user_registeredid,
					);	
					$uinsertid = $this->Common_model->update('ma_users',$unquineData,$insertid,'user_id');		
					$this->load->helper(array('common'));
					$toemail   = $_POST['user_email'];
					$fromemail = GAMILACCOUNT;
					$subject   = "Registration Confirmation";
					$messgae   = "Your registration is successful waiting for site administration approval.<br>";
					$messgae   .= "Email: ".$_POST['user_email'];
					$messgae   .= "<br>Password: ".$user_encrpted_passwordd;
					$mailSentStatus = sendemailtoall($fromemail,$toemail,$subject,$messgae,$attachment="");
					$successmessage = 0;
					if($mailSentStatus==1){
						$successmessage = 1;
					}
					return $insertid;
					//redirect(base_url().'?register_error=successful');
				}else{
					$this->session->set_flashdata('error_message', '"Please try some time again.","Failed!"');
					//redirect(base_url().'?register_error=notinserted');
				}			
			}else{
				$this->session->set_flashdata('error_message', '"Required fields are required.","Failed!"');
				//redirect(base_url().'?register_error=notinserted');
			}
		}
		public function changepasswordsubmit(){
			if(isset($_POST['homepage']) && $_POST['homepage']=="adminreset"){
				if(isset($_POST['userid']) && $_POST['userid']!=""){
					$userid = $_POST['userid'];
					$oldpassword = $_POST['oldpassword'];
					$newpassword = $_POST['newpassword'];
					$confirmpassword = $_POST['confirmpassword'];
					if($newpassword!=$confirmpassword){
						echo json_encode(array('status'=>false,'output'=>'confirmpwdandnewpwdnotmatch'));exit;	
					}else{
						$resultSet = $this->Common_model->get_single_data_column('ma_users',$userid,'user_registeredid',1,'user_status');
						if(isset($resultSet->user_id) && $resultSet->user_id!=""){
							$user_id = $resultSet->user_id;
							$user_encrpted_password = $resultSet->user_encrpted_password;
							if(isset($_POST['homepage']) && $_POST['homepage']=="adminreset"){
								$data = array(
									'user_encrpted_password' => md5($confirmpassword),
									'user_encodeed_password' => base64_encode($confirmpassword)
								);
								$resultSet = $this->Common_model->update('ma_users',$data,$user_id,'user_id');
								if($resultSet){
									if(isset($_POST['homepagee']) && $_POST['homepagee']=="resefreset"){
										$deletedStatus = $this->Common_model->delete_single_row('ma_forgotpasswordstokens',$user_id,'ftuserid');										
									}									
									echo json_encode(array('status'=>true,'output'=>'success'));exit;
								}else{
									echo json_encode(array('status'=>false,'output'=>'somethingwentwrong'));exit;
								}
							}else{
								if(md5($oldpassword)==$user_encrpted_password){
									$data = array(
										'user_encrpted_password' => md5($confirmpassword),
										'user_encodeed_password' => base64_encode($confirmpassword)
									);
									$resultSet = $this->Common_model->update('ma_users',$data,$user_id,'user_id');
									if($resultSet){
										echo json_encode(array('status'=>true,'output'=>'success'));exit;
									}else{
										echo json_encode(array('status'=>false,'output'=>'somethingwentwrong'));exit;
									}
								}else{
									echo json_encode(array('status'=>false,'output'=>'oldpwdconfpwd'));exit;
								}
							}							
						}else{
							echo json_encode(array('status'=>false,'output'=>'confirmpwdandnewpwdnotmatch'));exit;
						}
					}
				}else{
					echo json_encode(array('status'=>false,'output'=>'useridrequired'));exit;
				}
			}else if(isset($_SESSION['user_registeredid']) && $_SESSION['user_registeredid']!=""){
				if(isset($_POST['userid']) && $_POST['userid']!=""){
					$userid = $_POST['userid'];
					$oldpassword = $_POST['oldpassword'];
					$newpassword = $_POST['newpassword'];
					$confirmpassword = $_POST['confirmpassword'];
					if($newpassword!=$confirmpassword){
						echo json_encode(array('status'=>false,'output'=>'confirmpwdandnewpwdnotmatch'));exit;	
					}else{
						$resultSet = $this->Common_model->get_single_data_column('ma_users',$userid,'user_registeredid',1,'user_status');
						if(isset($resultSet->user_id) && $resultSet->user_id!=""){
							$user_id = $resultSet->user_id;
							$user_encrpted_password = $resultSet->user_encrpted_password;
							if(isset($_POST['homepage']) && $_POST['homepage']==""){
								$data = array(
									'user_encrpted_password' => md5($confirmpassword),
									'user_encodeed_password' => base64_encode($confirmpassword)
								);
								$resultSet = $this->Common_model->update('ma_users',$data,$user_id,'user_id');
								if($resultSet){
									echo json_encode(array('status'=>true,'output'=>'success'));exit;
								}else{
									echo json_encode(array('status'=>false,'output'=>'somethingwentwrong'));exit;
								}
							}else{
								if(md5($oldpassword)==$user_encrpted_password){
									$data = array(
										'user_encrpted_password' => md5($confirmpassword),
										'user_encodeed_password' => base64_encode($confirmpassword)
									);
									$resultSet = $this->Common_model->update('ma_users',$data,$user_id,'user_id');
									if($resultSet){
										echo json_encode(array('status'=>true,'output'=>'success'));exit;
									}else{
										echo json_encode(array('status'=>false,'output'=>'somethingwentwrong'));exit;
									}
								}else{
									echo json_encode(array('status'=>false,'output'=>'oldpwdconfpwd'));exit;
								}
							}							
						}else{
							echo json_encode(array('status'=>false,'output'=>'confirmpwdandnewpwdnotmatch'));exit;
						}
					}
				}else{
					echo json_encode(array('status'=>false,'output'=>'useridrequired'));exit;
				}
			}else{
				echo json_encode(array('status'=>false,'output'=>'loginisrequired'));exit;
			}
		}
		public function changePassword(){
			if(isset($_SESSION['user_registeredid']) && $_SESSION['user_registeredid']!=""){
				$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
				$this->front_view('changepassword');
			}else{
				redirect(base_url());				
			}			
		}
		public function forgotPassword(){
			// ini_set('display_errors', 1);
			// ini_set('display_startup_errors', 1);
			// error_reporting(E_ALL);
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$this->front_view('forgotpassword');
		}
		public function forgotSubmit(){
			if(isset($_POST['uemailphone']) && $_POST['uemailphone']!=""){
				$user_email = $_POST['uemailphone'];
				if(is_numeric($user_email)){
					$resultSet = $this->Common_model->get_single_data_column('ma_users',$user_email,'user_mobile',1,'user_status');
				}else if(filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
					$resultSet = $this->Common_model->get_single_data_column('ma_users',$user_email,'user_email',1,'user_status');
				}
				if(isset($resultSet->user_id) && $resultSet->user_id!=""){
					$token    = $this->getUniqueCode('10');					
					$u_uid             = $resultSet->user_id;
					$user_registeredid = $resultSet->user_registeredid;
					$user_display_name = $resultSet->user_display_name;					
					$this->load->helper(array('common'));
					$toemail   = $resultSet->user_email;
					$fromemail = GAMILACCOUNT;
					$subject   = "Password reset link from MatrimonyApp.";
					$uidToken = $token.'_'.$user_registeredid;
					$dataArray = array(
						'ftuserid' => $u_uid,
						'fttokenid' => $uidToken,
						'ftstatus' => 1,
						'ftcreatedat' => date('Y-m-d H:i:s'),
						'ftuodatedat' => date('Y-m-d H:i:s'),
					);
					$forgotinfo = $this->Common_model->get_single_data('ma_forgotpasswordstokens',$u_uid,'ftuserid');
					if(isset($forgotinfo->ftid) && $forgotinfo->ftid!=""){
						$ft_id = $forgotinfo->ftid;
						$updateToken = $this->Common_model->update('ma_forgotpasswordstokens',$dataArray,$ft_id,'ftid');
					}else{
						$updateToken = $this->Common_model->add('ma_forgotpasswordstokens',$dataArray);
					}
					$passwordLink = "<a target='_blank' href='".base_url()."resetpassword?resetuqid=".$uidToken."'>".base_url()."reset-password?resetuqid=".$uidToken."</a>";					
					$messgae  = "We have received a password reset request for your MatrimonyApp account.";
					$messgae .= "\n\n";
					$messgae .= "Click below to reset your password.";
					$messgae .= "\n\n";
					$messgae .= $passwordLink;
					$mailSentStatus = sendemailtoall($fromemail,$toemail,$subject,$messgae,$attachment="");
					$successmessage = 0;
					if($mailSentStatus==1){
						$successmessage = 1;
						echo json_encode(array('status'=>TRUE,'output'=>'success'));
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'mailnotsent'));
					}					
				}else{
					echo json_encode(array('status'=>FALSE,'output'=>"mobilemailnotrecords"));exit; 
				}			
			}else{
				echo json_encode(array('status'=>FALSE,'output'=>"emailormobileisrequired"));exit; 
			}
		}
		public function resetPassword(){
			$this->data['maserviceslist'] = $this->Common_model->get_data_status_without_delete_records('ma_servicemaster','servicemasterstatus',1,'servicemasterid','DESC');
			$data = array();
			$this->data['panlinkexpried'] = "linkexpired";
			if(isset($_GET['resetuqid']) && $_GET['resetuqid']!=""){
				$tokenid = $_GET['resetuqid'];
				$tokenUid = explode('_',$_GET['resetuqid']);
				if(sizeof($tokenUid)>0){
					$fttokenid = $tokenUid[0];
					$uid = $tokenUid[1];
					$userinfo = $this->Common_model->get_single_data('ma_users',$uid,'user_registeredid');
					// echo "<pre>";print_r($userinfo);
					if(isset($userinfo->user_id) && $userinfo->user_id!=""){
						$u_uid = $userinfo->user_id;
						$forgotinfo = $this->Common_model->get_single_data_multiple_columns('ma_forgotpasswordstokens',$u_uid,'ftuserid',1,'ftstatus',$tokenid,'fttokenid');
						// echo "<pre>";print_r($forgotinfo);exit;
						if(isset($forgotinfo->ftid) && $forgotinfo->ftid!=""){
							$this->data['panlinkexpried'] = "";
							$uid = $forgotinfo->ftuserid;
							$this->data['uid'] = $uid; 
							$this->data['user_encrpted_password'] = $userinfo->user_encrpted_password; 
							$this->data['user_registeredid'] = $userinfo->user_registeredid; 
							$this->front_view('resetpassword');
						}else{						
							$this->front_view('resetpassword');
						}
					}else{
						$this->front_view('resetpassword');
					}					
				}else{
					$this->front_view('resetpassword');
				}				
			}else{
				$this->front_view('resetpassword');
			}
		}
		public function loginsubmitprocess(){
			if(isset($_POST['loginthru']) && $_POST['loginthru']=="2"){
				if(isset($_POST['user_email']) && $_POST['user_email']!=""){
					if(isset($_POST['user_encrpted_password']) && $_POST['user_encrpted_password']!=""){	
						$user_email = $_POST['user_email'];
						$user_encrpted_password = $_POST['user_encrpted_password'];
						if(is_numeric($user_email)){
							$resultSet = $this->Common_model->get_single_data_multiple_columns('ma_family_members',$user_email,'profile_phone',1,'profile_status',md5($user_encrpted_password),'profile_password');
						}else if(filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
							$resultSet = $this->Common_model->get_single_data_multiple_columns('ma_family_members',$user_email,'profile_email',1,'profile_status',md5($user_encrpted_password),'profile_password');
						}
						if(isset($resultSet->fmid) && $resultSet->fmid!=""){
							$userid = $resultSet->fmid;
							$resultRow = $this->Common_model->get_single_data_column('ma_referal_codes',$userid,'rfuserid',1,'rfstatus');
							if(isset($resultRow->rfuqid) && $resultRow->rfuqid!=""){
								$_SESSION['referalcode']  = $resultRow->rfname;
							}else{
								$_SESSION['referalcode']  = "";
							}
							$_SESSION['user_registeredid']  = $resultSet->profile_registeredid;
							$_SESSION['userId']      = $resultSet->fmid;
							$_SESSION['userName']    = $resultSet->profile_fullname;
							$_SESSION['userEmail']   = $resultSet->profile_email;
							$_SESSION['userMobile']  = $resultSet->profile_phone;
							$_SESSION['userPlan']  	= '';
							$_SESSION['userGender']  = '';
							$_SESSION['loginwith']   = 'CommunityProtal';
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
			}else{
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
							$_SESSION['userPlan']  	= $resultSet->plan;
							// Save user date of birth
							$age = $this->db->query("select TIMESTAMPDIFF(YEAR, upi_dateofbirth, CURDATE()) AS age FROM `ma_user_personal_info` WHERE `upi_user_id` = ".$resultSet->user_id)->row();
							$_SESSION['userAge']  = $age->age;
							
							
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
		public function logoutactionsubmit(){
			session_start();
			session_destroy();
			redirect(base_url());
		}
		function getUniqueCode($length = "")
		{
			$code = md5(uniqid(rand(), true));
			if ($length != "")
			return substr($code, 0, $length);
			else
			return $code;
		}
		function random_strings($length_of_string) 
		{ 
			$str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
			return substr(str_shuffle($str_result), 0, $length_of_string); 
		}
		public function getAdminMemberAddittionalInfo(){
			$html="";
			if(isset($_POST['counter']) && $_POST['counter']!=""){
				$professionslist = $this->Common_model->get_data_status_without_delete_records('ma_professions','professionstatus',1,'professionid','ASC');
				$qualificationslist = $this->Common_model->get_data_status_without_delete_records('ma_qualification','status',1,'id','ASC');
				$bloodgroupsslist = $this->Common_model->get_data_status_without_delete_records('ma_bloodgroups','status',1,'id','ASC');
				$counter = $_POST['counter'];				
				$html.='<td class="" style="border:none">
               <div class="">						
						<label class="text-weight-bold">Member Details '.$counter.'</label>
						<div class="row">						
						<!-- Father Name Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="profile_partner_member_name[]" id="profile_partner_member_name_'.$counter.'" class="form-control animation rounded-2" placeholder="Member Name">
									<span id="error_profile_partner_member_name_'.$counter.'" style="color:red;"></span>
								</div>
							</div>
						<!-- Father Name Ends -->
						<!-- Qualification & Profession Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select name="profile_partner_realtion[]" id="profile_partner_realtion_'.$counter.'" class="custom-select form-control">
										<option value="">Relation With Head</option>
										<option value="wife">Wife</option>
										<option value="son">Son</option>
										<option value="daughter">Daughter</option>
									</select>
									<span id="error_profile_partner_realtion_'.$counter.'" style="color:red;"></span>
								</div>
							</div>
							
						<!-- Qualification & Profession Ends -->
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<input value="" type="text" name="profile_partner_mobile[]" id="profile_partner_mobile_'.$counter.'" class="form-control animation rounded-2" placeholder="Mobile">
								<span id="error_profile_partner_mobile_'.$counter.'" style="color:red;"></span>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<input value="" type="text" name="profile_partner_location[]" id="profile_partner_location_'.$counter.'" class="form-control animation rounded-2" placeholder="Location">
								<span id="error_profile_partner_location_'.$counter.'" style="color:red;"></span>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<select name="profile_partner_marital_status[]" id="profile_partner_marital_status_'.$counter.'" class="custom-select form-control">
											<option value="">Marital Status</option>
											<option value="single">Single</option>
											<option value="married">Married</option>
											<option value="divorce">Divorce</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<select name="profile_parnter_blood_group[]" id="profile_parnter_blood_group_'.$counter.'" class="custom-select form-control">
											<option value="">Blood Group</option>';
											foreach($bloodgroupsslist as $bgroups){
												$html.='<option value="'.$bgroups->bggroupuqid.'">'. ucfirst($bgroups->bggroup).'</option>';
											}
										$html.='</select>
										<span id="error_profile_parnter_blood_group_'.$counter.'" style="color:red;"></span>
									</div>
								</div>
							</div>
						</div>
						<!-- Qualification & Profession Starts -->
						<div class="col-md-6 col-sm-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<select name="profile_partner_qualification[]" id="profile_partner_qualification_'.$counter.'" class="custom-select form-control">
											<option value="">Qualification</option>';
											foreach($qualificationslist as $qualifications){
												$html.='<option value="'.$qualifications->qualificationuqid.'">'.ucfirst($qualifications->qualificationname).'</option>';
											}
										$html.='</select>
										<span id="error_profile_partner_qualification_'.$counter.'" style="color:red;"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<select name="profile_partner_profession[]" id="profile_partner_profession_'.$counter.'" class="custom-select form-control">
											<option value="">Profession</option>';
											foreach($professionslist as $professions){
												$html.='<option value="'.$professions->professiondisplayid.'">'.ucfirst($professions->professionname).'</option>';
											}
										$html.='</select>
										<span id="error_profile_partner_qualification_profession_'.$counter.'" style="color:red;"></span>
									</div>
								</div>
							</div>
						</div>
						<!-- Qualification & Profession Ends -->
						
						<!-- Date of Birth Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="text-weight-medium">Date of Birth</label>
									<div class="row">
										<div class="col-md-4 col-xs-5 col-sm-5" style="padding-right:0"><select required name="profile_partner_dob_date[]" id="profile_partner_dob_date_'.$counter.'" class="custom-select alt-1 form-control">';
											for($d=1;$d<=31;$d++){ 
												$dateDate = "";
												$datepadding = str_pad($d, 2, "0", STR_PAD_LEFT);
											
										$html.='<option value="'.$d.'">'.$datepadding.'</option>';
											}
										$html.='</select></div>
										<div class="col-md-4 col-xs-5 col-sm-5" style="padding:0"><select required name="profile_partner_dob_month[]" id="profile_partner_dob_month_'.$counter.'" class="custom-select alt-1 mx-2 form-control">';
											$formattedMonthArray = array(
												"01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr",
												"05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug",
												"09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec",
											);
											foreach($formattedMonthArray as $key=>$month) {
												$html.='<option value="'.$key.'">'.$month.'</option>';
											}										
										$html.='</select></div>
										<div class="col-md-4 col-xs-5 col-sm-5" style="padding-left:0"><select required name="profile_partner_dob_year[]" id="profile_partner_dob_year_'.$counter.'" class="custom-select alt-1 form-control">';
											$yearv = date('Y'); $laste20years = $yearv; 
											for($i=1980;$i<=$laste20years;$i++) { 
												$html.='<option value='.$i.'>'.$i.'</option>';
											} 
										$html.='</select>
									</div></div>
								</div>
							</div>
						<!-- Date of Birth Ends -->						
						</div>
					<!-- Fields Ends -->				
					</div>
				</td>';
			}			
			echo json_encode(array('status'=>TRUE,'htmlData'=>$html));exit; 
		}
	}
	?>