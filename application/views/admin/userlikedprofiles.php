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
	<div class="col-lg-2">
	</div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">				
			<div class="col-md-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5><?=$page_title;?></h5>
						<!--<a class="btn btn-primary btn-sm open pull-right" href="<?php echo base_url();?>admin/common/addprofile" type="button" style="margin-top: -5px;"><i class="fa fa-plus"></i> Add</a>-->
					</div>
					<div class="form-group" style="margin-top:10px;margin-bottom:50px;">
						<label class="col-sm-2 control-label">Select Profiles</label>
						<div class="col-sm-5">
							<select id="profileslist" name="profileslist" class="form-control" onChange="profileChange();">
								<?php 
									if(isset($_GET['genderstatus']) && $_GET['genderstatus']=="male"){
										$maleselected = "selected";
									}else if(isset($_GET['genderstatus']) && $_GET['genderstatus']=="female"){
										$femaleselected = "selected";
									}else{
										$allselected = "selected";
									}								
								?>
								<option <?php echo $allselected; ?> value="all">ALL</option>
								<option <?php echo $femaleselected; ?> value="female">Bride</option>
								<option <?php echo $maleselected; ?> value="male">Groom</option>
							</select>
						</div>
					</div>
					<div class="ibox-content">
						<form method="post" action="<?=base_url();?>admin/common/change_all_status" onsubmit="return confirm('Do you really want to Change the status?');">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover dataTables1" >
									<thead>
										<tr>
											<th>Sr No.</th>
											<th>User Information</th>
											<th>Like Profile Information</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>					
										<?php  $s=0; foreach ($userslist as $row){ ?>
											<tr>
												<td><?php echo ++$s;?></td>
												<td>
													<?php echo ucfirst($row->ulp_display_name_from); ?><br/>
													<a href="<?php echo base_url();?>admin/common/editprofile?user_id=<?=$row->ulp_registered_from;?>" target="_blank"><?php echo $row->ulp_registered_from; ?></a><br/>
												</td>
												<td>
												<?php echo ucfirst($row->ulp_display_name_to); ?><br/>
												<a href="<?php echo base_url();?>admin/common/editprofile?user_id=<?=$row->ulp_registered_to;?>" target="_blank"><?php echo $row->ulp_registered_to; ?></a><br/>
												</td>										
												<td>													
													<b>Liked <i style="color:green;" class="fa fa-check" aria-hidden="true"></i></b>
												</td>
											</tr>
										<?php }  ?>				
									</tbody>
									<tfoot>
										<tr>
											<th>Sr No.</th>
											<th>UserName</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Status</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</form>				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Window Ends -->
<style>
.error_alert{
	color:#d9534f;
}
</style>
<div class="modal fade register-modal" id="myModalReload" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content modal-content-1 rounded-5">
			<div class="container-fluid">
				<h3 class="text-weight-semi-bold text-color-red-1 text-center">Subscription Plan</h3>
				<form class="profile-form pt-2" id="paymentamtform" name="paymentamtform" method="post">
					<div class="form-group">
						<label for="register-email" class="control-label text-weight-semi-bold">From Date<span class="text-danger">*</span></label>
						<input type="text" name="us_fromdate" id="us_fromdate" class="form-control animation rounded-2" placeholder="From Date" required>
						<span id="error_us_fromdate" class="error_alert"></span>
					</div>
					<div class="form-group">
						<label for="register-password" class="control-label text-weight-semi-bold">To Date <span class="text-danger">*</span></label>
						<input type="text" name="us_todate" id="us_todate" class="form-control animation rounded-2" placeholder="To date" required>
						<span id="error_us_todate" class="error_alert"></span>
					</div>
					<div class="form-group">
						<input type="checkbox" name="us_paymentoption" id="us_paymentoption" required><label for="register-password" class="control-label text-weight-semi-bold"> &nbsp; Payment option<span class="text-danger">*</span></label>						
						<br/><span id="error_us_paymentoption" class="error_alert"></span>
					</div>
					<div class="form-group">
						<label for="register-password" class="control-label text-weight-semi-bold">Payment Amount<span class="text-danger">*</span></label>
						<input type="text" name="us_paymentamount" id="us_paymentamount" class="form-control animation rounded-2" placeholder="Payment amount" required>
						<span id="error_us_paymentamount" class="error_alert"></span>
					</div>
					<input type="hidden" id="us_user_id" name="us_user_id" value="">
					<span id="form_submit_login">
						<p class="my-2 text-center">
							<button type="button" onClick="paymentFormSubmit('pay');" class="btn btn-primary text-weight-medium animation rounded-2">Submit</button>
							<button type="button" onClick="cancelPaymentFormSubmit('cancel');" class="btn btn-danger text-weight-medium animation rounded-2">Cancel</button>
						</p>
					</span>
					<span id="form_process_login" style="display:none;">
						<p class="my-2 text-center">
							<button type="button" class="btn btn-primary text-weight-medium animation rounded-2">Processess</button>
						</p>
					</span>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Window Ends -->
<?php 
$this->load->view('admin/includes/footer');
?>

<script type="text/javascript">
	function profileChange(){
		var profilesid = $('#profileslist').val();
		if(profilesid=="male"){
			window.location= "<?php echo base_url()?>admin/common/userlikedprofiles?genderstatus=male";
		}else if(profilesid=="female"){
			window.location= "<?php echo base_url()?>admin/common/userlikedprofiles?genderstatus=female";
		}else{
			window.location= "<?php echo base_url()?>admin/common/userlikedprofiles";
		}		
	}
</script>
