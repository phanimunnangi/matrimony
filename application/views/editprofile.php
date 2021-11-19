<style>
.error{
	color:red;
}
</style>
<!-- Page Banner Starts -->
		<div class="page-banner">
        <!-- Banner Image Starts -->
            <img src="<?php echo base_url(); ?>assets/images/banners/page-banners/page-banner-img1.jpg" alt="Image" class="img-fluid">
        <!-- Banner Image Ends -->
        <!-- Nested Container Starts -->
            <div class="container px-md-0 text-white text-center d-none d-md-block" style="bottom:40%;">
                <h2 class="text-weight-semi-bold">We bring people together.</h2>
        		<h2 class="text-weight-light">Love unites them...</h2>
            </div>
        <!-- Nested Container Ends -->
		</div>
	<!-- Page Banner Ends -->
	<!-- Profile Search Starts -->
		<?php // $this->load->view('search');?>
	<!-- Profile Search Ends -->
	<!-- Main Container Starts -->
		<div class="main-container container px-md-0">
		<!-- Profile Form Starts -->
			<form class="profile-form" method="POST" name="edit_profile" id="edit_profile" enctype="multipart/form-data" action="<?php echo base_url();?>User/saveuserprofiledata">
				<input type="hidden" id="user_id" name="user_id" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->user_id; ?>">
			<!-- Nested Row Starts -->
				<div class="row">
				<!-- Personal Details Starts -->
					<div class="col-lg-6 col-sm-12">
					<!-- Heading Starts -->
						<h4 class="my-4 text-weight-semi-bold text-color-brand">Personal Details</h4>
					<!-- Heading Ends -->
						
					<!-- Fields Starts -->
						<div class="row">						
						<!-- Fullname Starts -->
							<div class="col-12">
								<div class="form-group">
									<input type="text" required class="form-control animation rounded-2" id="user_display_name" name="user_display_name" placeholder="Full name" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->user_display_name; ?>">
									<span id="error_user_display_name" style="color:red"></span>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<input type="text" required class="form-control animation rounded-2" id="user_email" name="user_email" placeholder="Email" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->user_display_name; ?>">
									<span id="error_user_email" style="color:red"></span>
								</div>
							</div><div class="col-12">
								<div class="form-group">
									<input type="text" required class="form-control animation rounded-2" id="user_mobile" name="user_mobile" placeholder="Phone" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->user_display_name; ?>">
									<span id="error_user_phone" style="color:red"></span>
								</div>
							</div>
						<!-- Fullname Ends -->
						<!-- Father Name Starts -->
							<!--<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" required class="form-control animation rounded-2" id="upd_fathername" name="upd_fathername" placeholder="Father Name" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upd_fathername; ?>">
									<span id="error_upd_fathername" style="color:red"></span>
								</div>
							</div>-->
						<!-- Father Name Ends -->
						<!-- Mother Name Starts -->
							<!--<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" required class="form-control animation rounded-2" id="upd_mothername" name="upd_mothername" placeholder="Mother Name" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upd_mothername; ?>">
									<span id="error_upd_mothername" style="color:red"></span>
								</div>
							</div>-->
						<!-- Mother Name Ends -->
						<div class="col-6">
						<div class="form-group">
							<label class="text-weight-medium">Gender</label>
							<select id="user_gender" name="user_gender" class="custom-select alt-1">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						</div>
						<div class="col-6">
						<div class="form-group">
							<label class="text-weight-medium">Create Profile For</label>
							<select id="user_create_profile_for" name="user_create_profile_for" class="custom-select alt-1">
								<option value="self">Self</option>
								<option value="son">Son</option>
								<option value="daughter">Daughter</option>
							</select>
						</div>
					</div>
						<!-- Fullname Starts -->
							<div class="col-6">
								<div class="form-group">
									<input type="text" required class="form-control animation rounded-2" id="upd_surname" name="upd_surname" placeholder="Surname" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upd_surname; ?>">
									<span id="error_upd_surname" style="color:red"></span>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="text" required class="form-control animation rounded-2" id="upi_birthplace" name="upi_birthplace" placeholder="Place of Birth" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upi_birthplace; ?>">
									<span id="error_upi_birthplace" style="color:red"></span>
								</div>
							</div>
						<!-- Fullname Ends -->
						<!-- Gothram Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upi_gothram; ?>" type="text" id="upi_gothram" name="upi_gothram" class="form-control animation rounded-2" placeholder="Gothram"/>
								</div>
							</div>
						<!-- Gothram Ends -->
						<!-- Sub Caste Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select required id="upi_caste" name="upi_caste" class="custom-select" >
										<option value="">Select a Caste</option>
										<?php if(isset($subcasteslist) && !empty($subcasteslist) && count($subcasteslist)>0){ foreach($subcasteslist as $caste){ 
											$selectedcaste= "";
											if(isset($userdetails->upi_caste) && $caste->subcastedisplayid==$userdetails->upi_caste){
												$selectedcaste= "selected";
											}												
										?>
										<option <?php echo $selectedcaste; ?> value="<?php echo $caste->subcastedisplayid.'-'.ucfirst($caste->subcastename); ?>"><?php echo ucfirst($caste->subcastename); ?></option>
										<?php } } ?>
									</select>
									<span id="error_upi_caste" style="color:red"></span>
								</div>
							</div>
						<!-- Sub Caste Ends -->
						
						<!-- Date of Birth Starts -->
							<?php
								$dobyear = "";
								$dobmonth = "";
								$dobdate = "";
								if(isset($userdetails) && $userdetails->upi_dateofbirth!=''){
									$dob = $userdetails->upi_dateofbirth;
									$datexplode = explode('-',$dob);
									$dobyear = $datexplode[0];
									$dobmonth = $datexplode[1];
									$dobdate = $datexplode[2];
								}
							?>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="text-weight-medium">Date of Birth</label>
									<div class="d-flex justify-content-between">
										<select required name="upi_dateofbirth_date" id="upi_dateofbirth_date" class="custom-select alt-1">
											<?php for($d=1;$d<=31;$d++){ 
												$dateDate = "";
												if($dobdate==$d){
													$dateDate = "selected";
												}
												$datepadding = str_pad($d, 2, "0", STR_PAD_LEFT);
											?>
											 <option <?php echo $dateDate; ?> value="<?php echo $d; ?>"><?php echo $datepadding; ?></option>
											<?php } ?>
										</select>
										<select required name="upi_dateofbirth_month" id="upi_dateofbirth_month" class="custom-select alt-1 mx-2">
										<?php 
											$formattedMonthArray = array(
												"01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr",
												"05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug",
												"09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec",
											);
										?>
										<?php
											foreach($formattedMonthArray as $key=>$month) {
												$selected = ($key == $dobmonth) ? 'selected' : '';
												echo '<option '.$selected.' value="'.$key.'">'.$month.'</option>';
											}
										?>
										</select>
										<select required name="upi_dateofbirth_year" id="upi_dateofbirth_year" class="custom-select alt-1">
											<?php $yearv = date('Y'); $laste20years = $yearv-19; 
											for($i=1980;$i<=$laste20years;$i++) { 
												$selected = ($i == $dobyear) ? 'selected' : '';
											?>
												<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<input type="hidden" id="upi_dateofbirth" name="upi_dateofbirth" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upi_dateofbirth;?>">
							<input type="hidden" id="upi_age" name="upi_age" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upi_age;?>">
						<!-- Date of Birth Ends -->
						<!-- Time of Birth Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="text-weight-medium">Time of Birth</label>
									<div class="d-flex justify-content-between">
										<?php 
											$dataExplode = array();
											if(isset($userdetails->upi_birth_timings) && $userdetails->upi_birth_timings!=""){
												$dataExplode = explode('-',$userdetails->upi_birth_timings);
											}														
										?>
										<select required id="upi_birth_timings_h" name="upi_birth_timings_h"  class="custom-select alt-1">
											<?php for($i=0;$i<=23;$i++){ 
												$hpadding = str_pad($i, 2, "0", STR_PAD_LEFT);
												$selectedrow="";
												if(isset($userdetails) && $dataExplode[0]==$i){
													$selectedrow="selected";
												}
											?>
												<option <?php echo $selectedrow; ?> value="<?php echo $i; ?>"><?php echo $hpadding; ?></option>
											<?php } ?>
										</select>
										<select required id="upi_birth_timings_m" name="upi_birth_timings_m" class="custom-select alt-1 mx-2">
											<?php for($j=0;$j<=59;$j++){ 	
												$gpadding = str_pad($j, 2, "0", STR_PAD_LEFT);
												$selected2row="";
												if(isset($userdetails) && $dataExplode[1]==$j){
													$selected2row="selected";
												}
											?>
												<option <?php echo $selected2row; ?> value="<?php echo $j; ?>"><?php echo $gpadding; ?></option>
											<?php } ?>
										</select>
										<select required id="upi_birth_timings_sec" name="upi_birth_timings_sec" class="custom-select alt-1">
											<?php for($k=0;$k<=59;$k++){ 
												$kpadding = str_pad($k, 2, "0", STR_PAD_LEFT);
												$selected3row="";
												if(isset($userdetails) &&  $dataExplode[2]==$k){
													$selected3row="selected";
												}
											?>
												<option <?php echo $selected3row; ?> value="<?php echo $k; ?>"><?php echo $kpadding; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						<!-- Time of Birth Ends -->
						<!-- Raasi Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<div class="d-flex justify-content-between">
										<select id="upi_star" name="upi_star" class="custom-select alt-1">
											<option value="star">Star</option>
											<?php if(isset($starslist) && !empty($starslist) && count($starslist)>0){ foreach($starslist as $stars){ 
												$selectedstar= "";
												if(isset($userdetails) &&  $stars->stardisplayid==$userdetails->upi_star){
													$selectedstar= "selected";
												}			
											?>
											<option <?php echo $selectedstar; ?> value="<?php echo $stars->stardisplayid.'-'.ucfirst($stars->starname); ?>"><?php echo ucfirst($stars->starname); ?></option>
											<?php } } ?>
										</select>
										<select name="upi_leg" id="upi_leg" class="custom-select alt-1 mx-2">
											<option value="leg">Paadam</option>
											<?php if(isset($legs) && !empty($legs) && count($legs)>0){ foreach($legs as $leg){ 
												$selectedleg= "";
												if(isset($userdetails) &&  $leg->legdisplayid==$userdetails->upi_leg){
													$selectedleg= "selected";
												}
											?>
											<option <?php echo $selectedleg; ?> value="<?php echo $leg->legdisplayid.'-'.ucfirst($leg->legvalue); ?>"><?php echo ucfirst($leg->legvalue); ?></option>
											<?php } } ?>
										</select>
										<select id="upi_rassi" name="upi_rassi" class="custom-select alt-1">
											<option value="raasi">Raasi</option>
											<?php if(isset($raasislist) && !empty($raasislist) && count($raasislist)>0){ foreach($raasislist as $raasi){ 
												$selectedrassi= "";
												if(isset($userdetails) && $raasi->raasidisplayid==$userdetails->upi_rassi){
													$selectedrassi= "selected";
												}
											?>
											<option <?php echo $selectedrassi; ?> value="<?php echo $raasi->raasidisplayid.'-'.ucfirst($raasi->raasiname); ?>"><?php echo ucfirst($raasi->raasiname); ?></option>
											<?php } } ?>
										</select>
									</div>
								</div>
							</div>
						<!-- Raasi Ends -->
						<!-- Height Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<div class="d-flex justify-content-between">
										<select id="upi_manglik_status" name="upi_manglik_status" class="custom-select alt-1">
											<option value="">Manglik status</option>
											<?php
												$selectNo    = "";
												$selectYes   = "";
												$selectNoIdea= "";
												if(isset($userdetails) && $userdetails->upi_manglik_status=="No"){
													$selectNo = "selected";
												}else if(isset($userdetails) && $userdetails->upi_manglik_status=="Yes"){
													$selectYes = "selected";
												}else if(isset($userdetails) && $userdetails->upi_manglik_status=="No Idea"){
													$selectNoIdea = "selected";
												}
											
											?>
											<option <?php echo $selectNo; ?> value="No">No</option>
											<option <?php echo $selectYes; ?> value="Yes">Yes</option>
											<option <?php echo $selectNoIdea; ?> value="No Idea">No Idea</option>
										</select>
										<select required id="upi_height" name="upi_height" class="custom-select alt-1 mx-2">
											<option value="height">Height</option>
											<?php if(isset($heightslist) && !empty($heightslist) && count($heightslist)>0){ foreach($heightslist as $height){ 
												$selectedheight= "";
												if(isset($userdetails) && $height->heightvalue==$userdetails->upi_height){
													$selectedheight= "selected";
												}
											?>
											<option <?php echo $selectedheight; ?> value="<?php echo $height->heightvalue; ?>"><?php echo ucfirst($height->heightvalue); ?></option>
											<?php } } ?>
										</select>
									</div>
								</div>
							</div>
						<!-- Height Ends -->
						<!-- Complexion Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select required id="upi_complexion" name="upi_complexion" class="custom-select">
										<option value="">Complexion</option>
										<?php
											$selectedFair    = "";
											$selectedDark    = "";
											$selectedWhitish = "";
											$selectedMedium  = "";
											if(isset($userdetails) && $userdetails->upi_complexion=='Fair'){
												$selectedFair = "selected";
											}else if(isset($userdetails) && $userdetails->upi_complexion=='Dark'){
												$selectedDark = "selected";
											}else if(isset($userdetails) && $userdetails->upi_complexion=='Whitish'){
												$selectedWhitish = "selected";
											}else if(isset($userdetails) && $userdetails->upi_complexion=='Medium'){
												$selectedMedium = "selected";
											}
										?>
										<option <?php echo $selectedFair; ?> value="Fair">Fair</option>
										<option <?php echo $selectedDark; ?> value="Dark">Dark</option>
										<option <?php echo $selectedWhitish; ?> value="Whitish">Whitish</option>
										<option <?php echo $selectedMedium; ?> value="Medium">Medium</option>
									</select>
								</div>
							</div>
						<!-- Complexion Ends -->
						<!-- Marital Status Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select id="upi_maritalstatus" name="upi_maritalstatus" class="custom-select">
										<option value="">Marital Status</option>
										<?php
											$selectedUnmarried = "";
											$selectedMarried   = "";
											$selectedSeperated = "";
											$selectedDivorced  = "";
											$selectedWidow     = "";
											$selectedWidower   = "";
											$selectedAwaitingDivorced = "";
											if(isset($userdetails) && $userdetails->upi_maritalstatus=='Unmarried'){
												$selectedUnmarried = "selected";
											}else if(isset($userdetails) && $userdetails->upi_maritalstatus=='Married'){
												$selectedMarried = "selected";
											}else if(isset($userdetails) && $userdetails->upi_maritalstatus=='Seperated'){
												$selectedSeperated = "selected";
											}else if(isset($userdetails) && $userdetails->upi_maritalstatus=='Divorced'){
												$selectedDivorced = "selected";
											}else if(isset($userdetails) && $userdetails->upi_maritalstatus=='Awaiting Divorced'){
												$selectedAwaitingDivorced = "selected";
											}else if(isset($userdetails) && $userdetails->upi_maritalstatus=='Widow'){
												$selectedWidow = "selected";
											}else if(isset($userdetails) && $userdetails->upi_maritalstatus=='widower'){
												$selectedWidower = "selected";
											}
										?>
										<option <?php echo $selectedUnmarried; ?> value="Unmarried">Unmarried</option>
										<option <?php echo $selectedMarried; ?> value="Married">Married</option>
										<option <?php echo $selectedSeperated; ?> value="Seperated">Seperated</option>
										<option <?php echo $selectedDivorced; ?> value="Divorced">Divorced</option>
										<option <?php echo $selectedAwaitingDivorced; ?> value="Awaiting Divorced">Awaiting Divorced</option>
										<option <?php echo $selectedWidow; ?> value="Widow">Widow</option>
										<option <?php echo $selectedWidower; ?> value="widower">Widower</option>
									</select>
								</div>
							</div>
						<!-- Marital Status Ends -->
						<!-- Physical Disability Starts -->
							<div class="col-md-6 col-sm-12 hidden">
								<div class="form-group">
									<select name="upi_physicaldisability" id="upi_physicaldisability" class="custom-select">
										<option value="">Physicaldisability Status</option>
										<?php
											$selectedno = "";
											$selectedyes = "";
											if(isset($userdetails) && $userdetails->upi_physicaldisability=='No'){
												$selectedno = "selected";
											}else if(isset($userdetails) && $userdetails->upi_physicaldisability=='Yes'){
												$selectedyes = "selected";
											}
										?>										
										<option <?php echo $selectedno; ?> value="No">No</option>
										<option <?php echo $selectedyes; ?> value="Yes">Yes</option>
									</select>
								</div>
							</div>
						<!-- Physical Disability Ends -->
						<!-- NRI Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upi_nri_living_country_name; ?>" type="text" name="upi_nri_living_country_name" id="upi_nri_living_country_name" class="form-control animation rounded-2" placeholder="NRI living country name"/>
								</div>
							</div>
						<!-- NRI Ends -->
							<div class="col-md-6 col-sm-12 d-none">
								<div class="form-group">
									<select id="upi_will_to_marry_widow" name="upi_will_to_marry_widow" class="custom-select">
										<option value="">Will to marry window</option>
										<?php
											$selectedno = "";
											$selectedyes = "";
											if(isset($userdetails) && $userdetails->upi_will_to_marry_widow=='No'){
												$selectedno = "selected";
											}else if(isset($userdetails) && $userdetails->upi_will_to_marry_widow=='Yes'){
												$selectedyes = "selected";
											}
										?>										
										<option <?php echo $selectedno; ?> value="No">No</option>
										<option <?php echo $selectedyes; ?> value="Yes">Yes</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 d-none">
								<div class="form-group">
									<select id="upi_livingtogether" name="upi_livingtogether" class="custom-select">
										<option value="">Living to gether</option>
										<?php
											$selectedno = "";
											$selectedyes = "";
											if(isset($userdetails) && $userdetails->upi_livingtogether=='No'){
												$selectedno = "selected";
											}else if(isset($userdetails) && $userdetails->upi_livingtogether=='Yes'){
												$selectedyes = "selected";
											}
										?>										
										<option <?php echo $selectedno; ?> value="No">No</option>
										<option <?php echo $selectedyes; ?> value="Yes">Yes</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 d-none">
								<div class="form-group">
									<select id="upi_have_childerns" name="upi_have_childerns" class="custom-select">
										<option value="">Have you childerns</option>
										<?php
											$selectedno = "";
											$selectedyes = "";
											if(isset($userdetails) && $userdetails->upi_have_childerns=='No'){
												$selectedno = "selected";
											}else if(isset($userdetails) && $userdetails->upi_have_childerns=='Yes'){
												$selectedyes = "selected";
											}
										?>										
										<option <?php echo $selectedno; ?> value="No">No</option>
										<option <?php echo $selectedyes; ?> value="Yes">Yes</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 d-none">
								<div class="form-group">
									<select id="upi_noofchilderns" name="upi_noofchilderns" class="custom-select">
										<option value="">Noof childerns</option>
										<?php for($a=0;$a<=10;$a++){
											$selected = "";
											if(isset($userdetails) && $userdetails->upi_noofchilderns==$a){
												$selected = "selected";
											}
											$apadding = str_pad($a, 2, "0", STR_PAD_LEFT);
										?>
											<option <?php echo $selected; ?> value="<?php echo $a; ?>"><?php echo $apadding; ?></option>
										<?php } ?>										
									</select>
								</div>
							</div>
						</div>
					<!-- Fields Ends -->
					</div>
				<!-- Personal Details Ends -->
				<!-- Education & Communication Details Starts -->
					<div class="col-lg-6 col-sm-12">
					<!-- Heading Starts -->
						<h4 class="my-4 text-weight-semi-bold text-color-brand">Educational Details</h4>
					<!-- Heading Ends -->
					<!-- Fields Starts -->
						<div class="row">
						<!-- Educational Qualifications Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" id="ued_education_qualifications" name="ued_education_qualifications" class="form-control animation rounded-2" placeholder="Education Qualifications" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->ued_education_qualifications; ?>"/>
								</div>
							</div>
						<!-- Educational Qualifications Ends -->						
						<!-- Profession Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select class="custom-select" id="ued_profession_id" name="ued_profession_id">
										<option value="">Select a Profession</option>
										<?php if(isset($professionslist) && !empty($professionslist) && count($professionslist)>0){ foreach($professionslist as $profession){ 
											$eduSelected = "";
											if(isset($userdetails) && $profession->professiondisplayid==$userdetails->ued_profession_id){
												$eduSelected = "selected";
											}															
										?>
										<option <?php echo $eduSelected; ?> value="<?php echo $profession->professiondisplayid.'-'.ucfirst($profession->professionname); ?>"><?php echo ucfirst($profession->professionname); ?></option>
										<?php } } ?>
									</select>
									<span id="error_ued_profession" style="color:red"></span>
								</div>
							</div>
						<!-- Profession Ends -->
						<!-- Place Of Work Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" required id="ued_place_work" name="ued_place_work" class="form-control animation rounded-2" placeholder="Place Of Work" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->ued_place_work; ?>"/>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" id="ued_company_name" name="ued_company_name" class="form-control animation rounded-2" placeholder="Company name" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->ued_company_name; ?>"/>
								</div>
							</div>
						<!-- Place Of Work Ends -->
						<!-- Monthly Income Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" id="ued_income" name="ued_income" class="form-control animation rounded-2" placeholder="Monthly Income" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->ued_income; ?>"/>
								</div>
							</div>
						<!-- Monthly Income Ends -->
						<!-- Other Source of Income Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input value="<?php if(isset($userdetails) > 0 ) echo $userdetails->ued_othersourceofincome; ?>" type="text" id="ued_othersourceofincome" name="ued_othersourceofincome" class="form-control animation rounded-2" placeholder="Other Source of Income"/>
								</div>
							</div>
						<!-- Other Source of Income Ends -->
						</div>
					<!-- Fields Ends -->
					<!-- Heading Starts -->
						<h4 class="my-4 text-weight-semi-bold text-color-brand">Communcation Details</h4>
					<!-- Heading Ends -->
					<!-- Fields Starts -->
						<div class="row">
						<!-- Native District Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" required class="form-control animation rounded-2" id="urd_native_district" name="urd_native_district" placeholder="Native District" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->urd_native_district; ?>">								
									<span id="error_urd_native_district" style="color:red"></span>
								</div>
							</div>
						<!-- Native District Ends -->
						<!-- Residence Type Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<?php
										$selownhouse = "";
										$selrenthouse = "";
										if(isset($userdetails) && $userdetails->urd_communication_resident_type=='Own House'){
											$selownhouse = "selected";
										}else if(isset($userdetails) && $userdetails->urd_communication_resident_type=='Rent House'){
											$selrenthouse = "selected";
										}
									?>
									<select name="urd_communication_resident_type" id="urd_communication_resident_type" class="custom-select">
										<option value="select">Residence Type</option>
										<option <?php echo $selownhouse; ?> value="Own House">Own House</option>
										<option <?php echo $selrenthouse; ?> value="Rent House">Rent House</option>
									</select>
								</div>
							</div>
						<!-- Residence Type Ends -->
						<!-- Present Address Starts -->
							<div class="col-sm-12">
								<div class="form-group">
									<textarea rows="4" required cols="50" class="form-control animation rounded-2" id="urd_communication_address" name="urd_communication_address" placeholder="Present Address"><?php if(isset($userdetails) > 0 ) echo $userdetails->urd_communication_address; ?></textarea>
									<?php
										$caipchecked = 0;
										if(isset($userdetails) && $userdetails->urd_communication_address_is_published==1){
											$caipchecked = 1;
										}
									?>
									<input value="<?php echo $caipchecked; ?>" type="hidden" id="urd_communication_address_is_published" name="urd_communication_address_is_published">
								</div>
							</div>
						<!-- Present Address Ends -->
						<!-- Phone Number Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<?php if(isset($userdetails) > 0 ) echo $userdetails->urd_primaryconactnumber; ?>
									<?php 
										$caipcheckedd = 0;
										if(isset($userdetails) && $userdetails->urd_primarycontactnumber_is_published==1){
											$caipcheckedd = 1;
										}														
									?>
									<input value="<?php echo $caipcheckedd; ?>" type="hidden" id="urd_primarycontactnumber_is_published" name="urd_primarycontactnumber_is_published">
								</div>
							</div>
						<!-- Phone Number Ends -->
						<!-- Email Address Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<?php if(isset($userdetails) > 0 ) echo $userdetails->urd_email; ?>
									<?php 
										$emailChecked = 0;
										if(isset($userdetails) && $userdetails->urd_email_is_published==1){
											$emailChecked = 1;
										}
									
									?>
									<input value="<?php echo $emailChecked; ?>" type="hidden" id="urd_email_is_published" name="urd_email_is_published">								
								</div>
							</div>
						<!-- Email Address Ends -->
						<!-- Phone Number Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="number" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->urd_contactnumber; ?>" class="form-control" id="urd_contactnumber" name="urd_contactnumber" placeholder="Secondary Phone">
									<?php 
										$pcnChecked = 0;
										if(isset($userdetails) && $userdetails->urd_contactnumber_is_published==1){
											$pcnChecked = 1;
										}														
									?>
									<input value="<?php echo $pcnChecked; ?>" type="hidden" id="urd_contactnumber_is_published" name="urd_contactnumber_is_published">				
								</div>
							</div>
						<!-- Phone Number Ends -->
						<!-- Phone Number Starts -->
							<?php
								$dataone="";
								$datatwo="";
								if(isset($userdetails) && $userdetails->urd_landlinenumber!=""){
									$explodeData = explode('-',$userdetails->urd_landlinenumber);
									$dataone = $explodeData[0];
									$datatwo = $explodeData[1];
								}
							?>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<input type="number" value="<?php echo $dataone; ?>" class="form-control" id="urd_landlinenumber_c" name="urd_landlinenumber_c" placeholder="CodeEg:040">
									<span id="error_urd_landlinenumber" style="color:red"></span>
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<input type="number" value="<?php echo $datatwo; ?>" class="form-control" id="urd_landlinenumber" name="urd_landlinenumber" placeholder="CodeEg:040">
									<?php 
										$pcnChecked = 0;
										if(isset($userdetails) && $userdetails->urd_landinenumber_is_published==1){
											$pcnChecked = 1;
										}														
									?>
									<input value="<?php echo $pcnChecked; ?>" type="hidden" id="urd_landinenumber_is_published" name="urd_landinenumber_is_published">
								</div>
							</div>
						<!-- Phone Number Ends -->
						</div>
					<!-- Fields Ends -->
					</div>
				<!-- Education & Communication Details Ends -->				
				<!-- Family Details Starts -->
					<div class="col-lg-6 col-sm-12">
					<!-- Heading Starts -->
						<h4 class="my-4 text-weight-semi-bold text-color-brand">Family Details</h4>
					<!-- Heading Ends -->
					<!-- Fields Starts -->
						<div class="row">
							<input type="hidden" id="upd_elder_brothers" name="upd_elder_brothers" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upd_elder_brothers; ?>">
							<input type="hidden" id="upd_elder_sisters" name="upd_elder_sisters" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upd_elder_sisters; ?>">
							<!-- Father Name Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" required class="form-control animation rounded-2" id="upd_fathername" name="upd_fathername" placeholder="Father Name" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upd_fathername; ?>">
									<span id="error_upd_fathername" style="color:red"></span>
								</div>
							</div>
						<!-- Father Name Ends -->
						<!-- Qualification & Profession Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" id="upd_father_profession" name="upd_father_profession" class="form-control" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upd_father_profession; ?>">
									<span id="error_upd_father_profession" style="color:red"></span>
								</div>
							</div>
						<!-- Qualification & Profession Ends -->
						<!-- Mother Name Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" required class="form-control animation rounded-2" id="upd_mothername" name="upd_mothername" placeholder="Mother Name" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upd_mothername; ?>">
									<span id="error_upd_mothername" style="color:red"></span>
								</div>
							</div>
						<!-- Mother Name Ends -->
						<!-- Qualification & Profession Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input type="text" id="upd_mother_profession" name="upd_mother_profession" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->upd_mother_profession; ?>" class="form-control">
									<span id="error_upd_mother_profession" style="color:red"></span>	
								</div>
							</div>
						<!-- Qualification & Profession Ends -->
						<!-- Brothers Starts -->
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<select id="upd_noofbrothers" name="upd_noofbrothers" class="custom-select" onchange="rowsadded('brothers');">
										<option value="">No of Brothers</option>
										<?php for($i=0;$i<=5;$i++) { 
											$selected = "";
											if(isset($userdetails) && $userdetails->upd_noofbrothers==$i){
												$selected = "selected";
											}
											$brpadding = str_pad($i, 2, "0", STR_PAD_LEFT);
										?>
											<option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $brpadding; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<!-- Brothers Ends -->
							<?php 
								$styledisplaynone ="display:none;";
								if(isset($userdetails) && $userdetails->upd_noofbrothers==0){
									$styledisplaynone ="display:none;";
								}else{
									$styledisplaynone ="";
								}
							?>
							<span id="isHasBrothers" style="<?php echo $styledisplaynone; ?>">
								<span id="brothers_div">
									<div class="col-md-12">
										<div class="row">
											<?php $updNoofbrothers = (isset($userdetails))?$userdetails->upd_noofbrothers:''; 
											for($k=1;$k<=$updNoofbrothers;$k++){ ?>										
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<input type="hidden" id="upd_brothername<?php echo $k; ?>" name="upd_brothername<?php echo $k; ?>" value="">
														<select id="upd_elder_younger<?php echo $k; ?>" name="upd_elder_younger<?php echo $k; ?>" class="custom-select form-control" width="100%">
														<?php 
															$elderSelected ="";
															$youngerSelected ="";
															$nameeee = "upd_elder_younger".$k;
															if(isset($userdetails) && $userdetails->$nameeee=='Elder'){
																$elderSelected ="selected";
															}else if(isset($userdetails) && $userdetails->$nameeee=='Younger'){
																$youngerSelected ="selected";
															}
														?>
															<option <?php echo $elderSelected; ?> value="Elder">Elder</option>
															<option <?php echo $youngerSelected; ?> value="Younger">Younger</option>
														</select>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<select id="upd_marital_status<?php echo $k; ?>" name="upd_marital_status<?php echo $k; ?>" class="custom-select">
															<?php 
																$unmarriedSelected ="";
																$marriedSelected ="";
																$nameee = "upd_marital_status".$k;
																if(isset($userdetails) && $userdetails->$nameee=='Unmarried'){
																	$unmarriedSelected ="selected";
																}else if(isset($userdetails) && $userdetails->$nameee=='Married'){
																	$marriedSelected ="selected";
																}
															?>
															<option <?php echo $unmarriedSelected; ?> value="Unmarried">Unmarried</option>
															<option <?php echo $marriedSelected; ?> value="Married">Married</option>
														</select> 
														<input type="hidden" id="upd_brother<?php echo $k; ?>_profession" name="upd_brother<?php echo $k; ?>_profession" value="">
													</div>
												</div>										
											<?php } ?>
										</div>
									</div>
								</span>									
							</span>
							<!-- Sisters Starts -->
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<select id="upd_noofsisters" name="upd_noofsisters" class="custom-select" onChange="rowsadded('sisters')">
										<option value="">No of Sisters</option>
										<?php 
											for($j=0;$j<=5;$j++) { 
												$selected = "";
												if(isset($userdetails) && $userdetails->upd_noofsisters==$j){
													$selected = "selected";
												}
												$sispadding = str_pad($j, 2, "0", STR_PAD_LEFT); ?>
											<option <?php echo $selected; ?> value="<?php echo $j; ?>"><?php echo $sispadding; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<?php 
								$sstyledisplaynone ="display:none;";
								if(isset($userdetails) && $userdetails->upd_noofsisters==0){
									$sstyledisplaynone ="display:none;";
								}else{
									$sstyledisplaynone ="";
								}
							?>
							<span id="isHasSisters" style="<?php echo $sstyledisplaynone; ?>">
								<span id="sisterss_div">
									<div class="col-md-12">
										<div class="row">
											<?php $updNoofsisters = (isset($userdetails))?$userdetails->upd_noofsisters:''; 
											for($l=1;$l<=$updNoofsisters;$l++){ ?>
													<input type="hidden" id="upd_sistername<?php echo $l; ?>" name="upd_sistername<?php echo $l; ?>" value="">
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<select id="upd_sister_elder_younger<?php echo $l; ?>" name="upd_sister_elder_younger<?php echo $l; ?>" class="custom-select">
															<?php 
																$elderSelected ="";
																$youngerSelected ="";
																$namee = "upd_sister_elder_younger".$l;
																if(isset($userdetails) && $userdetails->$namee=='Elder'){
																	$elderSelected ="selected";
																}else if(isset($userdetails) && $userdetails->$namee=='Younger'){
																	$youngerSelected ="selected";
																}
															?>
																<option <?php echo $elderSelected; ?> value="Elder">Elder</option>
																<option <?php echo $youngerSelected; ?> value="Younger">Younger</option>
															</select>
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group">
															<select id="upd_sister_marital_status<?php echo $l; ?>" name="upd_sister_marital_status<?php echo $l; ?>" class="custom-select">
																<?php 
																	$unmarriedSelected ="";
																	$marriedSelected ="";
																	$name = "upd_sister_marital_status".$l;
																	if(isset($userdetails) && $userdetails->$name=='Unmarried'){
																		$unmarriedSelected ="selected";
																	}else if(isset($userdetails) && $userdetails->$name=='Married'){
																		$marriedSelected ="selected";
																	}
																?>
																<option <?php echo $unmarriedSelected; ?> value="Unmarried">Unmarried</option>
																<option <?php echo $marriedSelected; ?> value="Married">Married</option>
															</select> 
														</div>
													</div>
													<input type="hidden" id="upd_sister<?php echo $l; ?>_profession" name="upd_sister<?php echo $l; ?>_profession" value="">
											<?php } ?>
										</div>
									</div>
								</span>				
							</span>
						<!-- Sisters Ends -->						
						</div>
					<!-- Fields Ends --> 
					</div>
				<!-- Family Details Ends -->
				<!-- Prefered Partner Details Starts -->
					<div class="col-lg-6 col-sm-12">
					<!-- Heading Starts -->
						<h4 class="my-4 text-weight-semi-bold text-color-brand">Prefered Partner Details</h4>
					<!-- Heading Ends -->
					<!-- Fields Starts -->
						<div class="row">
						<!-- Age Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="text-weight-medium">Age</label>
									<div class="d-flex justify-content-between">
										<select required name="uppd_from_age" id="uppd_from_age" class="custom-select alt-1">
											<?php 
												for($i=18;$i<=50;$i++){ 
													$eselected = "";
													if(isset($userdetails) && $userdetails->uppd_from_age==$i){
														$eselected = "selected";
													}
											?>
												<option <?php echo $eselected; ?> value="<?php echo $i; ?>"><?php echo $i;?></option>
											<?php } ?>
										</select>
										<select required name="uppd_to_age" id="uppd_to_age" class="custom-select alt-1 ml-2">
											<?php 
												for($z=18;$z<=50;$z++){ 
													$esselected = "";
													if(isset($userdetails) && $userdetails->uppd_to_age==$z){
														$esselected = "selected";
													}											
											?>
											<option <?php echo $esselected; ?> value="<?php echo $z; ?>"><?php echo $z;?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						<!-- Age Ends -->
						<!-- Height Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label class="text-weight-medium">Height</label>
									<div class="d-flex justify-content-between">
										<select name="uppd_from_height" id="uppd_from_height" class="custom-select alt-1">
											<option value="">From</option>
											<?php if(isset($heightslist) && !empty($heightslist) && count($heightslist)>0){ foreach($heightslist as $height){ 
												$selectedheight= "";
												if(isset($userdetails) &&  $height->heightvalue==$userdetails->uppd_from_height){
													$selectedheight= "selected";
												}
											?>
											<option <?php echo $selectedheight; ?> value="<?php echo $height->heightvalue; ?>"><?php echo ucfirst($height->heightvalue); ?></option>
											<?php } } ?>
										</select>
										<select name="uppd_to_height" id="uppd_to_height" class="custom-select alt-1 mx-2">
											<option value="">To</option>
											<?php if(isset($heightslist) && !empty($heightslist) && count($heightslist)>0){ foreach($heightslist as $height){ 
												$selectedheight= "";
												if(isset($userdetails) && $height->heightvalue==$userdetails->uppd_to_height){
													$selectedheight= "selected";
												}
											?>
											<option <?php echo $selectedheight; ?> value="<?php echo $height->heightvalue; ?>"><?php echo ucfirst($height->heightvalue); ?></option>
											<?php } } ?>
										</select>
									</div>
								</div>
							</div>
						<!-- Height Ends -->
						<!-- Qualification Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<input required type="text" name="uppd_qualification" id="uppd_qualification" value="<?php if(isset($userdetails) > 0 ) echo $userdetails->uppd_qualification; ?>" class="form-control animation rounded-2" placeholder="Qualification">
									<span id="error_uppd_qualification" style="color:red"></span>
								</div>
							</div>
						<!-- Qualification Ends -->
						<!-- Profession Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select id="uppd_profession" name="uppd_profession" class="custom-select">
										<option value="select">Profession</option>										
										<?php if(isset($professionslist) && !empty($professionslist) && count($professionslist)>0){ foreach($professionslist as $profession){ 
											$psSelected = "";
											if(isset($userdetails) && $profession->professiondisplayid==$userdetails->uppd_profession){
												$psSelected = "selected";
											}															
										?>
										<option <?php echo $psSelected; ?> value="<?php echo $profession->professiondisplayid.'-'.ucfirst($profession->professionname); ?>"><?php echo ucfirst($profession->professionname); ?></option>
										<?php } } ?>										
									</select>
								</div>
							</div>
						<!-- Profession Ends -->
						<!-- Eating Habits Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select required name="profile-partner-eating-habits" id="profile-partner-eating-habits" class="custom-select">
										<?php
											$vegSelect ="";
											$nonvegSelect ="";
											$eggSelect ="";
											if(isset($userdetails) && $userdetails->uppd_eating_habits=='Vegetarian'){
												$vegSelect ="selected";
											}else if(isset($userdetails) && $userdetails->uppd_eating_habits=='Non Vegetarian'){
												$nonvegSelect ="selected";
											}else if(isset($userdetails) && $userdetails->uppd_eating_habits=='Egg'){
												$eggSelect ="selected";
											}
										?>
										<option <?php echo $vegSelect; ?> value="Vegetarian">Vegetarian</option>
										<option <?php echo $nonvegSelect; ?> value="Non Vegetarian">Non Vegetarian</option>
										<option <?php echo $eggSelect; ?> value="Egg">Egg</option>
									</select>
								</div>
							</div>
						<!-- Eating Habits Ends -->
						<!-- Area Starts -->
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<select id="uppd_stateid" name="uppd_stateid" class="custom-select">
										<option value="">Area</option>
										<?php if(isset($areaslist) && !empty($areaslist) && count($areaslist)>0){ foreach($areaslist as $area){ 
											$aselected = "";
											if(isset($userdetails) && $area->areadisplayid==$userdetails->uppd_stateid){
												$aselected = "selected";
											}
										?>
										<option <?php echo $aselected; ?> value="<?php echo $area->areadisplayid.'-'.ucfirst($area->areaname); ?>"><?php echo ucfirst($area->areaname); ?></option>
										<?php } } ?>
									</select>
								</div>
							</div>
						<!-- Area Ends -->
						<!-- Any Other Requirements Starts -->
							<div class="col-sm-12">
								<div class="form-group">
									<textarea rows="4" class="form-control animation rounded-2" id="uppd_other_requirement" name="uppd_other_requirement" placeholder="Other requirement"><?php if(isset($userdetails) > 0 ) echo $userdetails->uppd_other_requirement; ?></textarea>
								</div>
							</div>
							<!-- Any Other Requirements Ends -->							
							<!-- Upload Starts -->
							<?php 
								$urd_profile_pic ="";
								$requiredst ="required";
								if(isset($userdetails) && $userdetails->urd_profile_pic!=""){
									$urd_profile_pic = $userdetails->urd_profile_pic;
									$requiredst ="";
								}
							?>
							<?php
								$mchecked ="";
								if(isset($userdetails) && $userdetails->urd_profilepic_is_published==1){
									$mchecked ="checked";
								}												
							?>
							<div class="col-md-6 col-sm-12"><div class="form-group">
								<h4 class="my-4 text-weight-semi-bold text-color-brand">Upload Profile Pic</h4>
							</div></div>
							<input type="hidden" name="h_urd_profile_pic" id="h_urd_profile_pic" value="<?php echo $urd_profile_pic; ?>">
							<div class="col-lg-9 col-sm-12">
								<div class="form-group mt-md-3">
									<div class="custom-file">
										<input <?php echo $requiredst; ?> type="file" name="urd_profile_pic" class="custom-file-input" id="urd_profile_pic">
										<label class="custom-file-label" for="customFile">Upload Photo</label>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-12">
								<div class="form-group mt-md-3">
									<div class="custom-file">
										<?php if($urd_profile_pic!=""){	?>
											<a href="javascript:void(0);" onclick="viewprofile();"><h6 class="text-weight-semi-bold">View Profile</h6></a>
										<?php }	?>		 						
									</div>
								</div>
							</div>	
							<div class="modal fade" id="user_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-body mb-0 p-0">
											<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
											<img src="<?php echo base_url().'userpics/'.$urd_profile_pic;?>" style="width:500px;height:auto;margin-top:-50%;" >
											</div>
										</div>
										<div class="modal-footer justify-content-center">
											<button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						<!-- Upload Ends -->
						<!-- Are you Willing Starts -->
							<div class="col-lg-12 col-sm-12">
								<div class="form-group pt-md-2 mt-md-3">
									<div class="custom-control-inline">
										<label class="text-weight-medium">
											Are You Willing to put your 'PHOTOGRAPH' on Website
										</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input <?php echo $mchecked; ?> type="checkbox" id="urd_profilepic_is_published" name="urd_profilepic_is_published">
									</div>
								</div>
							</div>
						<!-- Are you Willing Ends -->							
						</div>
					<!-- Fields Ends -->
					</div>
				<!-- Prefered Partner Details Ends -->				
				</div>
			<!-- Nested Row Ends -->
			<!-- Declaration Starts -->
				<div class="profile-form-declaration rounded-2 mt-lg-5 mb-5">
					<span class="text-big-2">Do you wish to pay donation? : <input class="" name="payment_check" type="checkbox" id="payment_check"></span>
					<div id="trans_box" style="display:none">
						Please Pay Donation via Paytm/PhonePay/Gpay to Mobile Number 8008672640 Siva Sankar Munnangi and share transaction number in below box.
						<input type="text" value="" placeholder="Please enter transaction number" class="form-control" name='transaction_number'>
					</div>
				</div>
				<div class="profile-form-declaration rounded-2 mt-lg-5 mb-5">
				<!-- Terms Starts -->
					<div class="custom-control custom-checkbox">
						<input class="" checked name="user_isagree" type="checkbox" id="user_isagree" required>
							  <span class="text-big-2">  I declare that the particulars furnished above are true to the best of my knowledge and agree that our familiy responsibility to make enquiry about the other party before the alliance is settled.</span>
					<!-- Submit Button Starts -->
						<p class="mt-3" id="submit_btn">
							<button type="submit" class="btn btn-main btn-style-2 text-weight-semi-bold text-big-2 animation rounded-2" onClick="editformvalidate();"><?php if(isset($userdetails)) echo "Update Profile"; else echo "Register Profile";?></button>
						</p>
						<p class="mt-3" id="process_btn" style="display:none;">
							<button type="button" class="btn btn-main btn-style-2 text-weight-semi-bold text-big-2 animation rounded-2">Process</button>
						</p>
					<!-- Submit Button Ends -->
					</div>
				<!-- Terms Ends -->
				</div>
			<!-- Declaration Ends -->
			</form>
		<!-- Profile Form Ends -->
		</div>
	<!-- Main Container Ends -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" type="text/javascript"></script>
<script>
	function viewprofile(){
		$("#user_image_modal").modal('show');
	}
	function editformvalidate(){
		$("#edit_profile").validate();
		var ddyear  = $("#upi_dateofbirth_year").val();
		var ddmonth = $("#upi_dateofbirth_month").val();
		var dddate  = $("#upi_dateofbirth_date").val();
		var upi_age = $("#upi_age").val();
		var sud_dob = ddyear+"-"+ddmonth+"-"+dddate;
		$("#upi_dateofbirth").val(sud_dob);
		var age = getAge(sud_dob);
		if( age < 0 )
		{
			age = 0;
		}
		if(age>50){
			$('#upi_dateofbirth').val("");
			$("#upi_age").val("");
			$("#age_validation").html('The age cannot be more than 100.');
		}else if(age == 0){
			$("#age_validation").html('The age must be minimum 15 years');
			$("#upi_age").val(age);
		}else if(parseInt(age) < 15){
			$("#age_validation").html('The age must be minimum 15 years');
			$("#upi_age").val(age);
		}else{
			$("#age_validation").html('');
			$("#upi_age").val(age);
		}
		
		 var fi = document.getElementById('urd_profile_pic'); 
		// Check if any file is selected. 
		if (fi.files.length > 0) { 
			for (var i = 0; i <= fi.files.length - 1; i++) { 
  				var fsize = fi.files.item(i).size; 
				var file = Math.round((fsize / 1024)); 
				// The size of the file. 
				if (file > 1024) { 
					alert("The file size must be less than 1mb"); return false;
				} 
			} 
		} 
		
		$("#edit_profile").submit();
	}
	function getAge(birth) {
	   var today = new Date();
	   var curr_date = today.getDate();
	   var curr_month = today.getMonth() + 1;
	   var curr_year = today.getFullYear();

	   var pieces = birth.split('-');
	   // console.log(pieces);
	   var birth_date = pieces[2];
	   var birth_month = pieces[1];
	   var birth_year = pieces[0];

	   if (curr_month == birth_month && curr_date >= birth_date) return parseInt(curr_year-birth_year);
	   if (curr_month == birth_month && curr_date < birth_date) return parseInt(curr_year-birth_year-1);
	   if (curr_month > birth_month) return parseInt(curr_year-birth_year);
	   if (curr_month < birth_month) return parseInt(curr_year-birth_year-1);
	}
	function rowsadded(type){
		if(type=="brothers"){
			var updnoofbrothers = $("#upd_noofbrothers").val();
			if(updnoofbrothers!=0){	
				// $("#brothers_div").html("");
				var html = "";
				html +='<div class="col-md-12"><div class="row">';			
				for(var i=1; i<=updnoofbrothers;i++){
					var upd_elder_younger = $("#upd_elder_younger"+i).val();
					var ey1 = '';
					var ey2 = '';
					if(upd_elder_younger=='Elder'){
						ey  ='selected';
					}else if(upd_elder_younger=='Younger'){
						ey2 ='selected'
					}
					var upd_marital_status = $("#upd_marital_status"+i).val(); 
					var eym1 = '';
					var eyum2 = '';
					if(upd_marital_status=='Unmarried'){
						eym1  ='selected';
					}else if(upd_marital_status=='Married'){
						eyum2 ='selected'
					}
					html +='<input type="hidden" id="upd_brothername'+i+'" name="upd_brothername'+i+'" value=""><div class="col-md-6 col-sm-12"><div class="form-group"><select  id="upd_elder_younger'+i+'" name="upd_elder_younger'+i+'" class="custom-select"><option '+ey1+' value="Elder">Elder</option><option value="Younger" '+ey2+'>Younger</option></select></div></div><div class="col-md-6 col-sm-12"><div class="form-group"><select id="upd_marital_status'+i+'" name="upd_marital_status'+i+'" class="custom-select"><option '+eym1+' value="Unmarried">Unmarried</option><option value="Married" '+eyum2+'>Married</option></select></div></div><input type="hidden" id="upd_brother'+i+'_profession" name="upd_brother'+i+'_profession" value="">';
				}
				html +="</div></div>";
				$("#isHasBrothers").show();
				$("#brothers_div").html(html);
			}else{
				$("#isHasBrothers").hide();
				$("#brothers_div").html("");
			}
		}else if(type=="sisters"){
			var updnoofsisters = $("#upd_noofsisters").val();
			if(updnoofsisters!=0){	
				// $("#sisters_div").html("");
				var html = "";
				html +='<div class="col-md-12"><div class="row">';				
				for(var i=1; i<=updnoofsisters;i++){
					var upd_sister_elder_younger = $("#upd_sister_elder_younger"+i).val();
					var ey1 = '';
					var ey2 = '';
					if(upd_sister_elder_younger=='Elder'){
						ey  ='selected';
					}else if(upd_sister_elder_younger=='Younger'){
						ey2 ='selected'
					}
					var upd_sister_marital_status = $("#upd_sister_marital_status"+i).val(); 
					var eym1 = '';
					var eyum2 = '';
					if(upd_sister_marital_status=='Unmarried'){
						eym1  ='selected';
					}else if(upd_sister_marital_status=='Married'){
						eyum2 ='selected'
					}
					html +='<input type="hidden" id="upd_sistername'+i+'" name="upd_sistername'+i+'" value=""><div class="col-md-6 col-sm-12"><div class="form-group"><select id="upd_sister_elder_younger'+i+'" name="upd_sister_elder_younger'+i+'" class="custom-select"><option '+ey1+' value="Elder">Elder</option><option '+ey2+' value="Younger">Younger</option></select></div></div><div class="col-md-6 col-sm-12"><div class="form-group"><select id="upd_sister_marital_status'+i+'" name="upd_sister_marital_status'+i+'" class="custom-select"><option '+eym1+' value="Unmarried">Unmarried</option><option value="Married" '+eyum2+'>Married</option></select></div></div><input type="hidden" id="upd_sister'+i+'_profession" name="upd_sister'+i+'_profession" value="">';
				}
				html +="</div></div>";
				$("#isHasSisters").show();
				$("#sisterss_div").html(html);
			}else{
				$("#isHasSisters").hide();
				$("#sisterss_div").html("");
			}
		}
	}
	$('#payment_check').click(function(){
		if($(this).prop('checked')){
			$('#trans_box').show();
		}else{
			$('#trans_box').hide();
		}
	});
</script>