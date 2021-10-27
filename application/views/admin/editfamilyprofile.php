<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
	.avoid-clicks { pointer-events: none; }
</style>
<div class="row  border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?=$page_title;?></h2>
        <ol class="breadcrumb"> 
            <li>
                <a href="<?=base_url();?>/admin/familymembers">Family Information</a>
            </li>
            <li class="active">
                <strong><?=$page_title;?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?=$page_title;?></h5>
                    <a class="btn btn-primary btn-sm pull-right" href="#" type="button" style="margin-top: -5px;" onclick="window.history.go(-1)"><i class="fa fa-angle-double-left"></i> Back</a>
                </div>
            </div>
			<div class="box-body mandatory_color">						
					<div class="">
		<!-- Profile Form Starts -->
			<?php // echo "<pre>";print_r($userinfo);exit; ?>
			<form method="POST" class="profile-form" id="family_member" name="family_member" >
			<!-- Nested Row Starts -->
				<div class="row" style=>
				<!-- Personal Details Starts -->
					<div class="col-lg-6 col-sm-12">
						<input type="hidden" id="fmid" name="fmid" value="value="<?php if(isset($userinfo->fmid) && $userinfo->fmid!=""){ echo $userinfo->fmid; } ?>"">
						<div class="row">
						<!-- Fullname Starts -->
							<div class="col-md-12">
								<div class="form-group">								
									<label class="text-weight-medium">Head of the Family Members</label>
					<input type="text" name="profile_fullname" id="profile_fullname" class="form-control animation rounded-2" placeholder="Full Name" value="<?php if(isset($userinfo->profile_fullname) && $userinfo->profile_fullname!=""){ echo $userinfo->profile_fullname; } ?>">
									<span id="error_profile_fullname" style="color:red"></span>
								</div>
							</div>
						<!-- Fullname Ends -->
						<!-- Middle Name Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="profile_middlename" id="profile_middlename" class="form-control animation rounded-2" placeholder="Middle Name" value="<?php if(isset($userinfo->profile_middlename) && $userinfo->profile_middlename!=""){ echo $userinfo->profile_middlename; } ?>">
									<span id="error_profile_middlename" style="color:red"></span>
								</div>
							</div>
						<!-- Middle Name Ends -->
						<!-- Surname Name Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
								<input type="text" name="profile_surname" id="profile_surname" class="form-control animation rounded-2" placeholder="Surname" value="<?php if(isset($userinfo->profile_surname) && $userinfo->profile_surname!=""){ echo $userinfo->profile_surname; } ?>">
								<span id="error_profile_surname" style="color:red"></span>
								</div>
							</div>
						<!-- Surname Name Ends -->
						<!-- Father Name Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="profile_fathername" id="profile_fathername" class="form-control animation rounded-2" placeholder="Father Name" value="<?php if(isset($userinfo->profile_fathername) && $userinfo->profile_fathername!=""){ echo $userinfo->profile_fathername; } ?>">
									<span id="error_profile_fathername" style="color:red;"></span>
								</div>
							</div>
						<!-- Father Name Ends -->
						<!-- Mother Name Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="profile_mothername" id="profile_mothername" class="form-control animation rounded-2" placeholder="Mother Name" value="<?php if(isset($userinfo->profile_mothername) && $userinfo->profile_mothername!=""){ echo $userinfo->profile_mothername; } ?>">
									<span id="error_profile_mothername" style="color:red;"></span>
								</div>
							</div>
						<!-- Mother Name Ends -->
						<!-- Sub Caste Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select name="profile_occupation" id="profile_occupation" class="custom-select form-control">
										<option value="">Professions</option>
										<?php foreach($professionslist as $professions){
											$selected = "";
											if(isset($userinfo->profile_occupation) && $userinfo->profile_occupation!=""){
												if($userinfo->profile_occupation==$professions->professiondisplayid){
													$selected = "selected";
												}
											}										
										?>
											<option <?php echo $selected; ?> value="<?php echo $professions->professiondisplayid; ?>"><?php echo ucfirst($professions->professionname); ?></option>
										<?php }	?>
									</select>
									<span id="error_profile_occupation" style="color:red;"></span>
								</div>
							</div>
						<!-- Sub Caste Ends -->
						
						
						<!-- Gothram Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="profile_gothram" id="profile_gothram" class="form-control animation rounded-2" placeholder="Gothram" value="<?php if(isset($userinfo->profile_gothram) && $userinfo->profile_gothram!=""){ echo $userinfo->profile_gothram; } ?>">
									<span id="error_profile_gothram" style="color:red;"></span>
								</div>
							</div>
						<!-- Gothram Ends -->					
						<!-- Marital Status Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select name="profile_marital_status" id="profile_marital_status" class="custom-select form-control">
										<?php 					
											$sSelected = "";$mSelected = "";$mmSelected = "";$dSelected = "";
											if(isset($userinfo->profile_marital_status) && $userinfo->profile_marital_status!=""){ 
												if($userinfo->profile_marital_status=='single'){
													$sSelected ="selected";
												}else if($userinfo->profile_marital_status=='married'){
													$mSelected ="selected";
												}else if($userinfo->profile_marital_status=='divorce'){
													$dSelected ="selected";
												}
											} 
										?>
										<option <?php echo $mmSelected; ?> value="">Marital Status</option>
										<option <?php echo $sSelected; ?> value="single">Single</option>
										<option <?php echo $mSelected; ?> value="married">Married</option>
										<option <?php echo $dSelected; ?> value="divorce">Divorce</option>
									</select>
									<span id="error_profile_marital_status" style="color:red;"></span>
								</div>
							</div>
						<!-- Marital Status Ends -->
							
						
						<!-- NRI Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="profile_nri" id="profile_nri" class="form-control animation rounded-2" placeholder="NRI Living Country Name" value="<?php if(isset($userinfo->profile_nri) && $userinfo->profile_nri!=""){ echo $userinfo->profile_nri; } ?>">
									<span id="error_profile_nri" style="color:red;"></span>
								</div>
							</div>
						<!-- NRI Ends -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select name="profile_qualification" id="profile_qualification" class="custom-select form-control">
										<option value="">Qualification</option>
										<?php foreach($qualificationslist as $qualifications){ ?>
											<?php 		
												$sSelected = "";
												if(isset($userinfo->profile_qualification) && $userinfo->profile_qualification!=""){ 													
													if($userinfo->profile_qualification==$qualifications->qualificationuqid){
														$sSelected ="selected";
													}
												} 
											?>										
											<option <?php echo $sSelected; ?> value="<?php echo $qualifications->qualificationuqid; ?>"><?php echo ucfirst($qualifications->qualificationname); ?></option>
										<?php }	?>
									</select>
									<span id="error_profile_qualification" style="color:red;"></span>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select name="profile_blood_group" id="profile_blood_group" class="custom-select form-control">
										<option value="">Blood Group</option>
										<?php foreach($bloodgroupsslist as $bgroups){ ?>
										<?php 	
											$sSelected = "";
											if(isset($userinfo->profile_blood_group) && $userinfo->profile_blood_group!=""){ 
												if($userinfo->profile_blood_group==$bgroups->bggroupuqid){
													$sSelected ="selected";
												}
											} 
										?>	
										
											<option <?php echo $sSelected; ?> value="<?php echo $bgroups->bggroupuqid; ?>"><?php echo ucfirst($bgroups->bggroup); ?></option>
										<?php }	?>
									</select>
									<span id="error_profile_blood_group" style="color:red;"></span>
								</div>
							</div>
						<!-- Date of Birth Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="text-weight-medium">Community</label>
									<div class="d-flex justify-content-between">
										<div class="form-check">
											<?php 	
												$kSelected = "";$srSelected = "";
												if(isset($userinfo->profile_community_status) && $userinfo->profile_community_status!=""){ 
													if($userinfo->profile_community_status=='konda'){
														$kSelected ="selected";
													}else if($userinfo->profile_community_status=='siri'){
														$srSelected ="selected";
													}
												} 
											?>	
											<input <?php echo $kSelected; ?> value="konda" checked class="form-check-input clsregisterthru" type="radio" id="profile_community_status1" name="profile_community_status">
											<label class="form-check-label" for="disabledFieldsetCheck">Konda</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input <?php echo $srSelected; ?> value="siri" class="form-check-input clsregisterthru" type="radio" id="profile_community_status2" name="profile_community_status">
											<label class="form-check-label" for="disabledFieldsetCheck">Siri</label>
										</div>
										<span id="error_profile_community_status" style="color:red;"></span>
									</div>
								</div>
							</div>
						<!-- Date of Birth Ends -->
							<?php 
								$ddyear ="";$ddmonth ="";$dddate ="";
								if(isset($userinfo->profile_dob) && $userinfo->profile_dob!=""){ 
									$explodedData = explode('-',$userinfo->profile_dob);
									$ddyear  = $explodedData[0];
									$ddmonth = $explodedData[1];
									$dddate  = $explodedData[2];
								}
							?>
						<!-- Date of Birth Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="text-weight-medium">Date of Birth</label>
									<div class="row">
										<div class="col-md-4 col-xs-4 col-sm-4" style="padding-right:0">
											<select required name="profile_dob_date" id="profile_dob_date" class="custom-select alt-1 form-control ">
												<?php for($d=1;$d<=31;$d++){ 
													$datepadding = str_pad($d, 2, "0", STR_PAD_LEFT);
													$ds = "";
													if($d==$dddate){
														$ds = 'selected';
													}
												?>
												 <option <?php echo $ds; ?> value="<?php echo $d; ?>"><?php echo $datepadding; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-3 col-xs-4 col-sm-4" style="padding:0">
										<select style="padding:6px" required name="profile_dob_month" id="profile_dob_month" class="custom-select alt-1 mx-2 form-control">
										<?php 
											$formattedMonthArray = array(
												"01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr",
												"05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug",
												"09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec",
											);
										?>
										<?php
											foreach($formattedMonthArray as $key=>$month) {
												$ms = "";
												if($key==$ddmonth){
													$ms = 'selected';
												}												
												echo '<option "'.$ms.'" value="'.$key.'">'.$month.'</option>';
											}
										?>
										</select>
										</div>
										<div class="col-md-5 col-xs-5 col-sm-5" style="padding-left:0">
										<select required name="profile_dob_year" id="profile_dob_year" class="custom-select alt-1 form-control">
											<?php $yearv = date('Y'); $laste20years = $yearv; 
											for($i=1980;$i<=$laste20years;$i++) { 
											
												$ys = "";
												if($i==$ddyear){
													$ys = 'selected';
												}
											
											?>
												<option <?php echo $ys; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php } ?>
										</select>
									</div>
									</div>
								</div>
							</div>
						<!-- Date of Birth Ends -->
						</div>
					<!-- Fields Ends -->
					</div>
				<!-- Personal Details Ends -->
				<!-- Education & Communication Details Starts -->
					<div class="col-lg-6 col-sm-12">										
					<!-- Heading Starts -->
						<h4 class="my-4 text-weight-semi-bold text-color-brand">Communcation Details</h4>
					<!-- Heading Ends -->
					<!-- Fields Starts -->
						<div class="row">
						<!-- Native District Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="profile_native_district" id="profile_native_district" class="form-control animation rounded-2" placeholder="Native District" value="<?php if(isset($userinfo->profile_native_district) && $userinfo->profile_native_district!=""){ echo $userinfo->profile_native_district; } ?>">
									<span id="error_profile_native_district" style="color:red;"></span>
								</div>
							</div>
						<!-- Native District Ends -->
						<!-- Residence Type Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select name="profile_residence_type" id="profile_residence_type" class="custom-select form-control">
										<?php 	
											$ownSelected = "";$rentSelected = "";$noSelected = "";
											if(isset($userinfo->profile_residence_type) && $userinfo->profile_residence_type!=""){ 
												if($userinfo->profile_residence_type=='own'){
													$ownSelected ="selected";
												}else if($userinfo->profile_residence_type=='rent'){
													$rentSelected ="selected";
												}
											} 
										?>
									
										<option <?php echo $noSelected; ?> value="">Residence Type</option>
										<option <?php echo $ownSelected; ?> value="own">Own</option>
										<option <?php echo $rentSelected; ?> value="rent">Rent</option>
									</select>
									<span id="error_profile_residence_type" style="color:red;"></span>
								</div>
							</div>
						<!-- Residence Type Ends -->
						
						<!-- Present Address Starts -->
							<div class="col-sm-6">
								<label class="text-weight-medium">Present Address</label>
								<div class="form-group">
									<input type="text" class="form-control animation rounded-2" name="profile_house_no" id="profile_house_no" placeholder="House No" value="<?php if(isset($userinfo->profile_house_no) && $userinfo->profile_house_no!=""){ echo $userinfo->profile_house_no; } ?>">
									<span id="error_profile_house_no" style="color:red;"></span>
								</div>
							</div>
						<!-- Present Address Ends -->						
						<!-- Present Address Starts -->
							<div class="col-sm-6">
								<div class="form-group">
									<label class="text-weight-medium">&nbsp;&nbsp;</label>
									<input type="text" class="form-control animation rounded-2" name="profile_plot_no" id="profile_plot_no" placeholder="Plot No" value="<?php if(isset($userinfo->profile_plot_no) && $userinfo->profile_plot_no!=""){ echo $userinfo->profile_plot_no; } ?>">
									<span id="error_profile_plot_no" style="color:red;"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control animation rounded-2" name="profile_street_no" id="profile_street_no" placeholder="Street No" value="<?php if(isset($userinfo->profile_street_no) && $userinfo->profile_street_no!=""){ echo $userinfo->profile_street_no; } ?>">
									<span id="error_profile_street_no" style="color:red;"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control animation rounded-2" name="profile_land_mark" id="profile_land_mark" placeholder="Landmark" value="<?php if(isset($userinfo->profile_land_mark) && $userinfo->profile_land_mark!=""){ echo $userinfo->profile_land_mark; } ?>">
									<span id="error_profile_land_mark" style="color:red;"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control animation rounded-2" name="profile_area" id="profile_area" placeholder="Area" value="<?php if(isset($userinfo->profile_area) && $userinfo->profile_area!=""){ echo $userinfo->profile_area; } ?>">
									<span id="error_profile_area" style="color:red;"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control animation rounded-2" name="profile_mandal" id="profile_mandal" placeholder="Mandal" value="<?php if(isset($userinfo->profile_mandal) && $userinfo->profile_mandal!=""){ echo $userinfo->profile_mandal; } ?>">
									<span id="error_profile_mandal" style="color:red;"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control animation rounded-2" name="profile_district" id="profile_district" placeholder="District" value="<?php if(isset($userinfo->profile_district) && $userinfo->profile_district!=""){ echo $userinfo->profile_district; } ?>">
									<span id="error_profile_district" style="color:red;"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control animation rounded-2" name="profile_state" id="profile_state" placeholder="State" value="<?php if(isset($userinfo->profile_state) && $userinfo->profile_state!=""){ echo $userinfo->profile_state; } ?>">
									<span id="error_profile_state" style="color:red;"></span>
								</div>
							</div>
						<!-- Present Address Ends -->
						<!-- Phone Number Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="hidden" name="profile_phone" id="profile_phone" value="<?php if(isset($userinfo->profile_phone) && $userinfo->profile_phone!=""){ echo $userinfo->profile_phone; } ?>">
									<input type="number" name="hid_profile_phone" id="hid_profile_phone" class="form-control animation rounded-2" placeholder="Phone Number" value="<?php if(isset($userinfo->profile_phone) && $userinfo->profile_phone!=""){ echo $userinfo->profile_phone; } ?>" <?php if(isset($userinfo->profile_phone) && $userinfo->profile_phone!=""){ echo 'disabled'; } ?>>
									<span id="error_profile_phone" style="color:red;"></span>
								</div>
							</div>
						<!-- Phone Number Ends -->
						<!-- Email Address Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="hidden" name="profile_email" id="profile_email" value="<?php if(isset($userinfo->profile_email) && $userinfo->profile_email!=""){ echo $userinfo->profile_email; } ?>">
									<input type="email" name="hid_profile_email" id="hid_profile_email" class="form-control animation rounded-2" placeholder="Email Address" value="<?php if(isset($userinfo->profile_email) && $userinfo->profile_email!=""){ echo $userinfo->profile_email; } ?>" <?php if(isset($userinfo->profile_email) && $userinfo->profile_email!=""){ echo 'disabled'; } ?>>
									<span id="error_profile_email" style="color:red;"></span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<select onChange="getLocationArea();" name="profile_location_area" id="profile_location_area" class="custom-select form-control">
										<?php foreach($citieslist as $cities){ 
											$cselected="";
											if(isset($userinfo->profile_location_area) && $userinfo->profile_location_area!=""){ 
												if($userinfo->profile_location_area==$cities->cityuqid){
													$cselected="selected";
												}											
											}
										?>
											<option <?php echo $cselected; ?> value="<?php echo $cities->cityuqid; ?>"><?php echo ucfirst($cities->cityname); ?></option>
										<?php }	?>
									</select>
									<span id="error_profile_location_area" style="color:red;"></span>
								</div>
							</div>
						<input value="<?php if(isset($userinfo->profile_location_area_name) && $userinfo->profile_location_area_name!=""){ echo $userinfo->profile_location_area_name; }else{ echo "Adilabad"; } ?>" type="hidden" name="profile_location_area_name" id="profile_location_area_name" >
						<!-- Email Address Ends -->
						</div>
					<!-- Fields Ends -->	
					</div>
				<!-- Education & Communication Details Ends -->
				
				<!-- Family Details Starts -->
					<div class="col-lg-12 col-sm-12">
					<!-- Heading Starts -->
						<h4 class="my-4 text-weight-semi-bold text-color-brand">Family Members Data</h4>
					<table id="myTable" class=" table order-list" style="border:none">
 
    <tbody>
		<?php if(isset($boomrelations) && count($boomrelations)>0){ $kp=1; foreach($boomrelations as $relationinfo){ ?>
			<tr style="border:none">
				<td class="" style="border:none">
				   <div class="">						
						<label class="text-weight-bold">Member Details</label>
						<div class="row">						
						<!-- Father Name Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input value="<?php echo $relationinfo->profile_partner_member_name;?>" type="text" name="profile_partner_member_name[]" id="profile_partner_member_name_<?php echo $kp; ?>" class="form-control animation rounded-2" placeholder="Member Name">
									<span id="error_profile_partner_member_name_<?php echo $kp; ?>" style="color:red;"></span>
								</div>
							</div>
						<!-- Father Name Ends -->
						<!-- Qualification & Profession Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select name="profile_partner_realtion[]" id="profile_partner_realtion_<?php echo $kp; ?>" class="custom-select form-control">
										<?php $profile_partner_realtion = $relationinfo->profile_partner_realtion; 
											$sele=""; $sele1="";$sele2="";$sele3="";
											if($profile_partner_realtion=='wife'){
												$sele1="selected";
											}else if($profile_partner_realtion=='son'){
												$sele2="selected";
											}else if($profile_partner_realtion=='daughter'){
												$sele3="selected";
											}else{
												$sele="selected";
											}
										?>
										<option <?php echo $sele; ?> value="">Relation With Head</option>
										<option <?php echo $sele1; ?> value="wife">Wife</option>
										<option <?php echo $sele2; ?> value="son">Son</option>
										<option <?php echo $sele3; ?> value="daughter">Daughter</option>
									</select>
									<span id="error_profile_partner_realtion_<?php echo $kp; ?>" style="color:red;"></span>
								</div>
							</div>
						<!-- Qualification & Profession Ends -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input value="<?php echo $relationinfo->profile_partner_mobile;?>" type="text" name="profile_partner_mobile[]" id="profile_partner_mobile_<?php echo $kp; ?>" class="form-control animation rounded-2" placeholder="Mobile">
									<span id="error_profile_partner_mobile_<?php echo $kp; ?>" style="color:red;"></span>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input value="<?php echo $relationinfo->profile_partner_location;?>" type="text" name="profile_partner_location[]" id="profile_partner_location_<?php echo $kp; ?>" class="form-control animation rounded-2" placeholder="Location">
									<span id="error_profile_partner_location_<?php echo $kp; ?>" style="color:red;"></span>
								</div>
							</div>
						<!-- Marital Status Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<select name="profile_partner_marital_status[]" id="profile_partner_marital_status_<?php echo $kp; ?>" class="custom-select form-control">
												<?php $profile_partner_marital_status = $relationinfo->profile_partner_marital_status; 
													$seleval=""; $seleone="";$seletwo="";$selethree="";
													if($profile_partner_marital_status=='single'){
														$seleone="selected";
													}else if($profile_partner_marital_status=='married'){
														$seletwo="selected";
													}else if($profile_partner_marital_status=='divorce'){
														$selethree="selected";
													}else{
														$seleval="selected";
													}
												?>
												
												<option <?php echo $seleval; ?> value="">Marital Status</option>
												<option <?php echo $seleone; ?> value="single">Single</option>
												<option <?php echo $seletwo; ?> value="married">Married</option>
												<option <?php echo $selethree; ?> value="divorce">Divorce</option>
											</select>
											<span id="error_profile_partner_marital_status_<?php echo $kp; ?>" style="color:red;"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select name="profile_parnter_blood_group[]" id="profile_parnter_blood_group_<?php echo $kp; ?>" class="custom-select form-control">
												<option value="">Blood Group</option>
												<?php foreach($bloodgroupsslist as $bgroups){
													$selectedd = "";													
													if($relationinfo->profile_parnter_blood_group==$bgroups->bggroupuqid){
														$selectedd = "selected";
													}
												?>
													<option <?php echo $selectedd; ?> value="<?php echo $bgroups->bggroupuqid; ?>"><?php echo ucfirst($bgroups->bggroup); ?></option>
												<?php }	?>
											</select>
											<span id="error_profile_parnter_blood_group_<?php echo $kp; ?>" style="color:red;"></span>
										</div>
									</div>
								</div>
							</div>
						<!-- Marital Status Ends -->
						<!-- Qualification & Profession Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<select name="profile_partner_qualification[]" id="profile_partner_qualification_<?php echo $kp; ?>" class="custom-select form-control">
												<option value="">Qualification</option>
												<?php foreach($qualificationslist as $qualifications){ 
													$zeroSelected = "";
													if($relationinfo->profile_partner_qualification_profession==$qualifications->qualificationuqid){
														$zeroSelected = "selected";
													}
												?>
													<option <?php echo $zeroSelected; ?> value="<?php echo $qualifications->qualificationuqid; ?>"><?php echo ucfirst($qualifications->qualificationname); ?></option>
												<?php }	?>
											</select>
											<span id="error_profile_partner_qualification_<?php echo $kp; ?>" style="color:red;"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select name="profile_partner_profession[]" id="profile_partner_profession_<?php echo $kp; ?>" class="custom-select form-control">
												<option value="">Profession</option>
												<?php foreach($professionslist as $professions){ 
													$twoSelected = "";
													if($relationinfo->profile_partner_profession==$professions->professiondisplayid){
														$twoSelected = "selected";
													}
												?>
													<option <?php echo $twoSelected; ?> value="<?php echo $professions->professiondisplayid; ?>"><?php echo ucfirst($professions->professionname); ?></option>
												<?php }	?>
											</select>
											<span id="error_profile_partner_qualification_profession_<?php echo $kp; ?>" style="color:red;"></span>
										</div>
									</div>
								</div>								
							</div>
						<!-- Qualification & Profession Ends -->
							<?php 
								$ddyear ="";$ddmonth ="";$dddate ="";
								if(isset($relationinfo->profile_partner_dob_date) && $relationinfo->profile_partner_dob_date!=""){ 
									$explodedDData = explode('-',$relationinfo->profile_partner_dob_date);
									$dddyear  = $explodedDData[0];
									$dddmonth = $explodedDData[1];
									$ddddate  = $explodedDData[2];
								}
							?>
						<!-- Date of Birth Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="text-weight-medium">Date of Birth</label>
									<div class="row">
										<div class="col-md-4 col-xs-4 col-sm-4" style="padding-right:0">
											<select required name="profile_partner_dob_date[]" id="profile_partner_dob_date_<?php echo $kp; ?>" class="custom-select alt-1 form-control">
												<?php for($d=1;$d<=31;$d++){ 
													$dateDate = "";
													$ds = "";
													if($d==$ddddate){
														$dds = 'selected';
													}
													$datepadding = str_pad($d, 2, "0", STR_PAD_LEFT);
												?>
												 <option <?php echo $dds; ?> value="<?php echo $d; ?>"><?php echo $datepadding; ?></option>
												<?php } ?>
											</select>
											<span id="error_profile_partner_dob_date_<?php echo $kp; ?>" style="color:red;"></span>
										</div>
										<div class="col-md-4 col-xs-4 col-sm-4" style="padding:0">
											<select required name="profile_partner_dob_month[]" id="profile_partner_dob_month_1" class="custom-select alt-1 mx-2 form-control">
											<?php 
												$formattedMonthArray = array(
													"01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr",
													"05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug",
													"09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec",
												);
											?>
											<?php
												foreach($formattedMonthArray as $key=>$month) {
													$mms = "";
													if($key==$dddmonth){
														$mms = 'selected';
													}	
													echo '<option "'.$mms.'" value="'.$key.'">'.$month.'</option>';
												}
											?>
											</select>
										</div>
										<div class="col-md-4 col-xs-4 col-sm-4" style="padding-left:0">
											<select required name="profile_partner_dob_year[]" id="profile_partner_dob_year_<?php echo $kp; ?>" class="custom-select alt-1 form-control">
												<?php $yearv = date('Y'); $laste20years = $yearv; 
												for($i=1980;$i<=$laste20years;$i++) { 
													$yys = "";
													if($i==$dddyear){
														$yys = 'selected';
													}
												
												?>
													<option  <?php echo $yys; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>						
						</div>
					</div>
				</td>
				<?php if($kp!=1){ ?>
					<td style="border:none"><label>&nbsp;</label><div><input type="button" onClick="deleteRowlist('<?php echo $kp; ?>');" class="ibtnDel btn btn-md btn-danger "  value="Delete"></div></td>
				<?php } ?>
			</tr>
		<?php $kp++; } }else{ ?>
			<tr style="border:none">
				<td class="" style="border:none">
				   <div class="">						
						<label class="text-weight-bold">Member Details</label>
						<div class="row">						
						<!-- Father Name Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" name="profile_partner_member_name[]" id="profile_partner_member_name_1" class="form-control animation rounded-2" placeholder="Member Name">
									<span id="error_profile_partner_member_name_1" style="color:red;"></span>
								</div>
							</div>
						<!-- Father Name Ends -->
						<!-- Qualification & Profession Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select name="profile_partner_realtion[]" id="profile_partner_realtion_1" class="custom-select form-control">
										<option value="">Relation With Head</option>
										<option value="wife">Wife</option>
										<option value="son">Son</option>
										<option value="daughter">Daughter</option>
									</select>
									<span id="error_profile_partner_realtion_1" style="color:red;"></span>
								</div>
							</div>
						<!-- Qualification & Profession Ends -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input value="" type="text" name="profile_partner_mobile[]" id="profile_partner_mobile_1" class="form-control animation rounded-2" placeholder="Mobile">
									<span id="error_profile_partner_mobile_1" style="color:red;"></span>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input value="" type="text" name="profile_partner_location[]" id="profile_partner_location_1" class="form-control animation rounded-2" placeholder="Location">
									<span id="error_profile_partner_location_1" style="color:red;"></span>
								</div>
							</div>
						<!-- Marital Status Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<select name="profile_partner_marital_status[]" id="profile_partner_marital_status_1" class="custom-select form-control">
												<option value="">Marital Status</option>
												<option value="single">Single</option>
												<option value="married">Married</option>
												<option value="divorce">Divorce</option>
											</select>
											<span id="error_profile_partner_marital_status_1" style="color:red;"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select name="profile_parnter_blood_group[]" id="profile_parnter_blood_group_1" class="custom-select form-control">
												<option value="">Blood Group</option>
												<?php foreach($bloodgroupsslist as $bgroups){ ?>
													<option value="<?php echo $bgroups->bggroupuqid; ?>"><?php echo ucfirst($bgroups->bggroup); ?></option>
												<?php }	?>
											</select>
											<span id="error_profile_parnter_blood_group_1" style="color:red;"></span>
										</div>
									</div>
								</div>
							</div>
						<!-- Marital Status Ends -->
						<!-- Qualification & Profession Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<select name="profile_partner_qualification[]" id="profile_partner_qualification_1" class="custom-select form-control">
												<option value="">Qualification</option>
												<?php foreach($qualificationslist as $qualifications){ ?>
													<option value="<?php echo $qualifications->qualificationuqid; ?>"><?php echo ucfirst($qualifications->qualificationname); ?></option>
												<?php }	?>
											</select>
											<span id="error_profile_partner_qualification_1" style="color:red;"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select name="profile_partner_profession[]" id="profile_partner_profession_1" class="custom-select form-control">
												<option value="">Profession</option>
												<?php foreach($professionslist as $professions){ ?>
													<option value="<?php echo $professions->professiondisplayid; ?>"><?php echo ucfirst($professions->professionname); ?></option>
												<?php }	?>
											</select>
											<span id="error_profile_partner_qualification_profession_1" style="color:red;"></span>
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
									<div class="col-md-4 col-xs-4 col-sm-4" style="padding-right:0">
										<select required name="profile_partner_dob_date[]" id="profile_partner_dob_date_1" class="custom-select alt-1 form-control">
											<?php for($d=1;$d<=31;$d++){ 
												$dateDate = "";
												$datepadding = str_pad($d, 2, "0", STR_PAD_LEFT);
											?>
											 <option value="<?php echo $d; ?>"><?php echo $datepadding; ?></option>
											<?php } ?>
										</select>
										<div>
											<span id="error_profile_partner_dob_date_1" style="color:red;"></span>
										</div>
										</div>
										<div class="col-md-3 col-xs-3 col-sm-3" style="padding:0">
										<select style="padding:6px" required name="profile_partner_dob_month[]" id="profile_partner_dob_month_1" class="custom-select alt-1 mx-2 form-control">
										<?php 
											$formattedMonthArray = array(
												"01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr",
												"05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug",
												"09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec",
											);
										?>
										<?php
											foreach($formattedMonthArray as $key=>$month) {
												echo '<option value="'.$key.'">'.$month.'</option>';
											}
										?>
										</select>
										</div>
										<div class="col-md-5 col-xs-5 col-sm-5" style="padding-left:0">
										<select required name="profile_partner_dob_year[]" id="profile_partner_dob_year_1" class="custom-select alt-1 form-control">
											<?php $yearv = date('Y'); $laste20years = $yearv; 
											for($i=1980;$i<=$laste20years;$i++) { 
											?>
												<option  value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php } ?>
										</select>
									</div>
									</div>
								</div>
							</div>						
						</div>
					</div>
				</td> 				
			</tr>
		<?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-main btn-style-2 text-weight-semi-bold text-big-2 animation rounded-2" id="addrow" value="Click Here to Add More Family Member" />
            </td>
        </tr>        
    </tfoot>
</table>
					
					</div>
				<!-- Family Details Ends -->
				
				
				</div>
			<!-- Nested Row Ends -->
			<input type="hidden" value="1" id="invalidCheck" name="invalidCheck" >
			<div class="col-md-12"><button type="button" class="btn btn-primary " onClick="return formValidate();">Submit Form</button></div>
			</form>
		<!-- Profile Form Ends -->
		</div>				
			</div>
        </div>
    </div>
</div>
<div class="modal fade" id="allConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="statusLable"></h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
		  <div class="box-body">
			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
			  <div class="col-sm-8">
				<p id="statusMessage"></p>
			  </div>
			</div>
			<input type="hidden" name="prid" id="prid">
			<input type="hidden" name="change_status" id="change_status">
			<input type="hidden" name="confirm_type" id="confirm_type" value="">
		 </div>
        </form>
      </div>
      <div class="modal-footer">
	  <span id="successUpdateStatus"></span>
	   <span style="display:none;float:left;" id="confirmationLoader"><i class="fa fa-refresh fa-spin"></i></span>​
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" onClick="confirmActions();">Ok</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="hidcnt" name="hidcnt" value="<?php if(isset($boomrelations) && count($boomrelations)>0){ echo count($boomrelations); }else{ echo '1'; }?>">
<?php
	$this->load->view('admin/includes/footer');
?>
<script>
	$(document).ready(function () {
			var counter = $("#hidcnt").val();
			$("#addrow").on("click", function () {
				var newRow = $("<tr>");
				var cols = "";
				counter = parseInt(counter) + 1;
				$.ajax({
					type		:	'POST',
					url			:  	'<?php echo base_url(); ?>User/getAdminMemberAddittionalInfo?sRch=<?php echo time(); ?>',
					dataType	: 	"json",
					data		:	{counter:counter},
					success: function(data){
						cols +=data.htmlData;
						cols += '<td style="border:none"><label>&nbsp;</label><div><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></div></td>';
						newRow.append(cols);
						$("table.order-list").append(newRow);	
					}
				});						
				$("#hidcnt").val(counter);
			});
			$("table.order-list").on("click", ".ibtnDel", function (event) {
				var counter = $("#hidcnt").val();
				$(this).closest("tr").remove(); 
				counter = parseInt(counter) - 1;
				$("#hidcnt").val(counter);
			});
		});
		function getLocationArea(){
			var profile_location_area = $("#profile_location_area option:selected").text();
			$("#profile_location_area_name").val(profile_location_area);
		}
		function formValidate(){
			var flag = true;
			var boxes = $('input[name=invalidCheck]:checked');
			var profile_fullname = $("#profile_fullname").val();
			var profile_middlename = $("#profile_middlename").val();
			var profile_surname = $("#profile_surname").val();			
			// if(boxes.length==0){
				// flag = false;
				// $("#error_invalidCheck").html("Required");
			// }else{
				// $("#error_invalidCheck").html("");
			// }
			if(profile_fullname==""){
				flag = false;
				$("#error_profile_fullname").html("Required");
			}else{
				$("#error_profile_fullname").html("");
			}
			// if(profile_middlename==""){
				// flag = false;
				// $("#error_profile_middlename").html("Required");
			// }else{
				// $("#error_profile_middlename").html("");
			// }
			if(profile_surname==""){
				flag = false;
				$("#error_profile_surname").html("Required");
			}else{
				$("#error_profile_surname").html("");
			}
			var profile_fathername = $("#profile_fathername").val();
			if(profile_fathername==""){
				flag = false;
				$("#error_profile_fathername").html("Required");
			}else{
				$("#error_profile_fathername").html("");
			}
			var profile_mothername = $("#profile_mothername").val();
			if(profile_mothername==""){
				flag = false;
				$("#error_profile_mothername").html("Required");
			}else{
				$("#error_profile_mothername").html("");
			}
			var profile_occupation = $("#profile_occupation").val();
			if(profile_occupation==""){
				flag = false;
				$("#error_profile_occupation").html("Required");
			}else{
				$("#error_profile_occupation").html("");
			}
			var profile_gothram = $("#profile_gothram").val();
			if(profile_gothram==""){
				flag = false;
				$("#error_profile_gothram").html("Required");
			}else{
				$("#error_profile_gothram").html("");
			}
			var profile_marital_status = $("#profile_marital_status").val();
			if(profile_marital_status==""){
				flag = false;
				$("#error_profile_marital_status").html("Required");
			}else{
				$("#error_profile_marital_status").html("");
			}
			var profile_nri = $("#profile_nri").val();
			if(profile_nri==""){
				flag = false;
				$("#error_profile_nri").html("Required");
			}else{
				$("#error_profile_nri").html("");
			}
			var profile_community_status = $("#profile_community_status").val();
			if(profile_community_status==""){
				flag = false;
				$("#error_profile_community_status").html("Required");
			}else{
				$("#error_profile_community_status").html("");
			}
			var profile_residence_type = $("#profile_residence_type").val();
			if(profile_residence_type==""){
				flag = false;
				$("#error_profile_residence_type").html("Required");
			}else{
				$("#error_profile_residence_type").html("");
			}
			var profile_present_address = $("#profile_present_address").val();
			if(profile_present_address==""){
				flag = false;
				$("#error_profile_present_address").html("Required");
			}else{
				$("#error_profile_present_address").html("");
			}
			var profile_phone = $("#profile_phone").val();
			if(profile_phone==""){
				flag = false;
				$("#error_profile_phone").html("Required");
			}else{
				$("#error_profile_phone").html("");
			}
			var profile_email = $("#profile_email").val();
			if(profile_email==""){
				flag = false;
				$("#error_profile_email").html("Required");
			}else{
				$("#error_profile_email").html("");
			}
			var profile_native_district = $("#profile_native_district").val();
			if(profile_native_district==""){
				flag = false;
				$("#error_profile_native_district").html("Required");
			}else{
				$("#error_profile_native_district").html("");
			}
			var  inputName = $('input[name="profile_partner_member_name[]"]')
			console.log(inputName.length);
			var j=1;
			for(var i = 0; i <inputName.length; i++) {
				if($("#profile_partner_member_name_"+j).val()==""){
					flag = false;
					$("#error_profile_partner_member_name_"+j).html("Required");
				}else{
					$("#error_profile_partner_member_name_"+j).html('');
				}
				j++;
			}
			if(flag==false){
				return false;				
			}else{
				$("#family_member").submit();
			}			
		}
</script>