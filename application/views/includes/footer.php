<div class="modal fade register-modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content modal-content-1 rounded-5">
			<div class="container-fluid">
				<h4 class="text-weight-semi-bold text-color-red-1 text-center">Matrimony App</h4>
				<h5 class="hs-1 alt-1 text-center text-color-black-1 text-weight-semi-bold">Welcome! Let's start your partner <br>search with this Sign up.</h5>
				<form class="profile-form pt-2" id="registerform" name="registerform" method="post" action="<?php echo base_url(); ?>User/registersubmit">
					<p  class="text-weight-semi-bold" style="color:#F44336">For Which You Want To Register</p>
					<span id="error_registerthru1" class="error_alert" style="margin-top: -15px;"></span>
					<div class="form-check" style="margin-top: -15px;">
						<input value="1" class="form-check-input clsregisterthru" type="radio" id="registerthru1" name="registerthru">
						<label class="form-check-label" for="disabledFieldsetCheck">Matrimony</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input value="2" checked class="form-check-input clsregisterthru" type="radio" id="registerthru2" name="registerthru">
						<label class="form-check-label" for="disabledFieldsetCheck">Business Profile</label>
					</div>
					<span id="hid_user_referal_code" style="display:none;">
						<div class="form-group">
							<label for="register-email" class="control-label text-weight-semi-bold">Memeber Referral Code<span class="text-danger">*</span></label>
							<input style="text-transform:uppercase;" type="text" name="user_referal_code" id="user_referal_code" class="form-control animation rounded-2" placeholder="Referral Code" required>
							<span id="error_user_referal_code" class="error_alert"></span>
						</div>
					</span>
					<div class="form-group">
						<label for="register-email" class="control-label text-weight-semi-bold">User name<span class="text-danger">*</span></label>
						<input type="email" name="user_display_name" id="user_display_name" class="form-control animation rounded-2" placeholder="User Name" required>
						<span id="error_user_display_name" class="error_alert"></span>
					</div>
					<div class="form-group">
						<label for="register-email" class="control-label text-weight-semi-bold">Email Address <span class="text-danger">*</span></label>
						<input type="email" name="user_email" id="user_email" class="form-control animation rounded-2" placeholder="Email Address" required>
						<span id="error_user_email" class="error_alert"></span>
					</div>
					<div class="form-group">
						<label for="register-phoneno" class="control-label text-weight-semi-bold">Mobile No <span class="text-danger">*</span></label>
						<input type="number" name="user_mobile" id="user_mobile" class="form-control animation rounded-2" placeholder="Mobile No" required>
						<span id="error_user_mobile" class="error_alert"></span>
					</div>
					<div class="form-group">
						<label for="register-password" class="control-label text-weight-semi-bold">Password <span class="text-danger">*</span></label>
						<input type="password" name="user_encrpted_password" id="user_encrpted_password" class="form-control animation rounded-2" placeholder="Password" required>
						<span id="error_user_encrpted_password" class="error_alert"></span>
					</div>
					<span id="hid_user_gender_code_user_create_profile_for" style="display:none;">
						<div class="form-group">
							<label class="text-weight-medium">Gender</label>
							<select id="user_gender" name="user_gender" class="custom-select alt-1">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label class="text-weight-medium">Create Profile For</label>
							<select id="user_create_profile_for" name="user_create_profile_for" class="custom-select alt-1">
								<option value="self">Self</option>
								<option value="son">Son</option>
								<option value="daughter">Daughter</option>
							</select>
						</div>
					</span>
					<span id="form_submit">
						<p class="my-2 text-center">
							<button type="button" onClick="registerFormSubmit('register');" class="btn btn-black btn-style-2 btn-block text-weight-medium text-big-2 animation rounded-2">Submit</button>
						</p>
					</span>
					<span id="form_process_form" style="display:none;">
						<p class="my-2 text-center">
							<button type="button" class="btn btn-black btn-style-2 btn-block text-weight-medium text-big-2 animation rounded-2">Processess</button>
						</p>
					</span>
				</form>
				<h5 class="pt-3 text-color-black-1 text-weight-semi-bold text-center">Already a Member? <a href="javascript:void(0);" class="animation" onClick="loginvalidate();">Login?</a></h5>
			</div>
		</div>
	</div>
