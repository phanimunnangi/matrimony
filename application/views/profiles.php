<!-- Page Banner Starts -->
		<div class="page-banner">
        <!-- Banner Image Starts -->
            <img src="<?php echo base_url(); ?>assets/images/banners/page-banners/page-banner-img1.jpg" alt="Image" class="img-fluid">
        <!-- Banner Image Ends -->
        <!-- Nested Container Starts -->
            <div class="container px-md-0 text-white text-center d-none d-md-block" style="bottom:50%;">
                <h2 class="text-weight-semi-bold"><?php echo $page_title; ?></h2>
            </div>
        <!-- Nested Container Ends -->
		</div>
	<!-- Page Banner Ends -->
	
	<!-- Profile Search Starts -->
		<div class="container px-md-0">
			<div class="profile-search rounded-5">
			<!-- Title Starts -->
				<h3 class="text-weight-semi-bold text-color-brand mb-md-4">Start Your Search</h3>
			<!-- Title Ends -->
			<!-- Form Starts -->
				<form class="form-row align-items-center justify-content-lg-between" id="search_form" name="search_form">
				<!-- Gender Starts -->
					<div class="col-auto profile-search-col mr-md-3">
						<h6 class="text-weight-normal">Gender</h6>
						<select class="custom-select" id="gender_search" name="gender_search">
							<option value="">Select</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
				<!-- Gender Ends -->
				<!-- Age Starts -->
					<div class="col-auto profile-search-col">
						<h6 class="text-weight-normal">Age</h6>
						<select class="custom-select" id="from_search" name="from_search">
							<?php for($i=18;$i<=50;$i++){ ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-auto profile-search-col">
						<h6 class="text-weight-normal d-none d-sm-block">&nbsp;</h6>
						<h6 class="pt-md-2">To</h6>
					</div>
					<div class="col-auto profile-search-col">
						<h6 class="text-weight-normal d-none d-sm-block">&nbsp;</h6>
						<select class="custom-select" id="to_search" name="to_search">
							<?php for($i=18;$i<=50;$i++){ ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
					</div>
				<!-- Age Ends -->
				<!-- Qualification Starts -->
					<div class="col-auto profile-search-col ml-md-3">
						<h6 class="text-weight-normal">Professions</h6>
						<select class="custom-select" id="profession_search" name="profession_search">
							<option selected value="">Select</option>
							<?php if(isset($professionslist) && count($professionslist)>0) { foreach($professionslist as $professions){ ?>
								<option value="<?php echo $professions->professiondisplayid; ?>"><?php echo ucfirst($professions->professionname); ?></option>
							<?php } } ?>
						</select>
					</div>
				<!-- Qualification Ends -->
				<!-- Sub Caste Starts -->
				<!--<input type="hidden" id="caste_search" name="caste_search" value="">-->
					<div class="col-auto profile-search-col ml-md-3">
						<h6 class="text-weight-normal">Sub Castes</h6>
						<select class="custom-select" id="caste_search" name="caste_search">
							<option value="">Select </option>
							<?php if(isset($subcasteslist) && count($subcasteslist)>0) { foreach($subcasteslist as $subcaste){ ?>
								<option value="<?php echo $subcaste->subcastedisplayid; ?>"><?php echo ucfirst($subcaste->subcastename); ?></option>
							<?php } } ?>
						</select>
					</div>
				<!-- Sub Caste Ends -->
				<!-- OR Starts -->
					<div class="col-auto profile-search-col">
						<h6 class="text-weight-normal d-none d-sm-block">&nbsp;</h6>
						<h6 class="text-weight-semi-bold text-color-brand pt-2">OR</h6>
					</div>
				<!-- OR Ends -->
				<!-- Register ID Starts -->
					<div class="col-auto profile-search-col mr-md-3">
						<h6 class="text-weight-normal">Register ID</h6>
						<input type="text" class="form-control" id="profile_id_search">
					</div>
				<!-- Register ID Ends -->
				<!-- Submit Button Starts -->
					<div class="col-auto profile-search-col">
						<h6 class="text-weight-normal d-none d-sm-block">&nbsp;</h6>
						<button type="button" onClick="searchtoprofilesfun();" class="btn btn-main btn-profile-search animation">Search</button>
					</div>
				<!-- Submit Button Ends -->
				</form>
			<!-- Form Ends -->
			</div>
		</div>
	<!-- Profile Search Ends -->
	
	<!-- Main Container Starts -->
		<div class="main-container container px-md-0">
        <!-- Nested Row Starts -->
            <div class="row">
            <!-- Sidearea Starts -->
                <div class="col-lg-3 col-md-4 col-sm-12">
                <!-- Categories Starts -->
                    <div class="sbox-1 rounded-5 mt-md-2 text-white">
                    <!-- Title Starts -->
                        <h4 class="sbox-1-title text-weight-medium">Categories</h4>
                    <!-- Title Ends -->
                    <!-- List Starts -->
                        <ul class="list-unstyled sbox-1-list-1 mb-0">
							<?php if(isset($maserviceslist) && !empty($maserviceslist) && count($maserviceslist)>0) { foreach($maserviceslist as $service){ ?>
								<li><a href="<?php echo base_url(); ?>services/<?php echo $service->servicemasterseo; ?>"><?php echo ucfirst($service->servicemastername); ?></a></li>
							<?php } } ?>
                        </ul>
                    <!-- List Ends -->
                    </div>
                <!-- Categories Ends -->
                <!-- Banner Starts -->
                    <p><a href="#"><img src="<?php echo base_url(); ?>assets/images/banners/sbanner-img1.jpg" alt="Image" class="img-fluid"></a></p>
                <!-- Banner Ends -->
                </div>
            <!-- Sidearea Ends -->
            <!-- Mainarea Starts -->
                <div class="col-lg-9 col-md-8 col-sm-12 pt-md-2 py-4 py-md-0">
				<?php if(isset($profiles) && !empty($profiles) && count($profiles)>0) { $i=1; foreach($profiles as $profile){ ?>
                <!-- List #1 Starts -->
                    <div class="box-1 alt-1 d-flex rounded-2">
					<!-- Image Starts -->
						<?php
							$user_profilepic ="";
							if($profile->urd_profilepic_is_published==0){
								if($profile->user_profilepic!=""){
									$user_profilepic = $profile->user_profilepic;
									if(file_exists("./userpics/".$user_profilepic)){
										$user_profilepic = $profile->user_profilepic;
									}else{
										$user_profilepic = 'photonot.jpg';
									}
								}else{
									$user_profilepic = 'photonot.jpg';
								}						
							}else{
								$user_profilepic = 'photonot.jpg';
							}						
						?>
						<p class="mb-lg-0">
							<img style="width:80px;" src="<?php echo base_url(); ?>userpics/<?php echo $user_profilepic; ?>" alt="<?php echo ucfirst($profile->user_display_name); ?>">
						</p>
					<!-- Image Ends -->
					<!-- Details Starts -->
						<div class="ml-3 text-small-1">
							<p class="text-weight-semi-bold mb-1 text-big-1"><?php echo ucfirst($profile->user_display_name); ?></p>
							<ul class="list-unstyled row row-cols-1 row-cols-md-2 row-cols-lg-3 ml-0 mb-1">
								<li><strong>Age :</strong> <?php echo $profile->upi_age; ?> years</li>
								<li><strong>Height :</strong> <?php echo $profile->upi_height; ?></li>
								<li><strong>Native District :</strong> <?php echo $profile->urd_native_district; ?> </li>
								<li><strong>Reg No :</strong> <?php echo $profile->user_registeredid; ?></li>
								<li><strong>Education :</strong> <?php echo $profile->ued_education_qualifications; ?></li>
                                <li><strong>Profession :</strong> <?php echo $profile->ued_profession_name; ?> in <?php echo $profile->ued_place_work; ?></li>
                                
                            </ul> 						
                            <ul class="list-unstyled list-inline mb-0 text-small-2">
								<?php if(isset($_SESSION['userGender']) && $_SESSION['userGender']==$profile->user_gender){ 
									$genderF="";
									if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='male'){
										$genderF = "groom";
									}else if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='female'){
										$genderF = "bride";
									}								
								?>
									<li class="list-inline-item"><a href="javascript:void(0);" onClick="pleasecontactadmin(<?php echo $i; ?>,'viewprofile','<?php echo $genderF; ?>');" class="text-weight-semi-bold animation"><i class="fa fa-edit mr-2"></i>View Profile</a></li>
								<?php }else{ ?>
									<li class="list-inline-item">
										<?php if(isset($_SESSION['userId']) && $_SESSION['userId']!=""){?>
											<a href="<?php echo base_url(); ?>viewprofile/<?php echo $profile->user_registeredid; ?>" class="text-weight-semi-bold animation"><i class="fa fa-edit mr-2"></i>View Profile</a>											
										<?php }else{ ?>
											<a href="javascript:void(0);" onClick="checkLoggedornott(<?php echo $i; ?>)" class="text-weight-semi-bold animation"><i class="fa fa-edit mr-2"></i>View Profile</a>
										<?php } ?>
									</li>	
									<?php if(isset($_SESSION['userGender']) && $_SESSION['userGender']!=""){ 
										$profileid = $profile->user_id;
										$userid    = $_SESSION['userId'];
									?>
									<?php $likedStatus = isCheckedUser($userid,$profileid); 
										if($likedStatus==1){ ?>
										<li class="list-inline-item ml-3"><a href="javascript:void(0);" onClick="profileliked(<?php echo $i; ?>,'unlike',<?php echo $userid; ?>,<?php echo $profileid; ?>);" class="text-weight-semi-bold animation"><i class="fa fa-heart mr-2"></i>Profile is Liked</a></li>
									<?php }else{ ?>
										<li class="list-inline-item ml-3"><a href="javascript:void(0);" onClick="profileliked(<?php echo $i; ?>,'like','<?php echo $userid; ?>',<?php echo $profileid; ?>);" class="text-weight-semi-bold animation"><i class="fa fa-heart mr-2"></i>Like Profile</a></li>
									<?php } }else{ ?>
										<li class="list-inline-item ml-3"><a href="javascript:void(0);" onClick="checkLoggedornot('loginrequired');" class="text-weight-semi-bold animation"><i class="fa fa-heart mr-2"></i>Like Profile</a></li>
									<?php } ?>
								<?php } ?>								
                            </ul>
						</div>
					<!-- Details Ends -->
					</div>
					<!-- List #1 Ends -->
					<?php $i++; } }else{ ?>
						<p class="text-weight-medium text-big-2 pt-2 pb-0">No Results</p>
					<?php } ?>
					<!-- Spacer Starts -->
                    <p class="pt-md-1">&nbsp;</p>
					<!-- Spacer Ends -->
					<!-- Pagination Starts -->
                    <nav class="d-flex justify-content-between" aria-label="Page navigation">
						<?php echo $slinks; ?>
						<?php if($totcnt!=0) { ?>
                         <p class="text-weight-medium text-big-2 pt-2 pb-0"><?php echo $pageno; ?> - <?php echo $fpageno; ?> of <?php echo $totcnt; ?> Results</p>
						<?php } ?>
                    </nav>
                <!-- Pagination Ends -->
                </div>
            <!-- Mainarea Ends -->
            </div>
        <!-- Nested Row Ends -->
		</div>
	<!-- Main Container Ends -->