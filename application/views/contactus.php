<!-- Main Menu Ends -->
	<!-- Page Banner Starts -->
		<div class="page-banner d-none">
        <!-- Banner Image Starts -->
            <img src="<?php echo base_url(); ?>assets/images/banners/page-banners/page-banner-img1.jpg" alt="Image" class="img-fluid">
        <!-- Banner Image Ends -->
        <!-- Nested Container Starts -->
            <div class="container px-md-0 text-white text-center d-none d-md-block">
                <h2 class="text-weight-semi-bold">Contact Us</h2>
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
                <!-- Nested Row Starts -->
                    <div class="row pt-lg-3">
                    <!-- Content Starts -->
                        <div class="col-md-7 col-sm-12">
                        <!-- Address Starts -->
                            <h4 class="text-color-red-1 text-weight-semi-bold"><i class="fa fa-map-marker mr-2"></i> Address :</h4>
                            <p class="text-big-2 text-weight-semi-bold lh-1 text-color-black-1 pl-3 ml-lg-3"># PLOT NO : 972 NEAR 3 MONKEYS CENTER PRAGAHTI NAGAR OPP: KPHB JNTU ROAD. HYDERBAD 500090. CELL NO. 8008672640</p>
                        <!-- Address Ends -->
                        <!-- Phone No Starts -->
                            <h4 class="text-color-red-1 text-weight-semi-bold"><i class="fa fa-phone mr-2 pt-lg-3"></i> Phone No :</h4>
                            <p class="text-big-2 text-weight-semi-bold lh-1 text-color-black-1 pl-3 ml-lg-3"><a href="tel:+91 8008672640" class="text-color-black-1 animation">+91 8008672640</a></p>
                        <!-- Phone No Ends -->
                        <!-- Email ID Starts -->
                            <h4 class="text-color-red-1 text-weight-semi-bold"><i class="fa fa-envelope mr-2 pt-lg-3"></i> Email ID :</h4>
                            <p class="text-big-2 text-weight-semi-bold lh-1 pl-3 ml-lg-3"><a href="mailto:theswayamvaram@gmail.com" class="text-color-black-1 animation">theswayamvaram@gmail.com</a></p>
                        <!-- Email ID Ends -->
                        <!-- Whatsapp No Starts -->
                            <h4 class="text-color-red-1 text-weight-semi-bold"><i class="fa fa-whatsapp mr-2 pt-lg-3"></i> <a href="https://wa.me/919100921282" target="_blank"><a href="https://wa.me/919100921282" target="_blank"> Whatsapp <img src="<?php echo base_url(); ?>assets/images/icons/sm/whatsapp-icon.png" alt="Whatsapp"></a></h4>
                        <!-- Whatsapp No Ends -->
                        </div>
                    <!-- Content Ends -->
                    </div>
                <!-- Nested Row Ends -->
                </div>
            <!-- Mainarea Ends -->
            </div>
        <!-- Nested Row Ends -->
		</div>
	<!-- Main Container Ends -->