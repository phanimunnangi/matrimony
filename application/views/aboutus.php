<!-- Page Banner Starts -->
		<div class="page-banner">
        <!-- Banner Image Starts -->
            <img src="<?php echo base_url(); ?>assets/images/banners/page-banners/page-banner-img1.jpg" alt="Image" class="img-fluid">
        <!-- Banner Image Ends -->
        <!-- Nested Container Starts -->
            <div class="container px-md-0 text-white text-center d-none d-md-block">
                <h2 class="text-weight-semi-bold">About Us</h2>
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
                </div>
            <!-- Sidearea Ends -->
            <!-- Mainarea Starts -->
                <div class="col-lg-9 col-md-8 col-sm-12 py-4 py-md-0">
				<h6 class="text-weight-medium font-italic mt-lg-2 mb-lg-3">About US </h6>
				Our Telugu Brahmin Matrimony Information Centre (http://www.tbmic.org) is being successfully run by highly experienced MIC members (Matrimony Information Centre) from Telugu States
				
				<h6 class="text-weight-medium font-italic mt-lg-2 mb-lg-3">Our vision</h6>
				We wish to centralized all the data from all local marriage information centres, brokers/ Bureaus, smith's under one roof. In this regard all the data will be centralized information . So that costumer will get more Options within the minimum economy.

				<h6 class="text-weight-medium font-italic mt-lg-2 mb-lg-3">Our Goal</h6>
				Parents look for a prospective match for their son/daughter from their own community through marriage brokers or common friends or relatives or astrologers. Due to the urbanization, reduced social contacts and nowadays generation started to move out for jobs to all over the world and it is not easy for parents in finding a suitable match for their children. In this regard we have established Matrimonial & Allied Services to Brahmin Community. we wish to serve people through our services in minimum economy.
                </div>
            <!-- Mainarea Ends -->
            </div>
        <!-- Nested Row Ends -->
		</div>
	<!-- Main Container Ends -->