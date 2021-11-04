	<!-- Page Banner Starts -->
		<div class="page-banner">
        <!-- Banner Image Starts -->
            <img src="<?php echo base_url(); ?>assets/images/banners/page-banners/page-banner-img1.jpg" alt="Image" class="img-fluid">
        <!-- Banner Image Ends -->
        <!-- Nested Container Starts -->
            <div class="container px-md-0 text-white text-center d-none d-md-block">
                <h2 class="text-weight-semi-bold"><?php echo $page_title; ?></h2>
            </div>
        <!-- Nested Container Ends -->
		</div>
	<!-- Page Banner Ends -->
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
                <div class="col-lg-9 col-md-8 col-sm-12 py-4 py-md-0">
				<!-- Tabs Links Starts -->
					
				<!-- Tabs Links Ends -->
				<!-- Tabs Content Starts -->
					<div class="tab-content nav-tabs-1-content" >
					<!-- Featured Tabs Content Starts -->
						<div class="tab-pane fade show active" >
							<?php if(isset($fuserserviceslist) && !empty($fuserserviceslist) && count($fuserserviceslist)>0) { foreach($fuserserviceslist as $service){ ?>
						<!-- Listing #1 Starts -->
							<div class="box-3 rounded-2 d-md-flex w-100">
							<!-- Image Starts -->
								<p class="mb-md-0 w-50"><img src="<?php echo base_url(); ?>assets/images/business-listing/<?php echo $service->servicewebimage;?>" alt="Image" class="img-fluid"></p>
							<!-- Image Ends -->
							<!-- Details Starts -->
									<?php //echo "<pre>"; print_r($service->servicename);?>
								<div class="box-3-details ml-md-4 w-100">
								<?php //echo "<pre>"; print_r($service); die;?>
									<h3 class="h3 text-weight-semi-bold text-color-red-1 mb-2"><?php echo $service->servicename;?></h3>
									<ul class="list-unstyled mb-0">
										<li class="row pt-2">
											<span class="text-weight-semi-bold text-big-1 col-4 col-md-3">Contact No :</span>
											<span class="col-8 col-md-9"><?php echo $service->serviceprimarycontactnumber;?></span>
										</li>
										<li class="row pt-2">
											<span class="text-weight-semi-bold text-big-1 col-4 col-md-3">Email id :</span>
											<span class="col-8 col-md-9"><a href="mailto:<?php echo $service->servicename;?>" class="text-color-black-1"><?php echo $service->servicename;?></a></span>
										</li>
										<li class="row pt-2">
											<span class="text-weight-semi-bold text-big-1 col-4 col-md-3">Address :</span>
											<span class="col-8 col-md-9"><?php echo $service->serviceaddress;?></span>
										</li>
										<li class="row pt-2">
											<span class="text-weight-semi-bold text-big-1 col-4 col-md-3">Services :</span>
											<span class="col-8 col-md-9"><?php echo join(',',array($service->serviceskil1,$service->serviceskil2,$service->serviceskil3,$service->serviceskil4));?></span>
										</li>
										<li class="row pt-2">
											<span class="text-weight-semi-bold text-big-1 col-4 col-md-3">Website :</span>
											<span class="col-8 col-md-9"><a href="<?php echo $service->servicewebsite;?>" class="text-color-black-1"><?php echo $service->servicewebsite;?></a></span>
										</li>
									</ul>
								</div>
							<!-- Details Ends -->
							</div>
						<!-- Listing #1 Ends -->
						<?php } } ?>
						</div>					
					</div>
				<!-- Tabs Content Ends -->
                <!-- Spacer Starts -->
                    <p class="pt-md-1">&nbsp;</p>
				<!-- Spacer Ends -->
				<!-- Pagination Starts -->
					<nav class="d-flex justify-content-between" aria-label="Page navigation">
						<?php echo $slinks; ?>
						<?php if($totcnt!=0) { ?>
						<p class="text-weight-medium text-big-2 pt-2 pb-0">1 - 24 of <?php echo $totcnt; ?> Results</p>
						<?php } ?>
					</nav>
				<!-- Pagination Ends -->
                </div>
            <!-- Mainarea Ends -->
            </div>
        <!-- Nested Row Ends -->
		</div>
	<!-- Main Container Ends -->