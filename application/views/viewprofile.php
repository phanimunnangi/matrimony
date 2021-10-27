<!-- Main Menu Ends -->
	<!-- Page Banner Starts -->
		<div class="page-banner">
        <!-- Banner Image Starts -->
            <img src="<?php echo base_url(); ?>assets/images/banners/page-banners/page-banner-img1.jpg" alt="Image" class="img-fluid">
        <!-- Banner Image Ends -->
        <!-- Nested Container Starts -->
            <div class="container px-md-0 text-white text-center d-none d-md-block">
                <h2 class="text-weight-semi-bold">View Profile</h2>
            </div>
        <!-- Nested Container Ends -->
		</div>
	<!-- Page Banner Ends -->
	<!-- Main Container Starts -->
		<div class="main-container container px-md-0">
        <!-- Row Starts -->
            <div class="row">
            <!-- Personal Details Starts -->
                <div class="col-sm-12">
                <!-- Heading Starts -->
                    <h4 class="text-weight-semi-bold text-color-black-1 hs-3 d-flex justify-content-between">
                        <span class="align-self-end">Personal Details</span>
                        <a href="javascript:void(0);" onclick="validateheader();" class="btn btn-1 animation text-big-1 py-2 px-3 text-weight-semi-bold rounded-2">View Profile Image</a>
                    </h4>
                <!-- Heading Ends -->
                <!-- Details List Wrap Starts -->
                    <div class="row">
					<!-- Profile Image Starts -->
						<div class="col-md-3 col-sm-12">
							<p class="mt-lg-4">
						<?php if(isset($userinfo->urd_profilepic_is_published) && $userinfo->urd_profilepic_is_published==0){ ?>
							<img src="<?php echo base_url(); ?>userpics/<?php echo $userinfo->user_profilepic; ?>" alt="<?php echo ucfirst($userinfo->user_display_name); ?>" class="img-fluid">	
						<?php }else{ ?>
							<img src="<?php echo base_url(); ?>userpics/photonot.jpg" alt="<?php echo ucfirst($userinfo->user_display_name); ?>" class="img-fluid">
						<?php } ?>
							</p>
						</div>
					<!-- Profile Image Ends -->
                    <!-- Left Col Starts -->
                        <div class="col-md-4 col-sm-12 mb-3 mb-lg-4">
                            <ul class="list-unstyled pt-3">
                                <li class="row py-1"><strong class="col-5">Reg No :</strong> <span class="col-7"><?php echo $userinfo->user_registeredid; ?></span></li>
                                <li class="row py-1"><strong class="col-5">Name :</strong> <span class="col-7"><?php echo ucfirst($userinfo->user_display_name); ?></span></li>
                                <li class="row py-1"><strong class="col-5">Date of Birth :</strong> <span class="col-7"><?php echo $userinfo->upi_dateofbirth.' '.$userinfo->upi_birth_timings; ?></span></li>
                                <li class="row py-1"><strong class="col-5">Place of Birth :</strong> <span class="col-7"><?php if(isset($userinfo->upi_birthplace) && $userinfo->upi_birthplace!=""){ echo ucfirst($userinfo->upi_birthplace); } ?></span></li>
                                <li class="row py-1"><strong class="col-5">Star, Leg & Raasi :</strong> <span class="col-7"><?php if(isset($userinfo->upi_starname) && $userinfo->upi_starname!=""){ echo ucfirst($userinfo->upi_starname); } ?> <?php if(isset($userinfo->upi_legname) && $userinfo->upi_legname!=""){ echo $userinfo->upi_legname; } ?> <?php if(isset($userinfo->upi_rassiname) && $userinfo->upi_rassiname!=""){ echo ",". ucfirst($userinfo->upi_rassiname); }  ?></span></li>
                                <li class="row py-1"><strong class="col-5">Manglik :</strong> <span class="col-7"><?php if(isset($userinfo->upi_manglik_status) && $userinfo->upi_manglik_status!=""){ echo ucfirst($userinfo->upi_manglik_status); }  ?></span></li>
                                <li class="row py-1"><strong class="col-5">Gothram :</strong> <span class="col-7"><?php if(isset($userinfo->upi_gothram) && $userinfo->upi_gothram!=""){ echo ucfirst($userinfo->upi_gothram); } ?></span></li>
                                <li class="row py-1"><strong class="col-5">Subcaste :</strong> <span class="col-7"><?php if(isset($userinfo->upi_castename) && $userinfo->upi_castename!=""){ echo ucfirst($userinfo->upi_castename); } ?></span></li>
                                <li class="row py-1"><strong class="col-5">Height :</strong> <span class="col-7"><?php if(isset($userinfo->upi_height) && $userinfo->upi_height!=""){ echo $userinfo->upi_height; } ?></span></li>
                            </ul>
                        </div>
                    <!-- Left Col Ends -->
                    <!-- Right Col Starts -->
                        <div class="col-md-5 col-sm-12 mb-3 mb-lg-4">
                            <ul class="list-unstyled pt-3">
                                <li class="row py-1"><strong class="col-5">Marital Status :</strong> <span class="col-7"><?php if(isset($userinfo->upi_maritalstatus) && $userinfo->upi_maritalstatus!=""){ echo ucfirst($userinfo->upi_maritalstatus); }  ?></span></li>
                                <li class="row py-1"><strong class="col-5">Have Children :</strong> <span class="col-7"><?php if(isset($userinfo->upi_noofchilderns) && $userinfo->upi_noofchilderns!=""){ echo ucfirst($userinfo->upi_noofchilderns); }  ?></span></li>
                                <li class="row py-1"><strong class="col-5">No. of Children :</strong> <span class="col-7"><?php if(isset($userinfo->upi_noofchilderns) && $userinfo->upi_noofchilderns!=""){ echo ucfirst($userinfo->upi_noofchilderns); }  ?></span></li>   
								<li class="row py-1"><strong class="col-5">Living Together :</strong> <span class="col-7"><?php if(isset($userinfo->upi_livingtogether) && $userinfo->upi_livingtogether!=""){ echo ucfirst($userinfo->upi_livingtogether); }  ?></span></li>
                                <li class="row py-1"><strong class="col-5">Complexion :</strong> <span class="col-7"><?php if(isset($userinfo->upi_complexion) && $userinfo->upi_complexion!=""){ echo ucfirst($userinfo->upi_complexion); }  ?></span></li>
								<?php if(isset($userinfo->user_gender) && $userinfo->user_gender=="male"){ ?>
									<li class="row py-1"><strong class="col-5">Will to marry widow :</strong> <span class="col-7"><?php if(isset($userinfo->upi_will_to_marry_widow) && $userinfo->upi_will_to_marry_widow!=""){ echo ucfirst($userinfo->upi_will_to_marry_widow); }  ?></span></li>
								<?php } ?>
                                <li class="row py-1"><strong class="col-5">Nri Living Country :</strong> <span class="col-7"><?php if(isset($userinfo->upi_nri_living_country_name) && $userinfo->upi_nri_living_country_name!=""){ echo ucfirst($userinfo->upi_nri_living_country_name); }  ?></span></li>
								<!--
                                <li class="row py-1"><strong class="col-5">Nri City :</strong> <span class="col-7">Not available</span></li>
								-->
                                <li class="row py-1"><strong class="col-5">Physical Disability :</strong> <span class="col-7"><?php if(isset($userinfo->upi_physicaldisability) && $userinfo->upi_physicaldisability!=""){ echo ucfirst($userinfo->upi_physicaldisability); }  ?></span></li>
                            </ul>
                        </div>
					<!-- Right Col Ends -->
                    </div>
                <!-- Details List Wrap Ends -->
                </div>
            <!-- Personal Details Ends -->
            <!-- Communication Details Starts -->
                <div class="col-md-6 col-sm-12 mb-3 mb-lg-4">
                <!-- Heading Starts -->
                    <h4 class="text-weight-semi-bold text-color-black-1 hs-3">Communication Details</h4>
                <!-- Heading Ends -->
                <!-- Details List Starts -->
                    <ul class="list-unstyled pt-3">
					<?php if(isset($userinfo->urd_email_is_published) && $userinfo->urd_email_is_published==0){ ?>
                        <li class="row py-1"><strong class="col-5">Email :</strong> <span class="col-7"><?php if(isset($userinfo->urd_email) && $userinfo->urd_email!=""){ echo $userinfo->urd_email; }  ?></span></li>
					<?php }else{ ?>
						 <li class="row py-1"><strong class="col-5">Email :</strong> <span class="col-7"><a href="javascript:void(0);" onClick="verifyuser();">Click Here</a></span></li>
					<?php } ?>
					<?php if(isset($userinfo->urd_primarycontactnumber_is_published) && $userinfo->urd_primarycontactnumber_is_published==0){ ?>
                        <li class="row py-1"><strong class="col-5">Contact Numbers:</strong> <span class="col-7"><?php if(isset($userinfo->urd_primaryconactnumber) && $userinfo->urd_primaryconactnumber!=""){ echo ucfirst($userinfo->urd_primaryconactnumber); }  ?>, <?php if(isset($userinfo->urd_contactnumber) && $userinfo->urd_contactnumber!=""){ echo ucfirst($userinfo->urd_contactnumber); }  ?>, <?php if(isset($userinfo->urd_landlinenumber) && $userinfo->urd_landlinenumber!=""){ echo ucfirst($userinfo->urd_landlinenumber); }  ?> </span></li>
					<?php }else{ ?>
						 <li class="row py-1"><strong class="col-5">Contact Numbers:</strong> <span class="col-7"><a href="javascript:void(0);" onClick="verifyuser();">Click Here</a></span></li>
					<?php } ?>                        
                       <li class="row py-1"><strong class="col-5">Native District :</strong> <span class="col-7"><?php if(isset($userinfo->urd_native_district) && $userinfo->urd_native_district!=""){ echo ucfirst($userinfo->urd_native_district); }  ?></span></li>
                        <li class="row py-1"><strong class="col-5">Residence Type: </strong> <span class="col-7"><?php if(isset($userinfo->urd_communication_resident_type) && $userinfo->urd_communication_resident_type!=""){ echo ucfirst($userinfo->urd_communication_resident_type); }  ?></span></li>
						<?php if(isset($userinfo->urd_communication_address_is_published) && $userinfo->urd_communication_address_is_published==0){ ?>
							<li class="row py-1"><strong class="col-5">Communication Address: </strong> <span class="col-7"><?php if(isset($userinfo->urd_communication_address) && $userinfo->urd_communication_address!=""){ echo ucfirst($userinfo->urd_communication_address); }  ?></span></li>
						<?php }else{ ?>
							<li class="row py-1"><strong class="col-5">Communication Address:</strong> <span class="col-7"><a href="javascript:void(0);" onClick="verifyuser();">Click Here</a></span></li>
						<?php } ?>
                    </ul>
                <!-- Details List Ends -->
                </div>
            <!-- Communication Details Ends -->
            <!-- Communication Details Starts -->
                <div class="col-md-6 col-sm-12 mb-3 mb-lg-4">
                <!-- Heading Starts -->
                    <h4 class="text-weight-semi-bold text-color-black-1 hs-3">Education Details</h4>
                <!-- Heading Ends -->
                <!-- Details List Starts -->
                    <ul class="list-unstyled pt-3">
						<li class="row py-1"><strong class="col-5">Education Qualification :</strong> <span class="col-7"><?php if(isset($userinfo->ued_education_qualifications) && $userinfo->ued_education_qualifications!=""){ echo ucfirst($userinfo->ued_education_qualifications); }  ?></span></li>
						<li class="row py-1"><strong class="col-5">Profession Name :</strong> <span class="col-7"><?php if(isset($userinfo->ued_profession_name) && $userinfo->ued_profession_name!=""){ echo ucfirst($userinfo->ued_profession_name); }  ?></span></li>
						<li class="row py-1"><strong class="col-5">Place Work :</strong> <span class="col-7"><?php if(isset($userinfo->ued_place_work) && $userinfo->ued_place_work!=""){ echo ucfirst($userinfo->ued_place_work);} ?></span></li>
                    </ul>
                <!-- Details List Ends -->
                </div>
            <!-- Communication Details Ends -->
            <!-- Family Details Starts -->
                <div class="col-md-6 col-sm-12 mb-3 mb-lg-4">
                <!-- Heading Starts -->
                    <h4 class="text-weight-semi-bold text-color-black-1 hs-3">Family Details</h4>
                <!-- Heading Ends -->
                <!-- Details List Starts -->
                    <ul class="list-unstyled pt-3">
                        <li class="row py-1"><strong class="col-5">Father's Name: </strong> <span class="col-7"><?php if(isset($userinfo->upd_fathername) && $userinfo->upd_fathername!=""){ echo ucfirst($userinfo->upd_fathername);} ?></span></li>
                        <li class="row py-1"><strong class="col-5">Qualification & Profession: </strong> <span class="col-7"><?php if(isset($userinfo->upd_father_profession) && $userinfo->upd_father_profession!=""){ echo ucfirst($userinfo->upd_father_profession);} ?></span></li>
                        <li class="row py-1"><strong class="col-5">Mother's Name::</strong> <span class="col-7"><?php if(isset($userinfo->upd_mothername) && $userinfo->upd_mothername!=""){ echo ucfirst($userinfo->upd_mothername);} ?></span></li>
                        <li class="row py-1"><strong class="col-5">Qualification & Profession:</strong> <span class="col-7"><?php if(isset($userinfo->upd_mother_profession) && $userinfo->upd_mother_profession!=""){ echo ucfirst($userinfo->upd_mother_profession);} ?></span></li>
						<?php 
							$updNoofbrothers = $userinfo->upd_noofbrothers;
							$marriedcount=0;
							$unmarriedcount=0;
							for($k=1;$k<=$updNoofbrothers;$k++){
								$unmarriedSelected ="";
								$marriedSelected ="";
								$nameee = "upd_marital_status".$k;
								if($userinfo->$nameee=='Unmarried'){
									$marriedcount++;
								}else if($userinfo->$nameee=='Married'){
									$unmarriedcount++;
								}
							}					
						?>
     <li class="row py-1"><strong class="col-5">Brother's :</strong> <span class="col-7"><?php if(isset($userinfo->upd_noofbrothers) && $userinfo->upd_noofbrothers!=""){ echo $userinfo->upd_noofbrothers; echo "&nbsp;&nbsp;&nbsp;";  echo $marriedcount.' Married'; echo "&nbsp;&nbsp;&nbsp;"; echo $unmarriedcount.' Unmarried'; } ?> </span></li>
						<?php 
							$updNoofsisters = $userinfo->upd_noofsisters;
							$marriedcount=0;
							$unmarriedcount=0;
							for($k=1;$k<=$updNoofsisters;$k++){
								$unmarriedSelected ="";
								$marriedSelected ="";
								$nameee = "upd_sister_marital_status".$k;
								if($userinfo->$nameee=='Unmarried'){
									$marriedcount++;
								}else if($userinfo->$nameee=='Married'){
									$unmarriedcount++;
								}
							}					
						?>
						
	<li class="row py-1"><strong class="col-5">Sister's :</strong> <span class="col-7"><?php if(isset($userinfo->upd_noofsisters) && $userinfo->upd_noofsisters!=""){ echo $userinfo->upd_noofsisters; echo "&nbsp;&nbsp;&nbsp;";  echo $marriedcount.' Married'; echo "&nbsp;&nbsp;&nbsp;"; echo $unmarriedcount.' Unmarried'; } ?></span></li>
                    </ul>
                <!-- Details List Ends -->
                </div>
            <!-- Family Details Ends -->
            <!-- Preferred Details Starts -->
                <div class="col-md-6 col-sm-12 mb-3 mb-lg-4">
                <!-- Heading Starts -->
                    <h4 class="text-weight-semi-bold text-color-black-1 hs-3">Preferred Details</h4>
                <!-- Heading Ends -->
                <!-- Details List Starts -->
                    <ul class="list-unstyled pt-3">
                        <li class="row py-1"><strong class="col-5">Age:</strong> <span class="col-7">From <?php if(isset($userinfo->uppd_from_age) && $userinfo->uppd_from_age!=""){ echo $userinfo->uppd_from_age;} ?> To <?php if(isset($userinfo->uppd_to_age) && $userinfo->uppd_to_age!=""){ echo $userinfo->uppd_to_age;} ?></span></li>
                        <li class="row py-1"><strong class="col-5">Qualification:</strong> <span class="col-7"><?php if(isset($userinfo->uppd_qualification) && $userinfo->uppd_qualification!=""){ echo ucfirst($userinfo->uppd_qualification);} ?></span></li>
                        <li class="row py-1"><strong class="col-5">Professionname:</strong> <span class="col-7"><?php if(isset($userinfo->uppd_professionname) && $userinfo->uppd_professionname!=""){ echo ucfirst($userinfo->uppd_professionname);} ?></span></li>
                        <li class="row py-1"><strong class="col-5">Eating Habits:</strong> <span class="col-7"><?php if(isset($userinfo->uppd_eating_habits) && $userinfo->uppd_eating_habits!=""){ echo ucfirst($userinfo->uppd_eating_habits);} ?></span></li>
                        <li class="row py-1"><strong class="col-5">Area:</strong> <span class="col-7"><?php if(isset($userinfo->uppd_area) && $userinfo->uppd_area!=""){ echo ucfirst($userinfo->uppd_area);} ?></span></li>
                    </ul>
                <!-- Details List Ends -->
                </div>
            <!-- Preferred Details Ends -->
            </div>
        <!-- Row Ends -->
		</div>
	<!-- Main Container Ends -->
<div class="modal fade" id="eevalidationPop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">		
		<h3 class="modal-title requiedstatus" id="profileview">
			Profile Image View
		</h3>
		<button type="button" class="close" onClick="closewindowform();" title="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <?php 
		// echo "<pre>";print_r($userinfo);exit;
	  ?>
	  <div class="modal-body">
			<!-- Profile Image Starts -->
			<div class="col-sm-12">
				<p class="mt-lg-4">
			<?php if(isset($userinfo->urd_profilepic_is_published) && $userinfo->urd_profilepic_is_published==0){ ?>
				<img src="<?php echo base_url(); ?>userpics/<?php echo $userinfo->user_profilepic; ?>" alt="<?php echo ucfirst($userinfo->user_display_name); ?>" class="img-fluid">	
			<?php }else{ ?>
				<img src="<?php echo base_url(); ?>userpics/photonot.jpg" alt="<?php echo ucfirst($userinfo->user_display_name); ?>" class="img-fluid">
			<?php } ?>
				</p>
			</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" onClick="closewindowform();">Ok</button>
	  </div>
	</div>
  </div>
</div>