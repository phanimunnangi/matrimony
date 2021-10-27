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
						<a class="btn btn-primary btn-sm open pull-right" href="<?php echo base_url();?>admin/settings/addsubcaste" type="button" style="margin-top: -5px;"><i class="fa fa-plus"></i> Add</a>
					</div>
					<div class="ibox-content">
						<form method="post" action="<?=base_url();?>admin/common/change_all_status" onsubmit="return confirm('Do you really want to Change the status?');">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover dataTables1" >
									<thead>
										<tr>
											<th>Sr No.</th>
											<th>Name</th>
											<th>Status</th>
											<th>Manage</th>
										</tr>
									</thead>
									<tbody>					
										<?php  $s=0; foreach ($masubcasteslist as $row){ ?>
											<tr>
												<td><?php echo ++$s;?></td>
												<td><?php echo ucfirst($row->subcastename); ?></td>
												<td>
													<?php if($row->subcastestatus == 1){ ?>
														<input value="Active" type="button" id="cat_actions" name="cat_actions" class="btn btn-primary btn-xs" onClick="check_actions('<?php echo $row->subcastedisplayid; ?>',0);">
													<?php } ?>
													<?php if($row->subcastestatus == 0){ ?>
														<input value="Inactive" type="button" id="cat_actions" name="cat_actions" class="btn btn-danger btn-xs " onClick="check_actions('<?php echo $row->subcastedisplayid; ?>',1);">
													<?php } ?>
												</td>
												<td>
													<a href="<?php echo base_url();?>admin/settings/editsubcaste?subcasteid=<?=$row->subcastedisplayid;?>"><button type="button" class="btn btn-xs btn-success " value="<?=$row->subcastedisplayid?>"><i class="fa fa-edit"></i> Edit</button></a>
													<input value="Delete" type="button" id="cat_actions" name="cat_actions" class="btn btn-danger btn-xs " onClick="check_actions('<?php echo $row->subcastedisplayid; ?>',2);">
												</td>
											</tr>
										<?php }  ?>				
									</tbody>
									<tfoot>
										<tr>
											<th>Sr No.</th>
											<th>Name</th>
											<th>Image</th>
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
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_community_subcastes/" + catid +"/subcastedisplayid/0/subcastestatus";
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
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_community_subcastes/" + catid +"/subcastedisplayid/1/subcastestatus";
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
				window.location= "<?php echo base_url()?>admin/settings/status_actions/ma_community_subcastes/" + catid +"/subcastedisplayid/2/subcastestatus/subcastedeletedat";
			});
		}
	}
</script>
