<!-- Page Banner Starts -->
		<div class="page-banner">
        <!-- Banner Image Starts -->
            <img src="<?php echo base_url(); ?>assets/images/banners/page-banners/page-banner-img1.jpg" alt="Image" class="img-fluid">
        <!-- Banner Image Ends -->
			 <div class="container px-md-0 text-white text-center d-none d-md-block" style="bottom:50%;">
                <h2 class="text-weight-semi-bold">Forgot Password</h2>
            </div>
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
				<!-- Form Starts -->
					<form id="forgotpwdForm" name="forgotpwdForm" method="POST">
						<div class="form-group row pt-3">
							<label for="forgot-pass" class="col-sm-3 col-form-label text-big-2 text-weight-semi-bold">Email / Mobile </label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" name="uemailphone" id="uemailphone">
							  <span name="error_uemailphone" id="error_uemailphone"></span>
							</div>
						</div>
						<div class="form-group row pt-3">
							<div class="col-sm-9 offset-sm-3">
							  <button onClick="formValidate();" type="button" id="btn_submit" name="btn_submit" class="btn btn-main btn-style-2 animation">Submit</button>
							</div>
						</div>
					</form>
				<!-- Form Ends -->
                </div>
            <!-- Mainarea Ends -->
            </div>
        <!-- Nested Row Ends -->
		</div>
	<!-- Main Container Ends -->