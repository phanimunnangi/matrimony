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
	<div class="col-lg-2"></div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5><?=$page_title;?></h5>
			</div>
			<div class="ibox-content">
				<?php foreach ($details as $detail) { ?>
					<form method="post" class="form-horizontal" action="" autocomplete="off">
                        <div class="form-group"><label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" required="" value="<?php echo $detail->adminloginname;?>">
                            </div>
						</div>
						<div class="hr-line-dashed"></div>
					<div class="form-group"><label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">	
							<input type="password" class="form-control" name="password" >
							<span class="text-danger">Fill the password if you want to change.</span>
						</div>
					</div>
					<div class="hr-line-dashed"></div>
						<div class="form-group"><label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email" value="<?php echo $detail->adminloginemail;?>" required="">
							</div>
						</div>
						<input type="hidden" name="id" value="<?php echo $detail->adminloginid;?>">
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<input type="submit" name="submit" class="btn btn-primary" value="Save changes">
							</div>
						</div>
					</form>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php 
		$this->load->view('admin/includes/footer');
	?>
<script>	
	CKEDITOR.replace( 'location' );
</script>