</div>
<!-- Modal Window Ends -->
<div class="modal fade register-modal " id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="false" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content modal-content-1 rounded-5">
			<div class="container-fluid">
				<h4 class="text-weight-semi-bold text-color-red-1 text-center">Matrimony App</h4>
				<h5 class="hs-1 alt-1 text-center text-color-black-1 text-weight-semi-bold">Welcome! Let's start your partner <br>search with this Sign in.</h5>
				<form class="profile-form pt-2" id="loginsubmitform" name="loginsubmitform" method="post" action="<?php echo base_url(); ?>user/loginsubmitfor">
					<p  class="text-weight-semi-bold" style="color:#F44336">To Which You Want To Login</p>
					<span id="error_loginthru1" class="error_alert" style="margin-top: -15px;"></span>
					<div class="form-check" style="margin-top: -15px;">
						<input value='1' class="form-check-input" type="radio" id="loginthru1" name="loginthru">
						<label class="form-check-label" for="disabledFieldsetCheck">Matrimony</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input class="form-check-input" type="radio" id="loginthru2" name="loginthru" value='2'>
						<label class="form-check-label" for="disabledFieldsetCheck">Business Services</label>
					</div>
					<div class="form-group">
						<label for="register-email" class="control-label text-weight-semi-bold">Email Address/Mobile Number <span class="text-danger">*</span></label>
						<input type="text" name="log_user_email" id="log_user_email" class="form-control animation rounded-2" placeholder="Email Address" required>
						<span id="error_log_user_email" class="error_alert"></span>
					</div>
					<div class="form-group">
						<label for="register-password" class="control-label text-weight-semi-bold">Password <span class="text-danger">*</span></label>
						<input type="password" name="log_user_encrpted_password" id="log_user_encrpted_password" class="form-control animation rounded-2" placeholder="Password" required>
						<span id="error_log_user_encrpted_password" class="error_alert"></span>
					</div>
					<span id="error_login_fail" class="error_alert"></span>
					<span id="form_submit_login">
						<p class="my-2 text-center">
							<button type="button" onClick="loginFormSubmit('login');" class="btn btn-black btn-style-2 btn-block text-weight-medium text-big-2 animation rounded-2">Submit</button>
						</p>
					</span>
					<span id="form_process_login" style="display:none;">
						<p class="my-2 text-center">
							<button type="button" class="btn btn-black btn-style-2 btn-block text-weight-medium text-big-2 animation rounded-2">Processing..</button>
						</p>
					</span>
				</form>
				<h5 class="pt-3 text-color-black-1 text-weight-semi-bold text-center">Create new? <a href="javascript:void(0);" class="animation" onClick="registerationform();">Sign up?</a></h5>
				<h5 class="pt-3 text-color-black-1 text-weight-semi-bold text-center">Forgot your password? <a href="<?php echo base_url(); ?>forgotpassword" class="animation">Reset?</a></h5>
			</div>
		</div>
	</div>
</div>
<!-- Modal Window Ends -->


