<!-- Main Menu Ends -->
	<!-- Page Banner Starts -->
		<div class="page-banner">
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
                            <p class="text-big-2 text-weight-semi-bold lh-1 text-color-black-1 pl-3 ml-lg-3"># 11-13-852/B/CD,  <br>Near Koti, RS Brothers Showroom Bus Stop, <br>Beside Jadish Market, Abids, <br>Alwal-Alwal, Hyd - 500036, Telangana.</p>
                        <!-- Address Ends -->
                        <!-- Phone No Starts -->
                            <h4 class="text-color-red-1 text-weight-semi-bold"><i class="fa fa-phone mr-2 pt-lg-3"></i> Phone No :</h4>
                            <p class="text-big-2 text-weight-semi-bold lh-1 text-color-black-1 pl-3 ml-lg-3"><a href="tel:+91 9849010101" class="text-color-black-1 animation">+91 9849010101</a></p>
                        <!-- Phone No Ends -->
                        <!-- Email ID Starts -->
                            <h4 class="text-color-red-1 text-weight-semi-bold"><i class="fa fa-envelope mr-2 pt-lg-3"></i> Email ID :</h4>
                            <p class="text-big-2 text-weight-semi-bold lh-1 pl-3 ml-lg-3"><a href="mailto:nayeebrahmincommunity@gmail.com" class="text-color-black-1 animation">nayeebrahmincommunity@gmail.com</a></p>
                        <!-- Email ID Ends -->
                        <!-- Whatsapp No Starts -->
                            <h4 class="text-color-red-1 text-weight-semi-bold"><i class="fa fa-whatsapp mr-2 pt-lg-3"></i> Whatsapp No :</h4>
                            <p class="text-big-2 text-weight-semi-bold lh-1 text-color-black-1 pl-3 ml-lg-3">9849100009</p>
                        <!-- Whatsapp No Ends -->
                        </div>
                    <!-- Content Ends -->
                    <!-- Image Starts -->
                        <div class="col-md-5 col-sm-12">
                            <p class="text-center"><img src="<?php echo base_url(); ?>assets/images/contact/contact-img1.jpg" alt="Image" class="img-fluid"></p>
                        </div>
                    <!-- Image Ends -->
                    </div>
                <!-- Nested Row Ends -->
                </div>
            <!-- Mainarea Ends -->
            </div>
        <!-- Nested Row Ends -->
		</div>
	<!-- Main Container Ends -->