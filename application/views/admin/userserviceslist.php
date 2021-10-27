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
						<a class="btn btn-primary btn-sm open pull-right" href="<?php echo base_url();?>admin/common/adduserservice" type="button" style="margin-top: -5px;"><i class="fa fa-plus"></i> Add</a>
					</div>
					<div class="form-group" style="margin-top:10px;margin-bottom:50px;">
						<label class="col-sm-2 control-label">Master Services</label>
						<div class="col-sm-5">
							<select id="serviceid" name="serviceid" class="form-control" onChange="serChange();">
								<option value="">Select a service</option>
								<?php 
									if(isset($maserviceslist) && count($maserviceslist)>0){ foreach($maserviceslist as $item){?>
								<?php
									$selected = "";
									if(isset($_GET['sid']) && $_GET['sid']!=""){
										if($item->servicemasterdisplayid==$_GET['sid']){
											$selected = "selected";
										}
									} 
								?>
									<option <?php echo $selected; ?> value="<?php echo $item->servicemasterdisplayid; ?>"><?php echo ucfirst($item->servicemastername); ?></option>
								<?php } } ?>
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
											<th>Service Information</th>
											<th>Cotact Information</th>
											<th>Communication Address</th>
											<th>Services</th>
											<th>Image</th>
											<th>Status</th>
											<th>Manage</th>
										</tr>
									</thead>
									<tbody>					
										<?php  $s=0; foreach ($userserviceslist as $row){ ?>
											<tr>
												<td><?php echo ++$s;?></td>
												<td>
													<?php echo ucfirst($row->servicename); ?><br/>
													<a href="<?php echo base_url(); ?>/admin/common/userserviceslist?sid=<?php echo $row->servicemasterid; ?>"><?php echo ucfirst($row->serviceparentname); ?></a><br/>
													<?php if($row->servicefromdate!=""){ ?>
													Validity From: <?php echo $row->servicefromdate; ?><br/>
													Validity To: <?php echo $row->servicetodate; ?><br/>
													Validity Days: <?php echo $row->servicevaliditydays; ?> day(s)<br/>
													<?php } ?>
												</td>
												<td>
													<?php if($row->serviceemailaddress!=""){ 
														echo $row->serviceemailaddress; ?><br/>
													<?php } ?>
													<?php if($row->serviceprimarycontactnumber!=""){ 
														echo $row->serviceprimarycontactnumber; ?><br/>
													<?php } ?>
													<?php if($row->servicesecondarycontactnumber!=""){ 
														echo $row->servicesecondarycontactnumber; ?><br/>
													<?php } ?>
													<?php if($row->servicelandlinenumber!=""){
														echo $row->servicelandlinenumber; ?><br/>
													<?php } ?>
													<?php if($row->servicewebsite!=""){ ?>
														<a target="_blank" href="<?php echo $row->servicewebsite; ?>"><?php echo $row->servicewebsite; ?></a>
													<?php } ?>					
												</td>
												<td>
													<?php if($row->serviceaddress!=""){ 
														echo $row->serviceaddress; ?><br/>
													<?php } ?>													
												</td>
												<td>
													<?php if($row->serviceskil1!=""){ 
														echo $row->serviceskil1; ?><br/>
													<?php } ?>
													<?php if($row->serviceskil2!=""){ 
														echo ", ".$row->serviceskil2; ?><br/>
													<?php } ?>
													<?php if($row->serviceskil3!=""){ 
														echo ", ".$row->serviceskil3; ?><br/>
													<?php } ?>
													<?php if($row->serviceskil4!=""){
														echo ", ".$row->serviceskil4; ?><br/>
													<?php } ?>			
												</td>
												<td>
													<a href="javascript:void(0);" onClick="web_source_modal();">Web View Image</a><br/>
													<div class="modal fade" id="web_user_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-body mb-0 p-0">
																<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
																<img src="<?php echo base_url().'/userservicepics/'.$row->servicewebimage;?>" style="width:500px;height:auto;" >
																</div>
															</div>
															<div class="modal-footer justify-content-center">
																<button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
												<a href="javascript:void(0);" onClick="web_source_modal();">Mobile View Image</a>	
												<div class="modal fade" id="user_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-body mb-0 p-0">
																<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
																<img src="<?php echo base_url().'/userservicepics/'.$row->servicemobileimage;?>" style="width:500px;height:auto;" >
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
													<?php if($row->servicestatus == 1){ ?>
														<input value="Active" type="button" id="cat_actions" name="cat_actions" class="btn btn-primary btn-xs" onClick="check_actions('<?php echo $row->servicedisplayid; ?>',0);">
													<?php } ?>
													<?php if($row->servicestatus == 0){ ?>
														<input value="Inactive" type="button" id="cat_actions" name="cat_actions" class="btn btn-danger btn-xs " onClick="check_actions('<?php echo $row->servicedisplayid; ?>',1);">
													<?php } ?>
													<br/>
													<?php if(isset($row->servicefeatured) && $row->servicefeatured==1){ ?>
														<b>Featured</b> <i class="fa fa-check" aria-hidden="true" style="color:green;"></i>
													<?php } ?>
												</td>
												<td>
													<a href="<?php echo base_url();?>admin/common/edituserservice?serviceid=<?=$row->servicedisplayid;?>"><button type="button" class="btn btn-xs btn-success " value="<?=$row->servicedisplayid?>"><i class="fa fa-edit"></i> Edit</button></a>
													<input value="Delete" type="button" id="cat_actions" name="cat_actions" class="btn btn-danger btn-xs " onClick="check_actions('<?php echo $row->servicedisplayid; ?>',2);">
												</td>
											</tr>
										<?php }  ?>				
									</tbody>
									<tfoot>
										<tr>
											<th>Sr No.</th>
											<th>Service Information</th>
											<th>Cotact Information</th>
											<th>Communication Address</th>
											<th>Services</th>
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
	function serChange(){
		var serviceid = $('#serviceid').val();
		if(serviceid!=""){
			window.location = "<?php echo base_url(); ?>/admin/common/userserviceslist?sid="+serviceid;
		}else{
			window.location = "<?php echo base_url(); ?>/admin/common/userserviceslist";
		}		
	}
	function source_modal(){
		$("#user_image_modal").modal("show");
	}
	function web_source_modal(){
		$("#web_user_image_modal").modal("show");
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
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_services/" + catid +"/servicedisplayid/0/servicestatus";
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
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_services/" + catid +"/servicedisplayid/1/servicestatus";
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
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_services/" + catid +"/servicedisplayid/2/servicestatus/servicedeletedat";
			});
		}
	}
</script>