<div class="modal fade" id="validationPop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">		
		<h3 class="modal-title" id="myModalLabel">
		<?php if(isset($_GET['register_error']) && $_GET['register_error']=="loginsuccessful") { ?>
			Confirmation
		<?php }else if(isset($_GET['register_error']) && $_GET['register_error']=="successful") { ?>
			Confirmation
		<?php }else if(isset($_GET['register_error']) && $_GET['register_error']=="profilesuccess") { ?>
			Confirmation
		<?php }else if(isset($_GET['register_error']) && $_GET['register_error']=="profileaddingsuccess") { ?>
			Confirmation
		<?php }else if(isset($_GET['register_error']) && $_GET['register_error']=="servicefoundsuccess") { ?>
			Confirmation
		<?php }else{ ?>
			Validation Confirmation
		<?php } ?>
		</h3>
		<button type="button" class="close" onClick="closereload();" title="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body">
		<?php if(isset($_GET['register_error']) && $_GET['register_error']=="loginsuccessful") { ?>
			<p>You've logged in succesfully.</p>
		<?php }else if(isset($_GET['register_error']) && $_GET['register_error']=="successful") { ?>
			<p>You are registered successfully. Wait until admin approves your registration.</p>
		<?php }else if(isset($_GET['register_error']) && $_GET['register_error']=="notinserted") { ?>
			<p>Please try again once, Server is issue.</p>
		<?php }else if(isset($_GET['register_error']) && $_GET['register_error']=="mobileissue"){ ?>
			<p>The mobile entered already exists in our records.</p>
		<?php }else if(isset($_GET['register_error']) && $_GET['register_error']=="emailissue"){ ?>
			<p>The email address entered already exists in our records.</p>
		<?php } else if(isset($_GET['register_error']) && $_GET['register_error']=="profilefail"){ ?>
			<p>Please try again, or please contact site administrator.</p>
		<?php } else if(isset($_GET['register_error']) && $_GET['register_error']=="requiredparameters"){ ?>
			<p>Required parameter are missing.</p>
		<?php } else if(isset($_GET['register_error']) && $_GET['register_error']=="profilesuccess"){ ?>
			<p>Profile is updated successfully.</p>
		<?php } else if(isset($_GET['register_error']) && $_GET['register_error']=="profileaddingsuccess"){ ?>
			<p>Family Collection is added successfully.</p>
		<?php } else if(isset($_GET['register_error']) && $_GET['register_error']=="servicefoundsuccess"){ ?>
			<p>Service is added successfully. Please wait for admin approval.</p>
		<?php } ?>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" onClick="closereload();">Ok</button>
	  </div>
	</div>
  </div>
</div>	


<div class="modal fade" id="pvalidationPop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">		
		<h3 class="modal-title" id="myModalLabell">Message</h3>
		<button type="button" class="close" onClick="closereload();" title="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body">
			<p id="html_new">Please contact the site administrator.</p>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" onClick="closereload();">Ok</button>
	  </div>
	</div>
  </div>
</div>
<div class="modal fade" id="rvalidationPop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">		
		<h3 class="modal-title requiedstatus" id="myModalLabel">
			Validation Confirmation
		</h3>
		<button type="button" class="close" onClick="removeclosereload();" title="Close"><span aria-hidden="true">&times;</span></button>
	  </div>
	  <div class="modal-body">
			<p id="error_required_messgae"></p>
	  </div>
	  <input type="hidden" id="hidid" name="hidid" value="">
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" onClick="removeclosereload();">Ok</button>
	  </div>
	</div>
  </div>
