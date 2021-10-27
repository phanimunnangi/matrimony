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
<div class="page-banner">
   <img src="<?php echo base_url(); ?>assets/images/banners/page-banners/page-banner-img1.jpg" alt="Image" class="img-fluid">
   <div class="container px-md-0 text-white text-center  d-md-block banner-sec-titile">
      <h2 class="text-weight-semi-bold">View Profile</h2>
   </div>
</div>
<div class="py-4 container ">
   <div class="row ">
      <div class="col-md-12 d-flex justify-content-between" style="width:100%;overflow-x:auto;">
		 <a href="javascript:void(0);" onClick="serachAlph('all');">
			<?php 
				$selectedItemm="";
				if(isset($_GET['alphserach']) && $_GET['alphserach']=="all"){ 
					$selectedItemm = 'active-alph';
				}
			?>
            <div class="btn-alph <?php echo $selectedItem; ?>">View All</div>
         </a>
		<?php foreach( range('A', 'Z') as $elements) { 
			$selectedItem ="";
			if(isset($_GET['alphserach']) && $_GET['alphserach']!=""){
				if($_GET['alphserach']==$elements){
					$selectedItem = 'active-alph';
				}				
			}		
		?>
         <a href="javascript:void(0);" onClick="serachAlph('<?php echo $elements; ?>');">
            <div class="btn-alph <?php echo $selectedItem; ?>"><?php echo $elements; ?></div>
         </a>
		<?php } ?>        
      </div>
   </div>
   <input type="hidden" id="hid_alph" name="hid_alph" value="<?php if(isset($_GET['alphserach']) && $_GET['alphserach']!=""){ echo $_GET['alphserach']; } ?>">
   <div class="row d-flex justify-content-between mt-4">
      <div class="col-md-6">
         <h4>Community Details</h4>
      </div>
      <div class="col-md-2" style="z-index:100">
         <select class="form-control" id="bloodgroup" name="bloodgroup" onChange="filterBloodGroup();">
            <option value="">All Blood Group</option>
			<?php if(isset($bloodgroupsslistt) && count($bloodgroupsslistt)>0){ foreach($bloodgroupsslistt as $bloodgroup){
				$selected ="";				
				if(isset($_GET['bloodgroup']) && $_GET['bloodgroup']!=""){
					if($_GET['bloodgroup']==$bloodgroup->bggroupuqid){
						$selected = "selected";
					}
				}
			?>
				<option <?php echo $selected; ?> value="<?php echo $bloodgroup->bggroupuqid; ?>"><?php echo $bloodgroup->bggroup; ?></option>
			<?php } } ?>
         </select>
      </div>
   </div>
   <div class="row mt-m30">
      <div class="col-sm-12 ">
         <div class="table-responsive">
            <table id="coummunity_detais" class="table table-striped table-bordered  dt-responsive nowrap" style="width:100%">
               <thead>
                  <tr>
                     <th>S.No</th>
                     <th>Head of Family Name </th>
                     <th>Community</th>
                     <th>Location</th>
                     <th>Phone No</th>
                     <th>Blood Group</th>
                     <th>View</th>
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
						$userId = $community->fmid;
					?>
						<tr>
							<td><?php echo $k; ?></td>
							<td><?php echo ucfirst($community->profile_fullname); ?></td>
							<td><?php echo ucfirst($profile_partner_profession_name); ?></td>
							<td><?php echo ucfirst($community->profile_location_area_name); ?></td>
							<td><?php echo $community->profile_phone; ?></td>
							<td><?php echo $profile_parnter_blood_group_name; ?>
							<?php 
								$boomrelations = $this->Common_model->get_data_status_without_delete_records('ma_family_members_bloods','profile_parentid',$userId,'pmmid','ASC');
							?>
								
								<div class="modal fade" id="details_modal_<?php echo $k; ?>">
									<div class="modal-dialog modal-xl">
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
							<td><button class="btn btn-main btn-xs btn-sm rounded-2" onClick="viewRelationDetails('<?php echo $k; ?>');">Full Details</button></td>
						</tr>						
						<?php $k++; } ?>
					<?php } ?>
				</tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<script>
$(document).ready(function() {
	$('#coummunity_detais').DataTable();
});
function viewRelationDetails(k){
	$("#details_modal_"+k).modal('show');
}	
function serachAlph(letter){
	var bloodgroup = $("#bloodgroup").val();
	var hid_alph   = letter;
	if(hid_alph!="all"){
		if(bloodgroup!=""){
			window.location = "<?php echo base_url(); ?>communitydetails?alphserach="+hid_alph+"&bloodgroup="+bloodgroup;
		}else{
			window.location = "<?php echo base_url(); ?>communitydetails?alphserach="+hid_alph;
		}		
	}else{
		window.location = "<?php echo base_url(); ?>communitydetails";
	}
}
function filterBloodGroup(){
	var bloodgroup = $("#bloodgroup").val();
	var hid_alph   = $("#hid_alph").val();
	if(hid_alph!="all"){
		if(bloodgroup!=""){
			window.location = "<?php echo base_url(); ?>communitydetails?alphserach="+hid_alph+"&bloodgroup="+bloodgroup;
		}else{
			window.location = "<?php echo base_url(); ?>communitydetails?alphserach="+hid_alph;
		}
	}else{
		if(bloodgroup!=""){
			window.location = "<?php echo base_url(); ?>communitydetails?bloodgroup="+bloodgroup;
		}else{
			window.location = "<?php echo base_url(); ?>communitydetails";
		}
	}
}
</script>