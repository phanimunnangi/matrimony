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
                    <h6 class="text-weight-medium font-italic mt-lg-2 mb-lg-3">Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dole magna aliqua.</h6>
                    <p>Ut enim ad minim veniam quis nostrud exercitation. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dole magna aliqua.</p>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    <p>Ut enim ad minim veniam quis nostrud exercitation. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dole magna aliqua.</p>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
            <!-- Mainarea Ends -->
            </div>
        <!-- Nested Row Ends -->
		</div>
	<!-- Main Container Ends -->