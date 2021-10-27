<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/small_logo.jpg" />
    <title>MatrimonyApp | Login</title>
    <link href="<?php echo base_url(); ?>admin_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>admin_assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>admin_assets/css/animate.css" rel="stylesheet"> 
	<link href="<?php echo base_url(); ?>admin_assets/css/style.css" rel="stylesheet">  
	<link href="<?php echo base_url(); ?>admin_assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
</head>
<style type="text/css">
    .loginColumns{
        padding-top: 30px;
    }
	.error_mesge_c{
        color: #d94249;
    }
</style>
<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="padding-top: 45px">
                <div class="ibox-content" style="background: #FFFFFF;">
                    <img src="<?php echo base_url();?>admin_assets/img/logo.png" class="img-responsive" style="margin:0 auto;">
					<form name="loginSubmit" id="loginSubmit" method="POST" >
                        <hr>
                        <h2 class="font-bold text-center" style="color: #373774"><b>Admin Login</b></h2>
                        <div class="form-group">
                            <input type="email" class="form-control" id="u_email" name="u_email" placeholder="Email Address" required="">
                            <span id="error_u_email" class="error_mesge_c"></span>                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="u_password" name="u_password" placeholder="Password" required="">
							<span id="error_u_password" class="error_mesge_c"></span>
						</div>
						<br>
						<input onClick="validateLoginForm();" type="button" name="login" class="btn btn-primary m-b text-center " value="Login"> 
                    </form>
                    <p class="m-t"></p>
                </div>
            </div>
        </div>
		<div class="row" style="color: #000;padding-top: 60px">
            <hr/>
            <div class="col-md-6">
                Copyright <a style="color: #d94249;font-weight:800;" href="javascript:void(0);">MatrimonyApp</a> &copy; <?=date('Y');?>-<?=date('Y', strtotime('+1 years'));?></a>
            </div>
            <div class="col-md-6 text-right">
               <small> Made With <i class="fa fa-heart" style="color: red"></i> By <a style="color:#d94249;font-weight:800;" href="javascript:void(0);">MatrimonyApp</a></small>
            </div>
        </div>
    </div>
	<script src="<?=base_url();?>admin_assets/js/jquery-2.1.1.js"></script>
	<script src="<?=base_url()?>admin_assets/js/plugins/toastr/toastr.min.js"></script>
	<script>
        $(document).ready(function(){
			setTimeout(function(){
				toastr.options = {
					closeButton: true,
					progressBar: true,
					showMethod: 'slideDown',  
					timeOut: 4000
				};
				<?php if($this->session->flashdata('success_message')){ ?>
					toastr.success(<?php $this->session->flashdata('success_message') ?>);
				<?php } ?>
				<?php if($this->session->flashdata('error_message')){ ?>
					toastr.error(<?php $this->session->flashdata('error_message') ?>);
				<?php } ?>
				<?php if($this->session->flashdata('warning_message')){?>
					toastr.warning(<?php $this->session->flashdata('warning_message') ?>);	
				<?php } ?>
				<?php 
					((validation_errors()) && (null !== validation_errors())) ? "toastr.warning('".removeNewLine(removepTag(validation_errors()))."');":"" 
				?>			
			}, 1300);	
		});
		$(function() {
            $('.number').on('keydown', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});        
		});
		function validateLoginForm(){
			var u_email    = $("#u_email").val();
			var u_password = $("#u_password").val();
			var flag = true;
			if(u_email==""){
				flag = false;
				$("#error_u_email").html("Email is required.");
			}else if( !validateEmail(u_email)) { 
				flag = false;
				$("#error_u_email").html("Invalid email address.");
			}else{
				$("#error_u_email").html("");
			}
			if(u_password==""){
				flag = false;
				$("#error_u_password").html("Password is required.");
			}else{
				$("#error_u_password").html("");
			}
			if(flag==false){
				return false;
			}else{
				$("#loginSubmit").submit();
			}
			
		}
		function validateEmail($email) {
		  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  return emailReg.test( $email );
		}
    </script>