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
<style>
   .dataTables_length{
		display:none;
   }
   div.dataTables_wrapper div.dataTables_filter {
	text-align: left;
   }
   .form-control-sm {
		height: calc(1.5em + .5rem + 2px);
		padding: 1.1rem .5rem;
		font-size: .875rem;
		line-height: 1.5;
		border-radius: .2rem;
   }
   .mt-m30{
		margin-top:-35px;
   }
   @media(max-width: 767px) {
		.mt-m30{
			margin-top:5px;
	   }
	   .banner-sec-titile h2{
			font-size:22px;
	   }
	   .width-1000{
			width:1000px !important;
	   }
   }
</style>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">				
			<div class="col-md-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5><?=$page_title;?></h5>
						<!--<a class="btn btn-primary btn-sm open pull-right" href="<?php echo base_url();?>admin/common/addprofile" type="button" style="margin-top: -5px;"><i class="fa fa-plus"></i> Add</a>-->
					</div>					
					<div class="ibox-content">
						<form method="post" action="<?=base_url();?>admin/common/change_all_status" onsubmit="return confirm('Do you really want to Change the status?');">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover dataTables1" >
									<thead>
										<tr>
											<th>S.No</th>
											<th>Family Head Info</th>
											<th>Blood Reation View</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>					
										<?php if(isset($communityinfo) && count($communityinfo)>0){ $k=1; foreach($communityinfo as $community){ 					
												$profile_parnter_blood_group_name ="";
												if(isset($community->profile_blood_group) && $community->profile_blood_group!=""){
													$profile_parnter_blood_group = $community->profile_blood_group;
													$parnter_blood_group_name = $this->Common_model->get_single_data('ma_bloodgroups',$profile_parnter_blood_group,'bggroupuqid');
													if(isset($parnter_blood_group_name->id) && $parnter_blood_group_name->id!=""){
														$profile_parnter_blood_group_name = $parnter_blood_group_name->bggroup;
													}
												}
												
												$profile_partner_profession_name ="";
												if(isset($community->profile_occupation) && $community->profile_occupation!=""){
													$profile_partner_profession = $community->profile_occupation;
													$profession_name = $this->Common_model->get_single_data('ma_professions',$profile_partner_profession,'professiondisplayid');
													if(isset($profession_name->professionid) && $profession_name->professionid!=""){
														$profile_partner_profession_name = $profession_name->professionname;
													}
												}
												$profile_qualificationn ="";
												if(isset($community->profile_qualification) && $community->profile_qualification!=""){
													$profileQualification = $community->profile_qualification;
													$qualification_name = $this->Common_model->get_single_data('ma_qualification',$profileQualification,'qualificationuqid');
													if(isset($qualification_name->id) && $qualification_name->id!=""){
														$profile_qualificationn = $qualification_name->qualificationname;
													}
												}
												
												$userId = $community->fmid;
											?>
												<tr>
													<td><?php echo $k; ?></td>
													<td>
														<p><b><u>Personal Info</u></b></p>
														<b>Full Name: </b><?php echo ucfirst($community->profile_fullname); ?> <?php echo ucfirst($community->profile_middlename); ?>  <?php echo ucfirst($row->profile_surname); ?><br/>				
														<b>Father Name: </b> <?php echo ucfirst($community->profile_fathername); ?><br/>				
														<b>Mother Name: </b> <?php echo ucfirst($community->profile_mothername); ?><br/>				
														<b>Qualification: </b>  <?php echo ucfirst($profile_qualificationn); ?><br/>				
														<b>Profession: </b>  <?php echo ucfirst($profile_partner_profession_name); ?><br/>				
														<b>Gothram: </b> <?php echo ucfirst($community->profile_gothram); ?><br/>		
														<b>Marital Status: </b> <?php echo ucfirst($community->profile_marital_status); ?><br/>				
														<b>NRI Place: </b> <?php echo ucfirst($community->profile_nri); ?><br/>		
														<b>Date of Birth: </b> <?php echo ucfirst($community->profile_dob); ?><br/>	
														<b>Native District: </b><?php echo ucfirst($community->profile_native_district); ?><br/>				
														<b>Residence Type: </b><?php echo ucfirst($community->profile_residence_type); ?><br/>				
														<b>Present Address: </b><?php echo ucfirst($community->profile_location_area_name); ?><br/>
														<p><b><u>Communication Info</u></b></p>
														<b>Email ID: </b><?php echo $community->profile_email; ?><br/>
														<b>Phone Number: </b><?php echo $community->profile_phone; ?><br/>
														<b>Blood Group: </b><?php echo $profile_parnter_blood_group_name; ?>
													</td>
													<td>
													<a href="javascript:void(0);" onClick="viewRelationDetails('<?php echo $k; ?>');">Full Details</a>
													<?php 
														$boomrelations = $this->Common_model->get_data_status_without_delete_records('ma_family_members_bloods','profile_parentid',$userId,'pmmid','ASC');
													?>
														<div class="modal fade" id="details_modal_<?php echo $k; ?>">
															<div class="modal-dialog modal-xl" style="width:95%;">
																<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title"><?php echo ucfirst($community->profile_fullname); ?></h4>
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																</div>
																	<div class="modal-body table-responsive">
																		<table class="table table-striped table-bordered  width-1000" style="width:100%">
																			<thead>
																				<tr>
																				<th>S.No</th>
																				<th>Family member Names </th>
																				<th>Relation with Head</th>
																				<th>Education</th>
																				<th>Profession</th>
																				<th>Location</th>
																				<th>Phone</th>
																				<th>Blood Group</th>
																				<!--<th>Action</th>-->
																				</tr>
																			</thead>
																			<tbody>
																				<?php if(isset($boomrelations) && count($boomrelations)>0){ $kd=1; foreach($boomrelations as $relationinfo){ ?>
																				<tr>
																					<td><?php echo $kd; ?></td>
																					<td><?php echo ucfirst($relationinfo->profile_partner_member_name); ?></td>
																					<td><?php echo ucfirst($relationinfo->profile_partner_realtion); ?></td>
																					<td><?php echo $relationinfo->profile_partner_qualification_profession_name; ?></td>
																					<td><?php echo $relationinfo->profile_partner_profession_name; ?></td>															
																					<td><?php echo $relationinfo->profile_partner_location; ?></td>
																					<td><?php echo $relationinfo->profile_partner_mobile; ?></td>
																					<td><?php echo $relationinfo->profile_parnter_blood_group_name; ?></td>
																					<!--<td><a href="" class="h3"><i class="fa fa-trash" aria-hidden="true"></i></a></td>-->
																				</tr>
																				<?php $kd++; } }?>														
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</td>	
													<td>
														<a href="<?php echo base_url();?>admin/common/editfamilyprofile?user_id=<?=$community->profile_registeredid;?>"><button type="button" class="btn btn-xs btn-success" ><i class="fa fa-edit"></i> Edit</button></a>
														<input value="Delete" type="button" id="cat_actions<?php $s; ?>" name="cat_actions" class="btn btn-danger btn-xs " onClick="check_actions('<?php echo $community->fmid; ?>',2);">
													</td>
												</tr>						
												<?php $k++; } ?>
											<?php } ?>			
									</tbody>
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
	function viewRelationDetails(k){
		$("#details_modal_"+k).modal('show');
	}	
	// function source_modal(){
		// $("#user_image_modal").modal("show");
	// }
	// function web_source_modal(val){
		// $("#web_user_image_modal"+val).modal("show");
	// }
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
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_family_members/" + catid +"/fmid/0/profile_status";
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
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_family_members/" + catid +"/fmid/1/profile_status";
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
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_family_members/" + catid +"/fmid/2/profile_status/profile_deletedat";
			});
		}
	}
</script>
