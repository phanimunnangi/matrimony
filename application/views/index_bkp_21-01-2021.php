<!-- Main Slider Starts -->
		<div id="main-slider" class="main-slider carousel slide carousel-fade" data-ride="carousel">
		<!-- Carousel Inner Starts -->
			<div class="carousel-inner">
			<!-- Slide #1 Starts -->
				<div class="carousel-item active">
					<img src="<?php echo base_url(); ?>assets/images/slider/slide-img1.jpg" alt="Image" class="d-block w-100">
					<div class="carousel-caption d-none d-lg-block">
						<h2 class="text-weight-semi-bold">Nayee Brahamana</h2>
        				<h2 class="text-weight-light">Community</h2>
					</div>
				</div>
			<!-- Slide #1 Ends -->
			<!-- Slide #2 Starts -->
				<div class="carousel-item">
					<img src="<?php echo base_url(); ?>assets/images/slider/slide-img2.jpg" alt="Image" class="d-block w-100">
					<div class="carousel-caption d-none d-lg-block">
						<h2 class="text-weight-semi-bold">Exclusively For Nayeebrahmins</h2>
        				<h2 class="text-weight-light">Matrimony & Community Portal</h2>
					</div>
				</div>
			<!-- Slide #2 Ends -->
			</div>
		<!-- Carousel Inner Ends -->
		<!-- Controls Starts -->
			<a class="carousel-control-prev d-none d-sm-block animation" href="#main-slider" role="button" data-slide="prev">
				<i class="fa fa-chevron-left"></i>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next d-none d-sm-block animation" href="#main-slider" role="button" data-slide="next">
				<i class="fa fa-chevron-right"></i>
				<span class="sr-only">Next</span>
			</a>
		<!-- Controls Ends -->
		</div>
	<!-- Main Slider Ends -->
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
		<!-- Intro Section Starts -->
			<ul class="list-unstyled row home-intro">
				<li class="col-lg-4 col-sm-6 col-12">
					<div class="home-intro-col">
						<h5 class="home-intro-sub-title text-weight-normal">Free Matrimony</h5>
						<h4 class="home-intro-title text-weight-semi-bold text-color-brand">Nayee Community</h4>
					</div>
				</li>
				<li class="col-lg-4 col-sm-6 col-12">
					<div class="home-intro-col">
						<h5 class="home-intro-sub-title text-weight-normal">Commnity Information</h5>
						<h4 class="home-intro-title text-weight-semi-bold text-color-blue-1">Community Directory</h4>
					</div>
				</li>
				<li class="col-lg-4 col-sm-6 col-12">
					<div class="home-intro-col">
						<h5 class="home-intro-sub-title text-weight-normal">Expore Your Service</h5>
						<h4 class="home-intro-title text-weight-semi-bold text-color-yellow-1">Promote Profession</h4>
					</div>
				</li>
				
			</ul>
		<!-- Intro Section Ends -->
		<!-- Intro Section #2 Starts -->
			<section class="home-intro-section-2">
			<!-- Nested Row Starts -->
				<div class="row">
				<!-- Content Starts -->
					<div class="col-md-6 col-sm-12">
						<h3 class="text-weight-semi-bold text-color-brand hs-1 alt-1">Nayee Brahamana </br>Community Portal & Matrimony</h3>
						<p class="text-big-2 text-weight-light font-italic">Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dole magna aliqua.</p>
						
					<!--	<h5 class="pt-md-3 text-color-blue-2 text-weight-semi-bold">Why Matrimony APP Community</h5>-->
						<ul class="list-unstyled list-style-1">
							<li class="d-flex">No.1 & most trusted matrimony service for Telugus</li>
							<li class="d-flex">100% verified mobile numbers</li>
							<li class="d-flex">Our largest number of profiles your chances of meeting the right person</li>
							<li class="d-flex">Lakhs of Telugus have found their life partner here</li>
							<li class="d-flex">Trusted service for more than 19 years</li>
						</ul>
						<p class="pt-md-3"><a href="#" class="btn btn-main btn-style-2 animation text-weight-medium text-big-2 rounded-2">Read More</a></p>
					</div>
				<!-- Content Ends -->
				<!-- Image Starts -->
					<div class="col-md-6 col-sm-12">
						<p class="mt-3"><img src="<?php echo base_url(); ?>assets/images/home/home-content-img1.jpg" alt="Image" class="img-fluid rounded-10"></p>
					</div>
				<!-- Image Ends -->
				</div>
			<!-- Nested Row Ends -->
			</section>
		<!-- Intro Section #2 Ends -->
		<!-- Featured Grooms Profile Section Starts -->
			<section class="featured-profile-section-1">
			<!-- Section Title Starts -->
				<h3 class="hs-2 text-weight-semi-bold text-center text-color-brand">Latest Grooms</h3>
			<!-- Section Title Ends -->
			<!-- Grooms Profile Carousel Starts -->
				<div class="featured-carousel-1">
					<?php if(isset($groomuserslist) && count($groomuserslist)>0 ){ $i=0; foreach($groomuserslist as $grooms){ ?>
					<!-- Profile #1 Starts -->
						<div class="featured-profile-item rounded-5">
						<!-- Profile Image Starts -->
							<?php
								$user_profilepic ="";
								if($grooms->urd_profilepic_is_published==0){
									if($grooms->user_profilepic!=""){
										$user_profilepic = $grooms->user_profilepic;
										if(file_exists("./userpics/".$user_profilepic)){
											$user_profilepic = $grooms->user_profilepic;
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
							<div class="featured-profile-item-img text-center">
								<img style="width:260px;height:345px;" src="<?php echo base_url(); ?>userpics/<?php echo $user_profilepic; ?>" alt="<?php echo ucfirst($grooms->user_display_name); ?>" class="img-fluid img-center rounded-tl-tr-5">
							</div>
						<!-- Profile Image Ends -->
						<!-- Profile Body Starts -->
							<div class="featured-profile-item-body text-center">
								<h6 class="text-weight-medium text-color-blue-2"><?php echo ucfirst($grooms->user_display_name); ?></h6>
								<ul class="list-unstyled text-weight-medium">
									<li><span class="text-color-brand">Age</span> : <?php echo $grooms->upi_age.' years'; ?> </li>
									<li><span class="text-color-brand">Height</span> : <?php echo $grooms->upi_height; ?> </li>
									<li>
										<?php 
											
											if($grooms->ued_place_work!=""){
												echo $grooms->ued_place_work;
											}
										?>
									</li>
								</ul>
								<p class="mb-0 clearfix">
									<span class="pt-md-1 text-big-1 text-color-blue-2 text-weight-medium float-md-left">Reg ID: <?php echo $grooms->user_registeredid; ?></span>
								<?php if(isset($_SESSION['userGender']) && $_SESSION['userGender']==$grooms->user_gender){ 
									$genderF="";
									if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='male'){
										$genderF = "groom";
									}else if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='female'){
										$genderF = "bride";
									}								
								?>
									<a href="javascript:void(0);" onClick="pleasecontactadmin(<?php echo $i; ?>,'viewprofile','<?php echo $genderF; ?>');" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>	
								<?php }else{ if(isset($_SESSION['userId']) && $_SESSION['userId']!=""){?>
										<a href="<?php echo base_url(); ?>viewprofile/<?php echo $grooms->user_registeredid; ?>" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>
									<?php }else{ ?>
										<a href="javascript:void(0);" onClick="checkLoggedornott(<?php echo $i; ?>)" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>
									<?php } ?>
								<?php } ?>
								</p>
							</div>
						<!-- Profile Body Ends -->
						</div>
					<!-- Profile #1 Ends -->
					<?php $i++; } } ?>
				</div>
			<!-- Grooms Profile Carousel Ends -->
			</section>
		<!-- Featured Grooms Profile Section Ends -->

		<!-- Featured Brides Profile Section Starts -->
			<section class="featured-profile-section-1">
			<!-- Section Title Starts -->
				<h3 class="hs-2 text-weight-semi-bold text-center text-color-brand">Latest Brides</h3>
			<!-- Section Title Ends -->
			<!-- Bride Profile Carousel Starts -->
				<div class="featured-carousel-1">
					<?php if(isset($brideuserslist) && count($brideuserslist)>0 ){ $i=0; foreach($brideuserslist as $grooms){ ?>
					<!-- Profile #1 Starts -->
						<div class="featured-profile-item rounded-5">
						<!-- Profile Image Starts -->
							<?php
								$user_profilepic ="";
								if($grooms->urd_profilepic_is_published==0){
									if($grooms->user_profilepic!=""){
										$user_profilepic = $grooms->user_profilepic;
										if(file_exists("./userpics/".$user_profilepic)){
											$user_profilepic = $grooms->user_profilepic;
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
							<div class="featured-profile-item-img text-center">
								<img src="<?php echo base_url(); ?>userpics/<?php echo $user_profilepic; ?>" alt="<?php echo ucfirst($grooms->user_display_name); ?>" class="img-fluid img-center rounded-tl-tr-5">
							</div>
						<!-- Profile Image Ends -->
						<!-- Profile Body Starts -->
							<div class="featured-profile-item-body text-center">
								<h6 class="text-weight-medium text-color-blue-2"><?php echo ucfirst($grooms->user_display_name); ?></h6>
								<ul class="list-unstyled text-weight-medium">
									<li><span class="text-color-brand">Age</span> : <?php echo $grooms->upi_age.' years'; ?> </li>
									<li><span class="text-color-brand">Height</span> : <?php echo $grooms->upi_height; ?> </li>
									<li>
										<?php 											
											if($grooms->ued_place_work!=""){
												echo $grooms->ued_place_work;
											}
										?>
									</li>
								</ul>
								<p class="mb-0 clearfix">
									<span class="pt-md-1 text-big-1 text-color-blue-2 text-weight-medium float-md-left">Reg ID: <?php echo $grooms->user_registeredid; ?></span>
								<?php if(isset($_SESSION['userGender']) && $_SESSION['userGender']==$grooms->user_gender){ 
									$genderF="";
									if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='male'){
										$genderF = "groom";
									}else if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='female'){
										$genderF = "bride";
									}								
								?>
									<a href="javascript:void(0);" onClick="pleasecontactadmin(<?php echo $i; ?>,'viewprofile','<?php echo $genderF; ?>');" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>	
								<?php }else{ if(isset($_SESSION['userId']) && $_SESSION['userId']!=""){?>
										<a href="<?php echo base_url(); ?>viewprofile/<?php echo $grooms->user_registeredid; ?>" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>
									<?php }else{ ?>
										<a href="javascript:void(0);" onClick="checkLoggedornott(<?php echo $i; ?>)" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>
									<?php } ?>
								<?php } ?>
								</p>
							</div>
						<!-- Profile Body Ends -->
						</div>
					<!-- Profile #1 Ends -->
					<?php $i++; } } ?>
				</div>
			<!-- Bride Profile Carousel Ends -->
			</section>
		<!-- Featured Brides Profile Section Ends -->
		</div>
	<!-- Main Container Ends -->
	<!-- Home Services Section Starts -->
		<section class="home-services-section text-center text-white parallax">
		<!-- Nested Container Starts -->
			<div class="container px-md-0">
			<!-- Section Title Starts -->
				<h3 class="hs-2 text-white text-weight-semi-bold">Discover Services We Provided</h3>
			<!-- Section Title Ends -->
			<!-- Excerpt Starts -->
				<p class="mb-0">Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dole magna aliqua.</p>
				<p>Ut enim ad minim veniam quis nostrud exercitation.</p>
			<!-- Excerpt Ends -->
			<!-- Services List Starts -->
				<ul class="list-unstyled row home-services-list mb-0">
					<?php 
						if(isset($maserviceslist) && !empty($maserviceslist) && count($maserviceslist)>0){
							$i=1; foreach($maserviceslist as $services){ 
							$servicemasterdisplayid = $services->servicemasterdisplayid;
							$servicemasterwebimage = $services->servicemasterwebimage;
							$servicemastername = ucfirst($services->servicemastername);
					?>
							<li class="col-lg-3 col-md-4 col-sm-6 col-12 home-services-list-item">
								<div class="diamond-shape bg-blue-1 rounded-10 mx-auto"><img src="<?php echo base_url(); ?>servicepics/<?php echo $servicemasterwebimage; ?>" alt="<?php echo ucfirst($servicemastername); ?>"></div>
								<h5 class="text-weight-semi-bold lh-1"><a href="<?php echo base_url(); ?>services/<?php echo $services->servicemasterseo; ?>" class="text-white"><?php echo ucfirst($servicemastername); ?></a></h5>
							</li>								
					<?php
							$i++;
							}							
						}					
					?>
				</ul>
			<!-- Services List Ends -->
			</div>
		<!-- Nested Container Ends -->
		</section>
	<!-- Home Services Section Ends -->
	<!-- Main Container Starts -->
		<div class="main-container container px-md-0">
		<!-- Nested Row Starts -->
			<div class="row">
			<!-- Left Col Starts -->
				<div class="col-md-4 col-sm-12">
				<!-- Title Starts -->
					<h4 class="text-weight-semi-bold text-color-blue-2 hs-1 alt-1">Featured Brides</h4>
				<!-- Title Ends -->
					<?php if(isset($femalehomepageuserprofiles) && count($femalehomepageuserprofiles)>0){ 
						$z=1; foreach($femalehomepageuserprofiles as $femaleprofiles){ ?>
						<div class="box-1 alt-1 d-flex rounded-2">
							<p class="mb-lg-0">
								<?php
								$user_profilepic ="";
								if($femaleprofiles->urd_profilepic_is_published==0){
									if($femaleprofiles->user_profilepic!=""){
										$user_profilepic = $femaleprofiles->user_profilepic;
										if(file_exists("./userpics/".$user_profilepic)){
											$user_profilepic = $femaleprofiles->user_profilepic;
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
								<img class="featuredprofileswidth" src="<?php echo base_url(); ?>userpics/<?php echo $user_profilepic; ?>" alt="<?php echo ucfirst($femaleprofiles->user_display_name); ?>">
							</p>
							<div class="ml-3 text-small-1">
								<p class="text-weight-semi-bold mb-1 text-small-2"><?php echo $femaleprofiles->user_display_name; ?></p>
								<ul class="list-unstyled row row-cols-2 ml-0 mb-1">
									<li><strong>Age :</strong> <?php echo $femaleprofiles->upi_age; ?> years</li>
									<li><strong>Height :</strong> <?php echo $femaleprofiles->upi_height; ?></li>
									<li><strong>Reg No :</strong> <?php echo $femaleprofiles->user_registeredid; ?></li>
									<li><strong>DOB :</strong> <?php echo $femaleprofiles->upi_dateofbirth; ?></li>
								</ul>								
								<p class="mb-0 clearfix">
									<?php if(isset($_SESSION['userGender']) && $_SESSION['userGender']==$femaleprofiles->user_gender){ 
										$genderF="";
										if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='male'){
											$genderF = "groom";
										}else if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='female'){
											$genderF = "bride";
										}								
									?>
									<a href="javascript:void(0);" onClick="pleasecontactadmin(<?php echo $i; ?>,'viewprofile','<?php echo $genderF; ?>');" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>	
									<?php }else{ if(isset($_SESSION['userId']) && $_SESSION['userId']!=""){?>
										<a href="<?php echo base_url(); ?>viewprofile/<?php echo $femaleprofiles->user_registeredid; ?>" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>
									<?php }else{ ?>
										<a href="javascript:void(0);" onClick="checkLoggedornott(<?php echo $i; ?>)" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>
									<?php } ?>										
									<?php } ?>										
								</p>
							</div>
						</div>
					<?php $z++; } } ?>
				</div>
			<!-- Left Col Ends -->
			<!-- Center Col Starts -->
				<div class="col-md-4 col-sm-12">
				<!-- Title Starts -->
					<h4 class="text-weight-semi-bold text-color-blue-2 hs-1 alt-1">Featured Grooms</h4>
					<?php if(isset($malehomepageuserprofiles) && count($malehomepageuserprofiles)>0){ 
						$j=1; foreach($malehomepageuserprofiles as $maleprofiles){ ?>
						<div class="box-1 alt-1 d-flex rounded-2">
							<p class="mb-lg-0">
								<?php
								$user_profilepic ="";
								if($maleprofiles->urd_profilepic_is_published==0){
									if($maleprofiles->user_profilepic!=""){
										$user_profilepic = $maleprofiles->user_profilepic;
										if(file_exists("./userpics/".$user_profilepic)){
											$user_profilepic = $maleprofiles->user_profilepic;
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
								<img class="featuredprofileswidth" src="<?php echo base_url(); ?>userpics/<?php echo $user_profilepic; ?>" alt="<?php echo ucfirst($maleprofiles->user_display_name); ?>">
							</p>
							<div class="ml-3 text-small-1">
								<p class="text-weight-semi-bold mb-1 text-small-2"><?php echo $maleprofiles->user_display_name; ?></p>
								<ul class="list-unstyled row row-cols-2 ml-0 mb-1">
									<li><strong>Age :</strong> <?php echo $maleprofiles->upi_age; ?> years</li>
									<li><strong>Height :</strong> <?php echo $maleprofiles->upi_height; ?></li>
									<li><strong>Reg No :</strong> <?php echo $maleprofiles->user_registeredid; ?></li>
									<li><strong>DOB :</strong> <?php echo $maleprofiles->upi_dateofbirth; ?></li>
								</ul>
								<p class="mb-0">
									<?php if(isset($_SESSION['userGender']) && $_SESSION['userGender']==$maleprofiles->user_gender){ 
										$genderF="";
										if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='male'){
											$genderF = "groom";
										}else if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='female'){
											$genderF = "bride";
										}								
									?>
									<a href="javascript:void(0);" onClick="pleasecontactadmin(<?php echo $i; ?>,'viewprofile','<?php echo $genderF; ?>');" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>	
									<?php }else{ if(isset($_SESSION['userId']) && $_SESSION['userId']!=""){?>
										<a href="<?php echo base_url(); ?>viewprofile/<?php echo $maleprofiles->user_registeredid; ?>" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>
									<?php }else{ ?>
										<a href="javascript:void(0);" onClick="checkLoggedornott(<?php echo $i; ?>)" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>
									<?php } ?>										
									<?php } ?>										
								</p>
							</div>
						</div>
					<?php $j++; } } ?>
				</div>
			<!-- Center Col Ends -->
			<!-- Right Col Starts -->
				<div class="col-md-4 col-sm-12">
				<!-- Title Starts -->
					<h4 class="text-weight-semi-bold text-color-blue-2 hs-1 alt-1">Featured NRI</h4>
					<!-- Title Ends -->
					<?php if(isset($nrihomepageuserprofiles) && count($nrihomepageuserprofiles)>0){ 
						$k=1; foreach($nrihomepageuserprofiles as $nriprofiles){ ?>
						<div class="box-1 alt-1 d-flex rounded-2">
							<p class="mb-lg-0">
								<?php
								$user_profilepic ="";
								if($nriprofiles->urd_profilepic_is_published==0){
									if($nriprofiles->user_profilepic!=""){
										$user_profilepic = $nriprofiles->user_profilepic;
										if(file_exists("./userpics/".$user_profilepic)){
											$user_profilepic = $nriprofiles->user_profilepic;
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
								<img class="featuredprofileswidth" src="<?php echo base_url(); ?>userpics/<?php echo $user_profilepic; ?>" alt="<?php echo ucfirst($nriprofiles->user_display_name); ?>">
							</p>
							<div class="ml-3 text-small-1">
								<p class="text-weight-semi-bold mb-1 text-small-2"><?php echo $nriprofiles->user_display_name; ?></p>
								<ul class="list-unstyled row row-cols-2 ml-0 mb-1">
									<li><strong>Age :</strong> <?php echo $nriprofiles->upi_age; ?> years</li>
									<li><strong>Height :</strong> <?php echo $nriprofiles->upi_height; ?></li>
									<li><strong>Reg No :</strong> <?php echo $nriprofiles->user_registeredid; ?></li>
									<li><strong>DOB :</strong> <?php echo $nriprofiles->upi_dateofbirth; ?></li>
								</ul>
								<p class="mb-0">
									<?php if(isset($_SESSION['userGender']) && $_SESSION['userGender']==$nriprofiles->user_gender){ 
										$genderF="";
										if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='male'){
											$genderF = "groom";
										}else if(isset($_SESSION['userGender']) && $_SESSION['userGender']=='female'){
											$genderF = "bride";
										}								
									?>
									<a href="javascript:void(0);" onClick="pleasecontactadmin(<?php echo $i; ?>,'viewprofile','<?php echo $genderF; ?>');" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>	
									<?php }else{ if(isset($_SESSION['userId']) && $_SESSION['userId']!=""){?>
										<a href="<?php echo base_url(); ?>viewprofile/<?php echo $nriprofiles->user_registeredid; ?>" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>
									<?php }else{ ?>
										<a href="javascript:void(0);" onClick="checkLoggedornott(<?php echo $i; ?>)" class="btn btn-main btn-sm animation float-md-right rounded-2 px-md-3">More</a>
									<?php } ?>										
									<?php } ?>										
								</p>								
							</div>
						</div>
					<?php $k++; } } ?>
				</div>
			<!-- Right Col Ends -->
			</div>
		<!-- Nested Row Ends -->
		</div>
	<!-- Main Container Ends -->
	
	
	<!-- Main Container Starts -->
		<div class="main-container container px-md-0">
		<!-- Banner Area Starts -->
			<div class="row pt-5 text-center">
			<!-- Banner #1 Starts -->
				<div class="col-md-4 col-sm-12">
					<p><a href="#"><img src="<?php echo base_url(); ?>assets/images/banners/home/banner-img1.jpg" alt="Banner" class="img-fluid"></a></p>
				</div>
			<!-- Banner #1 Ends -->
			<!-- Banner #2 Starts -->
				<div class="col-md-4 col-sm-12">
					<p><a href="#"><img src="<?php echo base_url(); ?>assets/images/banners/home/banner-img2.jpg" alt="Banner" class="img-fluid"></a></p>
				</div>
			<!-- Banner #2 Ends -->
			<!-- Banner #3 Starts -->
				<div class="col-md-4 col-sm-12">
					<p><a href="#"><img src="<?php echo base_url(); ?>assets/images/banners/home/banner-img1.jpg" alt="Banner" class="img-fluid"></a></p>
				</div>
			<!-- Banner #3 Ends -->
			</div>
		<!-- Banner Area Ends -->
			<?php if(isset($successstoires) && count($successstoires)>0 && !empty($successstoires)){ ?>
		<!-- Success Stories Section Starts -->
			<section class="home-success-stories">
			<!-- Heading Starts -->
				<h3 class="text-weight-semi-bold text-center text-color-black-1 hs-1 alt-1">Our Success <span class="text-color-red-1">Stories</span></h3>
			<!-- Heading Ends -->
			<!-- Success Stories Carosuel Starts -->
				<div class="home-success-stories-carousel">
					<?php foreach($successstoires as $sstory){ ?>
				<!-- Story #1 Starts -->
					<div class="box-2 rounded-2">
						<h4 class="text-weight-medium text-color-black-1 hs-1 alt-2 mb-3"><span class="text-color-red-1"><?php echo ucfirst($sstory->ssname); ?></span></h4>
						<p class="mb-0"><?php echo ucfirst($sstory->sstext); ?></p>
					</div>
				<!-- Story #1 Ends -->	
					<?php } ?>
				</div>
			<!-- Success Stories Carosuel Ends -->
			</section>
		<!-- Success Stories Section Ends -->
			<?php } ?>
		</div>
	<!-- Main Container Ends -->
	