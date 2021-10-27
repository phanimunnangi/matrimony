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
											<th>UserName</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Status</th>
											<th>Manage</th>
										</tr>
									</thead>
									<tbody>					
										<?php  $s=0; foreach ($userslist as $row){ ?>
											<tr>
												<td><?php echo ++$s;?></td>
												<td>
													<?php echo ucfirst($row->user_display_name); ?>
												</td>
												<td>
													<?php echo $row->user_email; ?><br/>
												</td>
												<td>
													<?php echo ucfirst($row->user_mobile); ?><br/>
												</td>											
												<td>													
													<b>Aproval is waiting</b>
												</td>
												<td>
													<input value="Aproval" type="button" id="cat_actions" name="cat_actions" class="btn btn-danger btn-xs " onClick="check_actions('<?php echo $row->user_id; ?>',1);">
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
	$("#us_fromdate").datepicker({
        numberOfMonths: 2,
		dateFormat: 'yy-mm-dd',
		minDate:0,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            $("#us_todate").datepicker("option", "minDate", dt);
        }
    });
    $("#us_todate").datepicker({
        numberOfMonths: 2,
		dateFormat: 'yy-mm-dd',
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#us_fromdate").datepicker("option", "maxDate", dt);
        }
    });
	function source_modal(){
		$("#myModalReload").modal("show");
	}
	function web_source_modal(val){
		$("#web_user_image_modal"+val).modal("show");
	}
	function paymentFormSubmit(){
		var us_user_id      = $("#us_user_id").val();
		var us_fromdate     = $("#us_fromdate").val();
		var us_todate       = $("#us_todate").val();
		var us_paymentamount = $("#us_paymentamount").val();
		var us_paymentoption = $("#us_paymentoption").val();
		$("#error_us_paymentoption").html("");
		$("#error_us_user_id").html("");
		$("#error_us_fromdate").html("");
		$("#error_us_todate").html("");
		$("#error_us_paymentamount").html("");
		var flag = true;
		if(us_fromdate==""){
			$("#error_us_fromdate").html("From date is required.");
			flag = false;
		}
		if(us_todate==""){
			$("#error_us_todate").html("To date is required.");
			flag = false;
		}
		if(us_paymentamount==""){
			$("#error_us_paymentamount").html("Payment amount is required.");
			flag = false;
		}
		if($('input[name="us_paymentoption"]').is(':checked')){
		  $("#error_us_paymentoption").html("");
		}else{
			$("#error_us_paymentoption").html("Payment option is required.");
			flag = false;
		}
		if(flag == false){
			return false;
		}else{
			$("#form_submit_login").hide();
			$("#form_process_login").show();
			var formdata = $("#paymentamtform").serialize();
			$.ajax({
				type		:	'POST',
				dataType	: 	"json",	
				url			:  	'<?php echo base_url();?>admin/Common/aprovalstatusactions',
				data		:	formdata,
				success: function(data){
					$("#form_submit_login").show();
					$("#form_process_login").hide();
					if(data.output=='success'){
						window.location = "<?php echo base_url();?>admin/common/allprofileslist";
					}else{
						
					}					
				}
			});
		}
	}
	function cancelPaymentFormSubmit(){
		$("#error_us_paymentoption").html("");
		$("#error_us_user_id").html("");
		$("#error_us_fromdate").html("");
		$("#error_us_todate").html("");
		$("#error_us_paymentamount").html("");
		$("#us_user_id").val("");
		$("#us_fromdate").val("");
		$("#us_todate").val("");
		$("#us_paymentamount").val("");
		$("#us_paymentoption").prop("checked", false);
		$("#myModalReload").modal("hide");
	}
	function check_actions(catid,st){
		$("#us_user_id").val("");
		$("#us_user_id").val(catid);
		$("#error_us_paymentoption").html("");
		$("#error_us_user_id").html("");
		$("#error_us_fromdate").html("");
		$("#error_us_todate").html("");
		$("#error_us_paymentamount").html("");
		$("#us_fromdate").val("");
		$("#us_todate").val("");
		$("#us_paymentamount").val("");
		$("#us_paymentoption").prop("checked", false);		
		$("#myModalReload").modal("show");
	}
	function profileChange(){
		var profilesid = $('#profileslist').val();
		if(profilesid=="male"){
			window.location= "<?php echo base_url()?>admin/common/waitingprofiles?genderstatus=male";
		}else if(profilesid=="female"){
			window.location= "<?php echo base_url()?>admin/common/waitingprofiles?genderstatus=female";
		}else{
			window.location= "<?php echo base_url()?>admin/common/waitingprofiles";
		}		
	}
</script>
