<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends MY_Controller {
    function __construct() {
		parent::__construct();
		$this->login_required();
		$this->load->model('admin/Settings_model');
		$this->load->model('admin/Common_model');
		$this->load->helper('url');
    }
	public function index()
	{
		$this->admin_view('settings');
	}

	function admin_settings(){
		if($this->input->get_post('submit')){
			if($this->input->get_post('password') !=''){
				$data1=array(
					'adminloginname'  => $this->input->get_post('username'),
					'adminpassword'   => md5($this->input->get_post('password')),
					'adminloginemail' => $this->input->get_post('email')
				);
			}else{
				$data1=array(
					'adminloginname'  => $this->input->get_post('username'),
					'adminloginemail' => $this->input->get_post('email')
				);
			}
			$id = $this->input->get_post('id');
			$result = $this->Common_model->update('ma_adminlogins',$data1,$id,'adminloginid');
			if($result){
				$_SESSION['username'] = $this->input->get_post('username');
				$_SESSION['email']    = $this->input->get_post('email');
				$this->session->set_flashdata('success_message', '"Admin settings updated successfully","Success"');
				redirect(base_url().'admin/settings/admin_settings');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'admin/settings/admin_settings');	
			}
		}
		$this->data['page_title']='Admin Settings';
		$this->data['page']='admin_setting';
		$this->data['details']=$this->Common_model->get_data('ma_adminlogins');
		$this->admin_view('admin_setting');
	}
	public function addcommunity(){
		if(isset($_POST['communityname']) && $_POST['communityname']!=""){
			$error = 1;
			if(isset($_FILES['communitywebimage']['name']) && $_FILES['communitywebimage']['name'] != ''){
				$communitywebimage = date('dmYHis').str_replace(" ", "", basename($_FILES['communitywebimage']['name']));
				$catimgg = './communitypics/'.$communitywebimage;
				if(move_uploaded_file($_FILES['communitywebimage']['tmp_name'],$catimgg)){
					$error = 1;
				}else{
					$error = 0;
				}
			}else if(isset($_POST['h_communitywebimage']) && $_POST['h_communitywebimage']!=""){
				$communitywebimage = $_POST['h_communitywebimage'];
			}			
			if(isset($_POST['communitytagline']) && $_POST['communitytagline']!=""){
				$communitytagline = $_POST['communitytagline'];
			}else{
				$communitytagline = NULL;
			}
			$communityname    = $_POST['communityname'];
			$error1 = 1;
			if(isset($_FILES['communitymobileimage']['name']) && $_FILES['communitymobileimage']['name'] != ''){
				$communitymobileimage = 'mob_'.date('dmYHis').str_replace(" ", "", basename($_FILES['communitymobileimage']['name']));
				$cmimage = './communitypics/'.$communitymobileimage;
				if(move_uploaded_file($_FILES['communitymobileimage']['tmp_name'],$cmimage)){
					$error1 = 1;
				}else{
					$error1 = 0;
				}			
			}else if(isset($_POST['h_communitymobileimage']) && $_POST['h_communitymobileimage']!=""){
				$communitymobileimage = $_POST['h_communitymobileimage'];
			}
			$communitydata = array(
				'communityname'        => $communityname,
				'communitytagline'     => $communitytagline,
				'communitywebimage'    => $communitywebimage,
				'communitymobileimage' => $communitymobileimage,
			);			
			$insertid = $this->Common_model->add('ma_community',$communitydata);
			if($insertid){	
				$communitydisplayid = 'COMMUNITY'.date('y').str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
				$communityudata = array(
					'communitydisplayid' => $communitydisplayid,
				);	
				$updatedstatus = $this->Common_model->update('ma_community',$communityudata,$insertid,'communityid');
				$this->session->set_flashdata('success_message', '"Community added successfully","Success"');
				redirect(base_url().'admin/settings/communities_list');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'admin/settings/addcommunity');
			}
		}else{
			$this->data['page_title']='Add Community';
			$this->data['page']='addcommunity';
			$this->admin_view('addcommunity');
		}		
	}
	public function editcommunity(){
		if(isset($_POST['communitydisplayid']) && $_POST['communitydisplayid']!=""){
			$communitydisplayid = $_POST['communitydisplayid'];
			$error = 1;
			if(isset($_FILES['communitywebimage']['name']) && $_FILES['communitywebimage']['name'] != ''){
				$communitywebimage = date('dmYHis').str_replace(" ", "", basename($_FILES['communitywebimage']['name']));
				$catimgg = './communitypics/'.$communitywebimage;
				if(move_uploaded_file($_FILES['communitywebimage']['tmp_name'],$catimgg)){
					$error = 1;
				}else{
					$error = 0;
				}
			}else if(isset($_POST['h_communitywebimage']) && $_POST['h_communitywebimage']!=""){
				$communitywebimage = $_POST['h_communitywebimage'];
			}			
			if(isset($_POST['communitytagline']) && $_POST['communitytagline']!=""){
				$communitytagline = $_POST['communitytagline'];
			}else{
				$communitytagline = NULL;
			}
			$communityname    = $_POST['communityname'];
			$error1 = 1;
			if(isset($_FILES['communitymobileimage']['name']) && $_FILES['communitymobileimage']['name'] != ''){
				$communitymobileimage = 'mob_'.date('dmYHis').str_replace(" ", "", basename($_FILES['communitymobileimage']['name']));
				$cmimage = './communitypics/'.$communitymobileimage;
				if(move_uploaded_file($_FILES['communitymobileimage']['tmp_name'],$cmimage)){
					$error1 = 1;
				}else{
					$error1 = 0;
				}			
			}else if(isset($_POST['h_communitymobileimage']) && $_POST['h_communitymobileimage']!=""){
				$communitymobileimage = $_POST['h_communitymobileimage'];
			}
			$communitydata = array(
				'communityname'        => $communityname,
				'communitytagline'     => $communitytagline,
				'communitywebimage'    => $communitywebimage,
				'communitymobileimage' => $communitymobileimage,
			);			
			$updatedstatus = $this->Common_model->update('ma_community',$communitydata,$communitydisplayid,'communitydisplayid');
			if($updatedstatus){	
				$this->session->set_flashdata('success_message','"Community Updated Successfully","Success"');
				redirect(base_url().'admin/settings/communitieslist');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'admin/settings/editcommunity?communityid='.$communitydisplayid);
			}
		}else{
			if(isset($_GET['communityid']) && $_GET['communityid']!=""){
				$communitydisplayid = $_GET['communityid'];
				$this->data['communitydetails']=$this->Common_model->get_single_data('ma_community',$communitydisplayid,'communitydisplayid');
				$this->data['page_title']='Edit Community';
				$this->data['page']='editcommunity';
				$this->admin_view('editcommunity');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'admin/settings/communitieslist');
			}			
		}		
	}
	public function communitieslist(){
		$this->data['macommunities']=$this->Common_model->get_data('ma_community');
		$this->data['page_title']='Communities List';
		$this->data['page']='communitieslist';
		$this->admin_view('communitieslist');
	}
	public function subcasteslist(){
		$this->data['masubcasteslist']=$this->Common_model->get_data_status('ma_community_subcastes','subcastestatus',2,'subcasteid','DESC');
		$this->data['page_title']='Sub Castes List';
		$this->data['page']='subcasteslist';
		$this->admin_view('subcasteslist');
	}
	public function addsubcaste(){
		$this->load->helper(array('common'));
		if(isset($_POST['subcastename']) && $_POST['subcastename']!=""){
			$subcastename = $_POST['subcastename'];
			$subcasteseourl = seo_friendly_url($subcastename);
			$communityid  = $_POST['communityid'];
			$getSubcasteData = $this->Common_model->get_single_data_multiple_columns('ma_community_subcastes',$subcastename,'subcastename','2','subcastestatus',$communityid,'communityid');
			if(isset($getSubcasteData->subcasteid) && $getSubcasteData->subcasteid!=""){
				$this->session->set_flashdata('error_message', '"Sub caste is already with us.","Failed!"');
				redirect(base_url().'admin/settings/addsubcaste');
			}else{
				$communitydata = array(
					'subcastename'   => ucfirst($subcastename),
					'subcasteseourl' => $subcasteseourl,
					'communityid'    => $communityid
				);			
				$insertid = $this->Common_model->add('ma_community_subcastes',$communitydata);
				if($insertid){	
					$subcastedisplayid = 'SUBCASTE'.date('y').str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
					$communityudata = array(
						'subcastedisplayid' => $subcastedisplayid,
					);	
					$updatedstatus = $this->Common_model->update('ma_community_subcastes',$communityudata,$insertid,'subcasteid');
					$this->session->set_flashdata('success_message', '"Subcaste added successfully","Success"');
					redirect(base_url().'admin/settings/subcasteslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/settings/addsubcaste');
				}
			}			
		}else{
			$this->data['page_title']='Add Subcaste';
			$this->data['page']='addsubcaste';
			$this->admin_view('addsubcaste');
		}		
	}
	public function editsubcaste(){
		$this->load->helper(array('common'));
		if(isset($_POST['subcastedisplayid']) && $_POST['subcastedisplayid']!=""){
			$subcastedisplayid = $_POST['subcastedisplayid'];
			$subcastename      = $_POST['subcastename'];
			$subcasteseourl    = seo_friendly_url($subcastename);
			$communityid       = $_POST['communityid'];
			$getSubcasteData   = $this->Common_model->get_single_data_multiple_columns('ma_community_subcastes',$subcastename,'subcastename','2','subcastestatus',$communityid,'communityid');
			if(isset($getSubcasteData->subcasteid) && $getSubcasteData->subcasteid!=""){
				$csubcastedisplayid = $getSubcasteData->subcastedisplayid;
				if($csubcastedisplayid==$subcastedisplayid){
					$communitydata = array(
						'subcastename'        => $subcastename,
						'subcasteseourl'      => $subcasteseourl,
						'communityid'         => $communityid,
						'subcasteupdatedat'   => date('Y-m-d H:i:s')
					);		
					$updatedstatus = $this->Common_model->update('ma_community_subcastes',$communitydata,$subcastedisplayid,'subcastedisplayid');
					if($updatedstatus){	
						$this->session->set_flashdata('success_message', '"Subcaste updated successfully","Success"');
						redirect(base_url().'admin/settings/subcasteslist');
					}else{
						$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
						redirect(base_url().'admin/settings/editsubcaste?subcasteid='.$subcastedisplayid);
					}	
				}else{
					$this->session->set_flashdata('error_message', '"Sub caste is already with us.","Failed!"');
					redirect(base_url().'admin/settings/editsubcaste?subcasteid='.$subcastedisplayid);
				}				
			}else{
				$communitydata = array(
					'subcastename'        => $subcastename,
					'subcasteseourl'      => $subcasteseourl,
					'communityid'         => $communityid,
					'subcasteupdatedat'   => date('Y-m-d H:i:s')
				);		
				$updatedstatus = $this->Common_model->update('ma_community_subcastes',$communitydata,$subcastedisplayid,'subcastedisplayid');
				if($updatedstatus){	
					$this->session->set_flashdata('success_message', '"Subcaste updated successfully","Success"');
					redirect(base_url().'admin/settings/subcasteslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/settings/editsubcaste?subcasteid='.$subcastedisplayid);
				}
			}
		}else{
			if(isset($_GET['subcasteid']) && $_GET['subcasteid']!=""){
				$subcastedisplayid = $_GET['subcasteid'];
				$this->data['subcastedetails']=$this->Common_model->get_single_data('ma_community_subcastes',$subcastedisplayid,'subcastedisplayid');
				$this->data['page_title']='Edit Subcaste';
				$this->data['page']='editsubcaste';
				$this->admin_view('editsubcaste');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'admin/settings/communitieslist');
			}		
		}		
	}
	public function status_actions($tablename,$id,$auditcoulmnname,$type,$coulmnname,$deletedcolumn=""){
		if($id){
			$subcastedata = array(
				$coulmnname => $type,
			);
			if($deletedcolumn!=""){
				$subcastedata[$deletedcolumn] = date('Y-m-d H:i:s');
			}
			$result = $this->Common_model->update_status_actions($tablename,$subcastedata,$id,$auditcoulmnname);
			if($result){
				$this->session->set_flashdata('success_message','"Status Changed Successfully","Success"');
				echo '<script>window.history.go(-1)</script>';
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				echo '<script>window.history.go(-1)</script>';
			}
		}else{
			$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
			echo '<script>window.history.go(-1)</script>';
		}		
	}
	
	public function professionslist(){
		$this->data['maprofessionslist']=$this->Common_model->get_data_status('ma_professions','professionstatus',2,'professionid','DESC');
		$this->data['page_title']='Professions List';
		$this->data['page']='professionslist';
		$this->admin_view('professionslist');
	}
	public function addprofession(){
		$this->load->helper(array('common'));
		if(isset($_POST['professionname']) && $_POST['professionname']!=""){
			$professionname = $_POST['professionname'];
			$checkprofessionname = seo_friendly_url($professionname);
			$getProfessionData = $this->Common_model->get_single_data_column('ma_professions',$professionname,'professionname','2','professionstatus');
			if(isset($getProfessionData->professionid) && $getProfessionData->professionid!=""){
				$this->session->set_flashdata('error_message', '"Sub caste is already with us.","Failed!"');
				redirect(base_url().'admin/settings/addprofession');
			}else{
				$communitydata = array(
					'professionname' => ucfirst($professionname),
				);			
				$insertid = $this->Common_model->add('ma_professions',$communitydata);
				if($insertid){	
					$professiondisplayid = 'PROFESSION'.date('y').str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
					$communityudata = array(
						'professiondisplayid' => $professiondisplayid,
					);	
					$updatedstatus = $this->Common_model->update('ma_professions',$communityudata,$insertid,'professionid');
					$this->session->set_flashdata('success_message', '"Profession added successfully","Success"');
					redirect(base_url().'admin/settings/professionslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/settings/addprofession');
				}
			}			
		}else{
			$this->data['page_title']='Add Profession';
			$this->data['page']='addprofession';
			$this->admin_view('addprofession');
		}		
	}
	public function editprofession(){
		if(isset($_POST['professionid']) && $_POST['professionid']!=""){
			$professiondisplayid = $_POST['professionid'];
			$professionname = $_POST['professionname'];
			$getProfessionData = $this->Common_model->get_single_data_column('ma_professions',$professionname,'professionname','2','professionstatus');
			if(isset($getProfessionData->professionid) && $getProfessionData->professionid!=""){
				$cprofessiondisplayid = $getProfessionData->professiondisplayid;
				if($cprofessiondisplayid==$professiondisplayid){
					$communitydata = array(
						'professionname'      => $professionname,
						'professionupdatedat' => date('Y-m-d H:i:s'),
					);		
					$updatedstatus = $this->Common_model->update('ma_professions',$communitydata,$professiondisplayid,'professiondisplayid');
					if($updatedstatus){	
						$this->session->set_flashdata('success_message', '"Profession updated successfully","Success"');
						redirect(base_url().'admin/settings/professionslist');
					}else{
						$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
						redirect(base_url().'admin/settings/editprofession?professionid='.$professiondisplayid);
					}	
				}else{
					$this->session->set_flashdata('error_message', '"Sub caste is already with us.","Failed!"');
					redirect(base_url().'admin/settings/editprofession?professionid='.$professiondisplayid);
				}				
			}else{
				$communitydata = array(
					'professionname'      => $professionname,
					'professionupdatedat' => date('Y-m-d H:i:s'),
				);		
				$updatedstatus = $this->Common_model->update('ma_professions',$communitydata,$professiondisplayid,'professiondisplayid');
				if($updatedstatus){	
					$this->session->set_flashdata('success_message', '"Profession updated successfully","Success"');
					redirect(base_url().'admin/settings/professionslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/settings/editprofession?professionid='.$professiondisplayid);
				}
			}
		}else{
			if(isset($_GET['professionid']) && $_GET['professionid']!=""){
				$professiondisplayid = $_GET['professionid'];
				$this->data['professiondetails']=$this->Common_model->get_single_data('ma_professions',$professiondisplayid,'professiondisplayid');
				$this->data['page_title']='Edit Profession';
				$this->data['page']='editprofession';
				$this->admin_view('editprofession');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'admin/settings/professionslist');
			}		
		}		
	}
	public function successstorieslist(){
		$this->data['masslist']=$this->Common_model->get_data_status('ma_success_stories','ssstatus',2,'ssid','DESC');
		$this->data['page_title']='Success Stories List';
		$this->data['page']='successstorieslist';
		$this->admin_view('successstorieslist');
	}
	public function addsuccessstory(){
		$this->load->helper(array('common'));
		if(isset($_POST['ssname']) && $_POST['ssname']!=""){
			$ssname = $_POST['ssname'];
			$sstext = $_POST['sstext'];
			$checkprofessionname = seo_friendly_url($ssname);		
			$communitydata = array(
				'ssname' => ucfirst($ssname),
				'sstext' => ucfirst($sstext),
			);			
			$insertid = $this->Common_model->add('ma_success_stories',$communitydata);
			if($insertid){	
				$ssdisplayid = 'SS'.date('y').str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
				$communityudata = array(
					'ssdisplayid' => $ssdisplayid,
				);	
				$updatedstatus = $this->Common_model->update('ma_success_stories',$communityudata,$insertid,'ssid');
				$this->session->set_flashdata('success_message', '"Profession added successfully","Success"');
				redirect(base_url().'admin/settings/successstorieslist');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'admin/settings/addsuccessstory');
			}
		}else{
			$this->data['page_title']='Add Success Story';
			$this->data['page']='addsuccessstory';
			$this->admin_view('addsuccessstory');
		}		
	}
	public function editsuccessstory(){
		if(isset($_POST['ssdisplayid']) && $_POST['ssdisplayid']!=""){
			$ssdisplayid = $_POST['ssdisplayid'];
			$ssname = $_POST['ssname'];
			$sstext = $_POST['sstext'];			
			$communitydata = array(
				'ssname' => $ssname,
				'sstext' => $sstext,
				'ssupdatedat' => date('Y-m-d H:i:s'),
			);		
			$updatedstatus = $this->Common_model->update('ma_success_stories',$communitydata,$ssdisplayid,'ssdisplayid');
			if($updatedstatus){	
				$this->session->set_flashdata('success_message', '"Profession updated successfully","Success"');
				redirect(base_url().'admin/settings/successstorieslist');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'admin/settings/editsuccessstory?ssid='.$ssdisplayid);
			}			
		}else{
			if(isset($_GET['ssid']) && $_GET['ssid']!=""){
				$ssdisplayid = $_GET['ssid'];
				$this->data['ssdetails']=$this->Common_model->get_single_data('ma_success_stories',$ssdisplayid,'ssdisplayid');
				$this->data['page_title']='Edit Success Story';
				$this->data['page']='editsuccessstory';
				$this->admin_view('editsuccessstory');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'admin/settings/successstorieslist');
			}		
		}		
	}
	public function starslist(){
		$this->data['mastars']=$this->Common_model->get_data('ma_stars');
		$this->data['page_title']='Stars List';
		$this->data['page']='starslist';
		$this->admin_view('starslist');
	}
	public function raasilist(){
		$this->data['maraasi']=$this->Common_model->get_data('ma_raasi');
		$this->data['page_title']='Raasi List';
		$this->data['page']='raasilist';
		$this->admin_view('raasilist');
	}
	
	public function areaslist(){
		$this->data['areaslist']=$this->Common_model->get_data_status('ma_areas','areastatus',2,'areaid','DESC');
		$this->data['page_title']='Area List';
		$this->data['page']='areaslist';
		$this->admin_view('areaslist');
	}
	public function addarea(){
		$this->load->helper(array('common'));
		if(isset($_POST['areaname']) && $_POST['areaname']!=""){
			$areaname = $_POST['areaname'];
			$getAreaData = $this->Common_model->get_single_data_column('ma_areas',$areaname,'areaname','2','areastatus');
			if(isset($getAreaData->areaid) && $getAreaData->areaid!=""){
				$this->session->set_flashdata('error_message', '"Area is already with us.","Failed!"');
				redirect(base_url().'admin/settings/addarea');
			}else{
				$communitydata = array(
					'areaname'   => ucfirst($areaname),
				);			
				$insertid = $this->Common_model->add('ma_areas',$communitydata);
				if($insertid){	
					$areadisplayid = 'AREA'.date('y').str_pad((int)$insertid, 2, "0", STR_PAD_LEFT);
					$areaudata = array(
						'areadisplayid' => $areadisplayid,
					);	
					$updatedstatus = $this->Common_model->update('ma_areas',$areaudata,$insertid,'areaid');
					$this->session->set_flashdata('success_message', '"Area added successfully","Success"');
					redirect(base_url().'admin/settings/areaslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/settings/addarea');
				}
			}			
		}else{
			$this->data['page_title']='Add Area';
			$this->data['page']='addarea';
			$this->admin_view('addarea');
		}		
	}
	public function editarea(){
		$this->load->helper(array('common'));
		if(isset($_POST['areadisplayid']) && $_POST['areadisplayid']!=""){
			$areadisplayid = $_POST['areadisplayid'];
			$areaname      = $_POST['areaname'];
			$getAreaData   = $this->Common_model->get_single_data_column('ma_areas',$areaname,'areaname','2','areastatus');
			if(isset($getAreaData->areaid) && $getAreaData->areaid!=""){
				$careadisplayid = $getAreaData->areadisplayid;
				if($careadisplayid==$areadisplayid){
					$communitydata = array(
						'areaname'        => $areaname,
						'areaupdatedat'   => date('Y-m-d H:i:s')
					);		
					$updatedstatus = $this->Common_model->update('ma_areas',$communitydata,$areadisplayid,'areadisplayid');
					if($updatedstatus){	
						$this->session->set_flashdata('success_message', '"Area updated successfully","Success"');
						redirect(base_url().'admin/settings/areaslist');
					}else{
						$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
						redirect(base_url().'admin/settings/editarea?areaid='.$areadisplayid);
					}	
				}else{
					$this->session->set_flashdata('error_message', '"Sub caste is already with us.","Failed!"');
					redirect(base_url().'admin/settings/editarea?areaid='.$areadisplayid);
				}				
			}else{
				$communitydata = array(
					'areaname'        => $areaname,
					'areaupdatedat'   => date('Y-m-d H:i:s')
				);		
				$updatedstatus = $this->Common_model->update('ma_areas',$communitydata,$areadisplayid,'areadisplayid');
				if($updatedstatus){	
					$this->session->set_flashdata('success_message', '"Area updated successfully","Success"');
					redirect(base_url().'admin/settings/areaslist');
				}else{
					$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
					redirect(base_url().'admin/settings/editarea?areaid='.$areadisplayid);
				}
			}
		}else{
			if(isset($_GET['areaid']) && $_GET['areaid']!=""){
				$areadisplayid = $_GET['areaid'];
				$this->data['areadetails']=$this->Common_model->get_single_data('ma_areas',$areadisplayid,'areadisplayid');
				$this->data['page_title']='Edit Area';
				$this->data['page']='editarea';
				$this->admin_view('editarea');
			}else{
				$this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
				redirect(base_url().'admin/settings/areaslist');
			}		
		}		
	}
	
	
}


