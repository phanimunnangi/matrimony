<!-- Main Slider Starts -->
		<div id="main-slider" class="main-slider carousel slide carousel-fade" data-ride="carousel">
		<!-- Carousel Inner Starts -->
			<div class="carousel-inner">
			<!-- Slide #1 Starts -->
		<?php  $s=0; foreach ($mabannerslist as $row){ ?>			
			<div class="carousel-item <?php echo ($s == 0)?"active":''?>">
					<img src="<?php echo base_url().'/bannerpics/'.$row->bannerwebimage;?>" alt="Image" class="d-block w-100">
					<div class="carousel-caption d-none d-lg-block">
        				<h2 class="text-weight-light"><?php echo ucfirst($row->bannertitle); ?></h2>
					</div>
				</div>
		<?php $s++; } ?>
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
	
	<!-- Main Container Starts -->
		<div class="main-container container px-md-0">
			<!-- About Section Starts -->
			
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
				<p class="mb-0">Matrimonial Services</p>
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
								<div class="diamond-shape bg-blue-1 rounded-10 mx-auto"><img src="<?php echo base_url(); ?>servicepics/<?php echo $servicemasterwebimage; ?>" alt="<?php echo ucfirst($servicemastername); ?>" style="width:50px !important;"></div>
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