</div>	
	<!-- Footer Starts -->
		<footer class="main-footer parallax">
		<!-- Nested Container Starts -->
			<div class="container px-md-0">
			<!-- Nested Row Starts -->
				<div class="row text-white">
				<!-- Site Info Starts -->
					<div class="col-md-4 col-sm-12">
						<div class="foot-col">
							<p class="pb-md-3"><h4>Brahamana Matrimony</h4></p>
								<li class="d-flex"><i class="fa fa-map-marker text-color-brand"></i> # PLOT NO : 972 NEAR 3 MONKEYS CENTER PRAGAHTI NAGAR OPP: KPHB JNTU ROAD.HYDERBAD 500090. CELL NO. 8008672640</li>								
								<li class="d-flex"><i class="fa fa-phone text-color-brand"></i> <a href="tel:+91 9849100005" class="text-white"> +91 8008672640</a></li>
								 <li class="d-flex"><i class="fa fa-envelope text-color-brand"></i><a class="text-white" href="mailto:theswayamvaram@gmail.com" class="text-color-black-1 animation"> theswayamvaram@gmail.com</a></li>
								<ul class="list-unstyled foot-col-address">
							</ul>
						</div>
					</div>
				<!-- Site Info Ends -->
				<!-- Our Services Links Starts -->
					<div class="col-md-2 col-sm-6 col-12">
						<div class="foot-col">
							<h5 class="text-weight-semi-bold hs-1">Our Services</h5>
							<ul class="list-unstyled foot-links-1 pt-md-3">
								<li><a href="javascript:void(0);" onClick="registerationform();"  class="text-white">Register Your Profile</a></li>
								<li><a href="<?php echo base_url(); ?>services-info" class="text-white">Register Your Business</a></li>
							</ul>
						</div>
					</div>
				<!-- Our Services Links Ends -->
				<!-- More Page Links Starts 
					<div class="col-md-2 col-sm-6 col-12 hidden">
						<div class="foot-col">
							<h5 class="text-weight-semi-bold hs-1">More Pages</h5>
							<ul class="list-unstyled foot-links-1 pt-md-3">
								<li><a href="<?php echo base_url(); ?>" class="text-white">Home</a></li>
								<li><a href="<?php echo base_url(); ?>bride-profiles" class="text-white">Bride Profiles</a></li>
								<li><a href="<?php echo base_url(); ?>groom-profiles" class="text-white">Groom Profiles</a></li>
								<li><a href="<?php echo base_url(); ?>nri-profiles" class="text-white">NRI Profiles</a></li>
								<li><a href="<?php echo base_url(); ?>secondmarriage-profiles" class="text-white">Second Marriage</a></li>
							</ul>
						</div>
					</div> -->
				<!-- More Page Links Ends -->
				<!-- Subscribe Newsletter Starts -->
					<div class="col-md-4 col-sm-12">
						<div class="foot-col">
							<h5 class="text-weight-semi-bold hs-1">Request To Get Back</h5>
							<form class="foot-col-form pt-md-3">
								<p>
									<input type="text" id="subscribeid" name="subscribeid" class="form-control rounded-2" placeholder="Your Email">
									<span id="error_subscribeid" style="color:#FFFFFF;"></span>
								</p>								
								<button type="button" onClick="return subscribeform();" class="btn btn-main rounded-2 animation">Submit</button>
							</form>
						</div>
					</div>
				<!-- Subscribe Newsletter Ends -->
				</div>
			<!-- Nested Row Ends -->
			<!-- Social Media Links Starts -->
				<ul class="list-unstyled list-inline foot-sm-links text-center">
					<li class="list-inline-item rounded-circle">
					<a href="https://wa.me/919100921282" target="_blank"><img src="<?php echo base_url(); ?>assets/images/icons/sm/whatsapp-icon.png" alt="Whatsapp"></a></li>
					<li class="list-inline-item rounded-circle"><a href="#"><img src="<?php echo base_url(); ?>assets/images/icons/sm/instagram-icon.png" alt="Instagram"></a></li>
					<li class="list-inline-item rounded-circle"><a href="#"><img src="<?php echo base_url(); ?>assets/images/icons/sm/fb-icon.png" alt="Facebook"></a></li>
				</ul>
			<!-- Social Media Links Ends -->
			<!-- Copyright Starts -->
				<p class="copyright text-center text-white">Copyright &copy; <span class="date-stamp">2021</span>  <span class="text-color-brand">Brahmin Community & Matrimony</span> All Rights Reserved.</p>
			<!-- Copyright Ends -->
			</div>
		<!-- Nested Container Ends -->
		</footer>
	<!-- Footer Ends -->
	<!-- Template JS Files -->

	<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom.js?reload=<?php echo time(); ?>"></script>
	
	<?php if(isset($_GET['register_error']) && $_GET['register_error']!=""){ ?>
			<script>
				$('#validationPop').modal('show');
			</script>
	<?php } ?>
	<script>
		$( document ).ready(function(){
			<?php if(isset($_SESSION['user_registeredid']) && $_SESSION['user_registeredid']!=""){ ?>
			<?php }else{ ?>
				<?php if(isset($_GET['register_error']) && $_GET['register_error']!=""){ ?>
				<?php }else{ ?>
					//$("#loginModal").modal("show");
				<?php } ?>
			<?php } ?>
		});
	</script>
	</body>
</html>