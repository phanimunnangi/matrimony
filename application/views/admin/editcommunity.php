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
						<input type="hidden" id="communitydisplayid" name="communitydisplayid" value="<?php echo $communitydetails->communitydisplayid; ?>">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<div class="col-xs-4">
								<p class="margin-top-10">Name <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-8">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="communityname" type="text" name="communityname" value="<?php echo ucfirst($communitydetails->communityname); ?>">
									<span id="error_communityname" style="color:red"></span>
								</div>
							</div> 
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Tag Line </p>
							</div>
							<div class="col-xs-8">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="communitytagline" type="text" name="communitytagline" value="<?php echo ucfirst($communitydetails->communitytagline); ?>">
									<span id="error_communitytagline" style="color:red"></span>
								</div>
							</div> 
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Web Image <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-4"> 
								<input type="file" name="communitywebimage" id="communitywebimage"  class="form-control" />
								<span id="error_communitywebimage" style="color:red;"></span>
							</div>
							<div class="col-xs-4"> 
								<div class="modal fade" id="web_user_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-body mb-0 p-0">
												<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
												<img src="<?php echo base_url().'/communitypics/'.$communitydetails->communitywebimage;?>" style="width:500px;height:auto;" >
												</div>
											</div>
											<div class="modal-footer justify-content-center">
												<button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<a href="javascript:void(0);" onClick="web_source_modal();">View Image</a>	
								<input type="hidden" name="h_communitywebimage" id="h_communitywebimage" value="<?php echo ucfirst($communitydetails->communitywebimage); ?>">
							</div>
							<div class="clearfix"></div><br>							
							<div class="col-xs-4">
								<p class="margin-top-10">Mobile Image </p>
							</div>
							<?php if($communitydetails->communitymobileimage){ ?>
								<div class="col-xs-4">  
									<input accept="image/*" type="file" id="communitymobileimage" name="communitymobileimage" class="form-control" />
									<span id="error_communitymobileimage" style="color:red;"></span>
								</div>
								<div class="col-xs-4"> 
									<a href="javascript:void(0);" onClick="source_modal();">View Image</a>					
									<input type="hidden" name="h_communitymobileimage" id="h_communitymobileimage" value="<?php echo ucfirst($communitydetails->communitywebimage); ?>">
								</div>
								<div class="modal fade" id="user_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-body mb-0 p-0">
												<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
												<img src="<?php echo base_url().'/communitypics/'.$communitydetails->communitymobileimage;?>" style="width:500px;height:auto;" >
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
									<input accept="image/*" type="file" id="communitymobileimage" name="communitymobileimage" class="form-control" />
									<span id="error_communitymobileimage" style="color:red;"></span>
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
		function source_modal(){
			$("#user_image_modal").modal("show");
		}
		function web_source_modal(){
			$("#web_user_image_modal").modal("show");
		}
		function community_validate(){
			var flag = true;
			var communityname        = $("#communityname").val();
			var communitytagline     = $("#communitytagline").val();
			var communitywebimage    = $("#communitywebimage").val();
			var h_communitywebimage    = $("#h_communitywebimage").val();
			var communitymobileimage = $("#communitymobileimage").val();
			if(communityname==""){
				flag = false;
				$("#error_communityname").html("Community name is required.");
			}else{
				$("#error_communityname").html("");
			}
			// if(communitytagline==""){
				// flag = false;
				// $("#error_communitytagline").html("Community tag line is required.");
			// }else{
				// $("#error_communitytagline").html("");
			// }
			if(h_communitywebimage==""){
				if(communitywebimage==""){
					flag = false;
					$("#error_communitywebimage").html("Community web image is required.");
				}else{
					$("#error_communitywebimage").html("");
				}	
			}
			
			// if(communitymobileimage==""){
				// flag = false;
				// $("#error_communitymobileimage").html("Community mobile image is required.");
			// }else{
				// $("#error_communitymobileimage").html("");
			// }
			
			if(flag==false){
				return false;
			}else{
				$("#cate_form").submit();
			}
		}
	</script>