<style type="text/css">
	.avoid-clicks { pointer-events: none; }
</style>
<div class="row  border-bottom white-bg page-heading">
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
<div class="wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?=$page_title;?></h5>
                    <a class="btn btn-primary btn-sm pull-right" href="#" type="button" style="margin-top: -5px;" onclick="window.history.go(-1)"><i class="fa fa-angle-double-left"></i> Back</a>
                </div>
                <div class="ibox-content">
					<form method="POST" enctype="multipart/form-data" id="cate_form" name="cate_form">
						<input type="hidden" id="ssdisplayid" name="ssdisplayid" value="<?php echo $ssdetails->ssdisplayid; ?>">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<div class="col-xs-4">
								<p class="margin-top-10">Name <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-8">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="ssname" type="text" name="ssname" value="<?php echo $ssdetails->ssname; ?>">
									<span id="error_ssname" style="color:red"></span>
								</div>
							</div> 
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Description <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-8">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<textarea rows="10" cols="50" class="mdl-textfield__input form-control" id="sstext" name="sstext"><?php echo $ssdetails->sstext; ?></textarea>
									<span id="error_sstext" style="color:red"></span>
								</div>
							</div> 
							<div class="clearfix"></div> <br>						
						</div>
					</div>
					<div class="pull-left"><br>
					<input type="button" name="cat_submit" onClick="community_validate();" value="Update" id="cat_submit" class="btn btn-primary btn-round col-xs-12">
					</div>
					<div class="clearfix"></div>
					</form>
                </div>
            </div>
        </div>
    </div>
    <?php
		$this->load->view('admin/includes/footer');
    ?>
    <script>
		function community_validate(){
			var flag = true;
			var ssname = $("#ssname").val();
			var sstext = $("#sstext").val();
			if(ssname==""){
				flag = false;
				$("#error_ssname").html("Name is required.");
			}else{
				$("#error_ssname").html("");
			}
			if(sstext==""){
				flag = false;
				$("#error_sstext").html("Description is required.");
			}else{
				$("#error_sstext").html("");
			}
			if(flag==false){
				return false;
			}else{
				$("#cate_form").submit();
			}
		}
	</script>