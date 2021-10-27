<!-- Main Menu Ends -->
	<!-- Page Banner Starts -->
		<div class="page-banner">
        <!-- Banner Image Starts -->
            <img src="<?php echo base_url(); ?>assets/images/banners/page-banners/page-banner-img1.jpg" alt="Image" class="img-fluid">
        <!-- Banner Image Ends -->
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
					<h4 class="text-color-red-1 text-weight-semi-bold pt-lg-3 pb-2">Send your service details</h4>
				<!-- Form Starts -->
					<form action="<?php echo base_url(); ?>User/adduserservice" method="POST" id="formvalidate" name="formvalidate" enctype="multipart/form-data">
					<!-- Service Name Starts -->
						<div class="form-group row pt-3">
							<label for="service-name" class="col-sm-4 col-form-label text-big-2 text-weight-semi-bold">Name of the Service *</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control form-control-1 animation" id="servicename" placeholder="Business Name" name="servicename" required>
							  <span id="error_servicename" style="color:#d94148;"></span>
							</div>
						</div>
					<!-- Service Name Ends -->
					<!-- Service Category Starts -->
						<div class="form-group row pt-3">
							<label for="service-cat" class="col-sm-4 col-form-label text-big-2 text-weight-semi-bold">Service Category</label>
							<div class="col-sm-8">
								<select class="form-control form-control-1 animation" id="servicemasterid" name="servicemasterid">
									<?php if(isset($maserviceslist) && !empty($maserviceslist) && count($maserviceslist)>0) { foreach($maserviceslist as $service){ ?>
										<option value="<?php echo $service->servicemasterdisplayid; ?>"><?php echo ucfirst($service->servicemastername); ?></option>
									<?php } } ?>
								</select>
								<span id="error_servicename" style="color:#d94148;"></span>
							</div>
						</div>
					<!-- Service Category Ends -->
					<!-- Contact No Starts -->
						<div class="form-group row pt-3">
							<label for="service-phno" class="col-sm-4 col-form-label text-big-2 text-weight-semi-bold">Contact No *</label>
							<div class="col-sm-8">
							  <input type="tel" class="form-control form-control-1 animation" name="serviceprimarycontactnumber" id="serviceprimarycontactnumber" required>
							  <span id="error_serviceprimarycontactnumber" style="color:#d94148;"></span>
							</div>
						</div>
					<!-- Contact No Ends -->
					<!-- Email ID Starts -->
						<div class="form-group row pt-3">
							<label for="service-email" class="col-sm-4 col-form-label text-big-2 text-weight-semi-bold">Email ID </label>
							<div class="col-sm-8">
							  <input type="email" class="form-control form-control-1 animation" name="serviceemailaddress" id="serviceemailaddress">
							  <span id="error_serviceemailaddress" style="color:#d94148;"></span>
							</div>
						</div>
					<!-- Email ID Ends -->
					<!-- Services You Deal Starts -->
						<div class="form-group row pt-3">
							<label for="service-deal" class="col-sm-4 col-form-label text-big-2 text-weight-semi-bold">Services You Deal *</label>
							<div class="col-sm-4">
							  <input type="text" class="form-control form-control-1 animation" id="serviceskil1" name="serviceskil1" placeholder="Photography, Catering.." required>
							  <span id="error_serviceskil1" style="color:#d94148;"></span>
							</div>
							<div class="col-sm-4">
							  <input type="text" class="form-control form-control-1 animation" id="serviceskil2" name="serviceskil2" placeholder="Photography, Catering.." required>
							  <span id="error_serviceskil2" style="color:#d94148;"></span>
							</div>													
						</div>
						<div class="form-group row pt-3">
							<label for="service-deal" class="col-sm-4 col-form-label text-big-2 text-weight-semi-bold">&nbsp;</label>
							<div class="col-sm-4">
							  <input type="text" class="form-control form-control-1 animation" id="serviceskil3" name="serviceskil3" placeholder="Photography, Catering.." required>
							</div>
							<div class="col-sm-4">
							  <input type="text" class="form-control form-control-1 animation" id="serviceskil4" name="serviceskil4" placeholder="Photography, Catering.." required>
							</div>																			
						</div>
					<!-- Services You Deal Ends -->
					<!-- Website Starts -->
						<div class="form-group row pt-3">
							<label for="service-deal" class="col-sm-4 col-form-label text-big-2 text-weight-semi-bold">Address</label>
							<div class="col-sm-8">
								<textarea class="form-control form-control-1 animation" id="serviceaddress" name="serviceaddress" ></textarea>							  
							  <span id="error_serviceaddress" style="color:#d94148;"></span>
							</div>
						</div>
					<!-- Website Ends -->
					<!-- Website Starts -->
						<div class="form-group row pt-3">
							<label for="service-deal" class="col-sm-4 col-form-label text-big-2 text-weight-semi-bold">Website</label>
							<div class="col-sm-8">
							  <input type="url" class="form-control form-control-1 animation" name="servicewebsite" id="servicewebsite">
							  <span id="error_serviceskil2" style="color:#d94148;"></span>
							</div>
						</div>
					<!-- Website Ends -->
					<!-- Upload photo Starts -->
						<div class="form-group row pt-3">
							<label for="file-upload" class="col-sm-4 col-form-label text-big-2 text-weight-semi-bold">Upload photo</label>
							<div class="col-sm-8 pt-lg-3">
								<input type="file" class="form-control-file" id="servicewebimage" name="servicewebimage">
								<span id="error_servicewebimage" style="color:#d94148;"></span>
							</div>
						</div>
					<!-- Upload photo Ends -->
					<!-- Submit Button Starts -->
						<div class="form-group row pt-3 pt-lg-4">
							<div class="col-sm-8 offset-sm-4" id="btn_submit">
							  <button type="button" class="btn btn-main btn-style-2 animation" onClick="return formvalidatefun();">Submit</button>
							</div>
							<div class="col-sm-8 offset-sm-4" id="btn_process" style="display:none;">
							  <button type="button" class="btn btn-main btn-style-2 animation">Process..</button>
							</div>
						</div>
					<!-- Submit Button Ends -->
					</form>
				<!-- Form Ends -->
                </div>
            <!-- Mainarea Ends -->
            </div>
        <!-- Nested Row Ends -->
		</div>
	<!-- Main Container Ends -->
	