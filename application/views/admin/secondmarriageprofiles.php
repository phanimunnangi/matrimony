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
											<th>Image</th>
											<th>Status</th>
											<th>Manage</th>
										</tr>
									</thead>
									<tbody>					
										<?php  $s=0; foreach ($userslist as $row){ ?>
											<tr>
												<td><?php echo ++$s;?></td>
												<td>
													<?php echo $row->user_registeredid; ?><br/>
													<?php echo ucfirst($row->user_display_name); ?><br/>
													<?php if($row->user_tottrailperiod_days!=0){ ?>
													From Date: <?php echo $row->user_trailperiod_fromdate; ?><br/>
													To Date: <?php echo $row->user_trailperiod_todate; ?><br/>
													<?php } ?>
													Days: <?php echo $row->user_tottrailperiod_days; ?> days
												</td>
												<td>
													<?php echo ucfirst($row->user_email); ?><br/>
												</td>
												<td>
													<?php echo ucfirst($row->user_mobile); ?><br/>
												</td>												
												<td>
													<?php if($row->user_profilepic!=""){ ?>
														<a href="javascript:void(0);" onClick="web_source_modal('<?php echo $i;?>');">Web View Image</a>
													<?php }else{ ?>
														<a href="javascript:void(0);" >Web View Image</a>
													<?php } ?>
													<br/>
													<div class="modal fade" id="web_user_image_modal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-body mb-0 p-0">
																<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
			<img src="<?php echo base_url().'userpics/'.$row->user_profilepic; ?>" style="width:500px;height:auto;" >
																</div>
															</div>
															<div class="modal-footer justify-content-center">
																<button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>												
												</td>
												<td>
													<?php if($row->user_status == 1){ ?>
														<input value="Active" type="button" name="cat_actions" class="btn btn-primary btn-xs" onClick="check_actions('<?php echo $row->user_registeredid; ?>',0);">
													<?php } ?>
													<?php if($row->user_status == 0){ ?>
														<input value="Inactive" type="button"  name="cat_actions" class="btn btn-danger btn-xs " onClick="check_actions('<?php echo $row->user_registeredid; ?>',1);">
													<?php } ?>
													<br/>
													<?php if($row->user_is_featured==0) { ?>
														<b>Featured <input type="checkbox" id="chk_<?php echo $s; ?>" onClick="featuredoption('<?php echo $row->user_id; ?>',1);"></b>
													<?php }else{ ?>
														<b>Featured <input type="checkbox" checked onClick="featuredoption('<?php echo $row->user_id; ?>',0);"></b>
													<?php } ?>
													<br/>
													<?php if($row->user_payment_status==1) { ?>
													<b>Payment Status <i style="color:green;" class="fa fa-check" aria-hidden="true"></i></b>
													<?php } ?>
												</td>
												<td>
													<a href="<?php echo base_url();?>admin/common/editprofile?user_id=<?=$row->user_registeredid;?>"><button type="button" class="btn btn-xs btn-success " value="<?=$row->user_registeredid?>"><i class="fa fa-edit"></i> Edit</button></a>
													<input value="Delete" type="button" id="cat_actions<?php $s; ?>" name="cat_actions" class="btn btn-danger btn-xs " onClick="check_actions('<?php echo $row->user_registeredid; ?>',2);">
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
											<th>Image</th>
											<th>Status</th>
											<th>Manage</th>
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
<?php 
$this->load->view('admin/includes/footer');
?>

<script type="text/javascript">
	function source_modal(){
		$("#user_image_modal").modal("show");
	}
	function web_source_modal(val){
		$("#web_user_image_modal"+val).modal("show");
	}
	function check_actions(catid,st){
		if(st==0){
			swal({
				title: "Are you sure?",
				text: "You want to Change the Status!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, change it!",
				closeOnConfirm: false
			},
			function(){
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_users/" + catid +"/user_registeredid/0/user_status";
			});
		}else if(st==1){
			swal({
				title: "Are you sure?",
				text: "You want to Change the Status!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, change it!",
				closeOnConfirm: false
			},
			function(){
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_users/" + catid +"/user_registeredid/1/user_status";
			});
		}else if(st==2){
			swal({
				title: "Are you sure?",
				text: "You want to Delete entire data related to this!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
			},
			function(){
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_users/" + catid +"/user_registeredid/2/user_status/user_deletedat";
			});
		}
	}
	function profileChange(){
		var profilesid = $('#profileslist').val();
		if(profilesid=="male"){
			window.location= "<?php echo base_url()?>admin/common/secondmarriageprofiles?genderstatus=male";
		}else if(profilesid=="female"){
			window.location= "<?php echo base_url()?>admin/common/secondmarriageprofiles?genderstatus=female";
		}else{
			window.location= "<?php echo base_url()?>admin/common/secondmarriageprofiles";
		}		
	}
	function featuredoption(id,typee){
		if(typee==0){
			var textable = "You want to unset to feature option of this profile!";
		}else{
			var textable = "You want to set to feature option of this profile!";
		}
		console.log(typee);
		swal({
			title: "Are you sure?",
			text: textable,
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, change it!",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(inputValue){
			if (inputValue===false) {
				window.location= "<?php echo base_url()?>admin/common/secondmarriageprofiles";
			}else{
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_users/" + id +"/user_id/"+typee+"/user_is_featured";
			}
		});
	}
</script>
