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
						<input type="hidden" id="bannerdisplayid" name="bannerdisplayid" value="<?php echo $bannerdetails->bannerdisplayid; ?>">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<div class="col-xs-4">
								<p class="margin-top-10">Name <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-8">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="bannertitle" type="text" name="bannertitle" value="<?php echo ucfirst($bannerdetails->bannertitle); ?>">
									<span id="error_bannertitle" style="color:red"></span>
								</div>
							</div> 
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Web Image <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-4"> 
								<input type="file" name="bannerwebimage" id="bannerwebimage"  class="form-control" />
								<span id="error_bannerwebimage" style="color:red;"></span>
							</div>
							<div class="col-xs-4"> 
								<div class="modal fade" id="web_user_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-body mb-0 p-0">
												<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
												<img src="<?php echo base_url().'/bannerpics/'.$bannerdetails->bannerwebimage;?>" style="width:500px;height:auto;" >
												</div>
											</div>
											<div class="modal-footer justify-content-center">
												<button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<a href="javascript:void(0);" onClick="web_source_modal();">View Image</a>	
								<input type="hidden" name="h_bannerwebimage" id="h_bannerwebimage" value="<?php echo ucfirst($bannerdetails->bannerwebimage); ?>">
							</div>
							<div class="clearfix"></div><br>							
							<div class="col-xs-4">
								<p class="margin-top-10">Mobile Image </p>
							</div>
							<?php if($bannerdetails->bannermobileimage){ ?>
								<div class="col-xs-4">  
									<input accept="image/*" type="file" id="bannermobileimage" name="bannermobileimage" class="form-control" />
									<span id="error_bannermobileimage" style="color:red;"></span>
								</div>
								<div class="col-xs-4"> 
									<a href="javascript:void(0);" onClick="source_modal();">View Image</a>					
									<input type="hidden" name="h_bannermobileimage" id="h_bannermobileimage" value="<?php echo ucfirst($bannerdetails->bannermobileimage); ?>">
								</div>
								<div class="modal fade" id="user_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-body mb-0 p-0">
												<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
												<img src="<?php echo base_url().'/bannerpics/'.$servicedetails->bannermobileimage;?>" style="width:500px;height:auto;" >
												</div>
											</div>
											<div class="modal-footer justify-content-center">
												<button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							<?php }else{ ?>
								<div class="col-xs-8">  
									<input accept="image/*" type="file" id="bannermobileimage" name="bannermobileimage" class="form-control" />
									<span id="error_bannermobileimage" style="color:red;"></span>
								</div>
							<?php } ?>
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
			var bannertitle        = $("#bannertitle").val();
			var bannerwebimage     = $("#bannerwebimage").val();
			var bannermobileimage  = $("#bannermobileimage").val();
			if(bannertitle==""){
				flag = false;
				$("#error_bannertitle").html("Banner tittle is required.");
			}else{
				$("#error_bannertitle").html("");
			}
			if(h_bannerwebimage==""){
				if(bannerwebimage==""){
					flag = false;
					$("#error_bannerwebimage").html("Banner web image is required.");
				}else{
					$("#error_bannerwebimage").html("");
				}
			}
			// if(servicemastermobileimage==""){
				// flag = false;
				// $("#error_servicemastermobileimage").html("Service mobile image is required.");
			// }else{
				// $("#error_servicemastermobileimage").html("");
			// }
			
			if(flag==false){
				return false;
			}else{
				$("#cate_form").submit();
			}
		}
	</script>