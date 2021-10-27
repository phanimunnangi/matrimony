<!-- Page Banner Starts -->
		<div class="page-banner">
        <!-- Banner Image Starts -->
            <img src="<?php echo base_url(); ?>assets/images/banners/page-banners/page-banner-img1.jpg" alt="Image" class="img-fluid">
        <!-- Banner Image Ends -->
			 <div class="container px-md-0 text-white text-center d-none d-md-block" style="bottom:50%;">
                <h2 class="text-weight-semi-bold">Change Password</h2>
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
					<form id="changepwdform" name="changepwdform" method="POST">
						<input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['user_registeredid']; ?>">
						<div class="form-group row pt-3">
							<label for="forgot-pass" class="col-sm-3 col-form-label text-big-2 text-weight-semi-bold">Old Password</label>
							<div class="col-sm-9">
							  <input type="password" class="form-control" id="oldpassword" name="oldpassword" >
							  <span id="error_oldpassword" style="color:#d94148;"></span>
							</div>							
						</div>
						<div class="form-group row pt-3">
							<label for="forgot-pass" class="col-sm-3 col-form-label text-big-2 text-weight-semi-bold">New Password</label>
							<div class="col-sm-9">
							  <input type="password" class="form-control" id="newpassword" name="newpassword" >
							  <span id="error_newpassword" style="color:#d94148;"></span>
							</div>							
						</div>
						<div class="form-group row pt-3">
							<label for="forgot-confirm-pass" class="col-sm-3 col-form-label text-big-2 text-weight-semi-bold">Confirm Password</label>
							<div class="col-sm-9">
							  <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
							  <span id="error_confirmpassword" style="color:#d94148;"></span>
							</div>							
						</div>
						<span id="error_error_message" style="color:#d94148;"></span>
						<div class="form-group row pt-3">
							<div class="col-sm-9 offset-sm-3" id="main_reload">
							  <button type="button" class="btn btn-main btn-style-2 animation" onClick="changepassform();">Update</button>
							</div>
							<div class="col-sm-9 offset-sm-3" id="div_reload" style="display:none;">
							  <button type="button" class="btn btn-main btn-style-2 animation">Proccess</button>
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
	<script type="text/javascript">
		function changepassform(){
			var flag = true;
			var oldpassword     = $("#oldpassword").val();
			var newpassword     = $("#newpassword").val();
			var confirmpassword = $("#confirmpassword").val();
			$("#error_oldpassword").html('');
			$("#error_newpassword").html('');
			$("#error_confirmpassword").html('');
			if(oldpassword==""){
				flag = false;
				$("#error_oldpassword").html('Old password is required');
			}
			if(newpassword==""){
				flag = false;
				$("#error_newpassword").html('New password is required');
			}
			if(confirmpassword==""){
				flag = false;
				$("#error_confirmpassword").html('Confirm password is required');
			}
			if(newpassword!=confirmpassword){
				flag = false;
				$("#error_confirmpassword").html('New password and Confirm password is not match');
			}
			if(flag == false){
				return false;
			}else{
				$("#main_reload").hide();
				$("#div_reload").show();
				$.ajax({
					type		:	'POST',
					url			:  	base_url+'User/changepasswordsubmit?sRch='+time,
					dataType	: 	"json",
					data		:	$("#changepwdform").serialize(),
					success: function(data){
						$("#main_reload").show();
						$("#div_reload").hide();
						if(data.output=='confirmpwdandnewpwdnotmatch'){
							$("#error_confirmpassword").html('New password and Confirm password is not match');
						}else if(data.output=='success'){
							$("#error_confirmpassword").html('');
							$("#error_error_message").html('');
							$("#myModalLabell").html('Confirmation');
							$("#html_new").html('Password updated is successfully.');
							$("#pvalidationPop").modal('show');
						}else if(data.output=='somethingwentwrong'){
							$("#error_error_message").html('Some thing went wrong, Please try again or, \n please contact to site admin');
						}else if(data.output=='oldpwdconfpwd'){
							$("#error_error_message").html('Entered old password is wrong.');
						}			
					}
				});
			}
		}
	</script>