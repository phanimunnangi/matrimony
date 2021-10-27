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
					</div>
					<div class="ibox-content">
						<form method="post" action="<?=base_url();?>admin/common/change_all_status" onsubmit="return confirm('Do you really want to Change the status?');">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover dataTables1" >
									<thead>
										<tr>
											<th>Sr No.</th>
											<th>Name</th>
										</tr>
									</thead>
									<tbody>					
										<?php  $s=0; foreach ($mastars as $row){ ?>
											<tr>
												<td><?php echo ++$s;?></td>
												<td>
													<?php echo ucfirst($row->starname); ?><br/>
												</td>
											</tr>
										<?php }  ?>				
									</tbody>
									<tfoot>
										<tr>
											<th>Sr No.</th>
											<th>Name</th>
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
