<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2><?=$page_title;?></h2>
		<ol class="breadcrumb">
			<li>
				<a href="<?=base_url();?>/admin/dashboard">Dashboard</a>
			</li>
			<li class="active">
				<strong><?=$page_title;?></strong>
			</li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5><?=$page_title;?></h5>
			</div>
			<div class="ibox-content">
				<form id="changepwdform" name="changepwdform" method="POST">
					<input type="hidden" id="userid" name="userid" value="<?php echo $_GET['user_registeredid']; ?>">
					<input type="hidden" id="homepage" name="homepage" value="adminreset">
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
				</div>
			</div>
		</div>
	</div>
	<?php 
		$this->load->view('admin/includes/footer');
	?>
<script type="text/javascript">
	function changepassform(){
		var flag = true;
		var newpassword     = $("#newpassword").val();
		var confirmpassword = $("#confirmpassword").val();
		$("#error_oldpassword").html('');
		$("#error_newpassword").html('');
		$("#error_confirmpassword").html('');
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
				url			:  	'<?php echo base_url(); ?>User/changepasswordsubmit?sRch=<?php echo time(); ?>',
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
						window.location = "<?php echo base_url();?>admin/common/allprofileslist";
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
<script>	
	CKEDITOR.replace( 'location' );
</script>