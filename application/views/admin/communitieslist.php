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
						<?php if(isset($macommunities) && !empty($macommunities) && count($macommunities)>0){ ?>		
						<?php }else{ ?> 
							<a class="btn btn-primary btn-sm open pull-right" href="<?php echo base_url();?>admin/settings/addcommunity" type="button" style="margin-top: -5px;"><i class="fa fa-plus"></i> Add</a>
						<?php } ?>
					</div>
					<div class="ibox-content">
						<form method="post" action="<?=base_url();?>admin/common/change_all_status" onsubmit="return confirm('Do you really want to Change the status?');">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover dataTables1" >
									<thead>
										<tr>
											<th>Sr No.</th>
											<th>Name</th>
											<th>Image</th>
											<th>Manage</th>
										</tr>
									</thead>
									<tbody>					
										<?php  $s=0; foreach ($macommunities as $row){ ?>
											<tr>
												<td><?php echo ++$s;?></td>
												<td>
													<?php echo ucfirst($row->communityname); ?><br/>
													<?php echo $row->communitytagline;?>
												</td>
												<td>
													<a href="javascript:void(0);" onClick="web_source_modal();">Web View Image</a><br/>
													<div class="modal fade" id="web_user_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-body mb-0 p-0">
																<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
																<img src="<?php echo base_url().'/communitypics/'.$row->communitywebimage;?>" style="width:500px;height:auto;" >
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
																<img src="<?php echo base_url().'/communitypics/'.$row->communitymobileimage;?>" style="width:500px;height:auto;" >
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
													<a href="<?php echo base_url();?>admin/settings/editcommunity?communityid=<?=$row->communitydisplayid;?>"><button type="button" class="btn btn-xs btn-success " value="<?=$row->communitydisplayid?>"><i class="fa fa-edit"></i> Edit</button></a>
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
function source_modal(){
	$("#user_image_modal").modal("show");
}
function web_source_modal(){
	$("#web_user_image_modal").modal("show");
}
</script>
