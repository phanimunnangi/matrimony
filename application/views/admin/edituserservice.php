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
						<input type="hidden" id="servicedisplayid" name="servicedisplayid" value="<?php echo $servicedetails->servicedisplayid; ?>">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<div class="col-xs-4">
								<p class="margin-top-10">Mater Services <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-8">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<select id="servicemasterid" name="servicemasterid" class="mdl-textfield__input form-control">
										<option value="">Select a service</option>
										<?php 
											if(isset($maserviceslist) && count($maserviceslist)>0){ 
											foreach($maserviceslist as $item){ 
											$selected = "";
											if($item->servicemasterdisplayid==$servicedetails->servicemasterid){
												$selected = "selected";
											}
											?>
											<option <?php echo $selected; ?> value="<?php echo $item->servicemasterdisplayid; ?>"><?php echo ucfirst($item->servicemastername); ?></option>
										<?php } } ?>
									</select>
									<span id="error_servicedisplayid" style="color:red"></span>
								</div>
							</div> 							
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Name <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-8">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="servicename" type="text" name="servicename" value="<?php echo ucfirst($servicedetails->servicename); ?>" placeholder="Service Title">
									<span id="error_servicename" style="color:red"></span>
								</div>
							</div> 							
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Setting <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-4">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<select id="servicefeatured" name="servicefeatured" class="mdl-textfield__input form-control">
										<?php
											$oneSelected = "";
											$twoSelected = "";
											if($servicedetails->servicepriority==1){
												$oneSelected = "selected";
											}else if($servicedetails->servicepriority==0){
												$twoSelected = "selected";
											}
										?>
										<option <?php echo $oneSelected; ?> value="0">No Featured</option>
										<option <?php echo $twoSelected; ?> value="1">Featured</option>
									</select>
									<span id="error_servicefeatured" style="color:red"></span>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input disabled class="mdl-textfield__input form-control" id="servicepriority_display" type="text" name="servicepriority_display" value="<?php if($servicedetails->servicepriority!=0){ echo "Display Priority: ".$servicedetails->servicepriority; }else{ echo "Display-priority:0"; } ?>" placeholder="Display Priority: 0">
								</div>
							</div> 							
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Duration <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-4">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="servicefromdate" type="text" name="servicefromdate" value="<?php echo $servicedetails->servicefromdate; ?>" placeholder="Fromdate">
									<span id="error_servicefromdate" style="color:red"></span>
								</div>
							</div> 							
							<div class="col-xs-4">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="servicetodate" type="text" name="servicetodate" value="<?php echo $servicedetails->servicetodate; ?>" placeholder="Todate">
									<span id="error_servicetodate" style="color:red"></span>
								</div>
							</div> 
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Email <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-8">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="serviceemailaddress" type="email" name="serviceemailaddress" value="<?php echo $servicedetails->serviceemailaddress; ?>" placeholder="Email address">
									<span id="error_serviceemailaddress" style="color:red"></span>
								</div>
							</div> 
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Contact Numbers<sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-4">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="serviceprimarycontactnumber" type="number" name="serviceprimarycontactnumber" value="<?php echo $servicedetails->serviceprimarycontactnumber; ?>" placeholder="Contact Number">
									<span id="error_serviceprimarycontactnumber" style="color:red"></span>
								</div>
							</div> 
							<div class="col-xs-4">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="servicesecondarycontactnumber" type="number" name="servicesecondarycontactnumber" value="<?php echo $servicedetails->servicesecondarycontactnumber; ?>" placeholder="Second Contact Number">
									<span id="error_servicesecondarycontactnumber" style="color:red"></span>
								</div>
							</div> 
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Land line number</p>
							</div>
							<?php
								$codeN ="";
								$codeNumber ="";
								if($servicedetails->servicelandlinenumber!=""){
									$explodeData = explode('-',$servicedetails->servicelandlinenumber);
									$codeN      = trim($explodeData[0]);
									$codeNumber = trim($explodeData[1]);
								}
							?>
							<div class="col-xs-2">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="servicelandlinenumber_c" type="text" name="servicelandlinenumber_c" value="<?php echo $codeN; ?>" placeholder="Code Eg: 040">
									<span id="error_servicelandlinenumber_c" style="color:red"></span>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="servicelandlinenumber" type="text" name="servicelandlinenumber" value="<?php echo $codeNumber; ?>" placeholder="Land line number">
									<span id="error_servicelandlinenumber" style="color:red"></span>
								</div>
							</div> 
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Communication Address <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-8">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<textarea class="mdl-textfield__input form-control" id="serviceaddress" name="serviceaddress" rows="4" cols="50" placeholder="Address"><?php echo $servicedetails->serviceaddress; ?></textarea>
									<span id="error_serviceaddress" style="color:red"></span>
								</div>
							</div> 
							<div class="clearfix"></div> <br>
							
							<div class="col-xs-4">
								<p class="margin-top-10">Website</p>
							</div>
							<div class="col-xs-8">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="servicewebsite" type="text" name="servicewebsite" value="<?php echo $servicedetails->servicewebsite; ?>" placeholder="https://www.google.com">
									<span id="error_servicewebsite" style="color:red"></span>
								</div>
							</div> 
							
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">Services <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-4">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="serviceskil1" type="text" name="serviceskil1" value="<?php echo $servicedetails->serviceskil1; ?>" placeholder="Service1">
									<span id="error_serviceskil1" style="color:red"></span>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="serviceskil2" type="text" name="serviceskil2" value="<?php echo $servicedetails->serviceskil2; ?>" placeholder="Service2">
									<span id="error_serviceskil2" style="color:red"></span>
								</div>
							</div>
							<div class="clearfix"></div> <br>
							<div class="col-xs-4">
								<p class="margin-top-10">&nbsp;</p>
							</div>
							<div class="col-xs-4">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="serviceskil3" type="text" name="serviceskil3" value="<?php echo $servicedetails->serviceskil3; ?>" placeholder="Service3">
									<span id="error_serviceskil3" style="color:red"></span>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<input class="mdl-textfield__input form-control" id="serviceskil4" type="text" name="serviceskil4" value="<?php echo $servicedetails->serviceskil4; ?>" placeholder="Service4">
									<span id="error_serviceskil4" style="color:red"></span>
								</div>
							</div>							
							<div class="clearfix"></div> <br>
							
							<div class="col-xs-4">
								<p class="margin-top-10">Web Image <sup style="color:red">*</sup></p>
							</div>
							<div class="col-xs-4"> 
								<input type="file" name="servicewebimage" id="servicewebimage"  class="form-control" />
								<span id="error_servicewebimage" style="color:red;"></span>
							</div>
							<div class="col-xs-4"> 
								<div class="modal fade" id="web_user_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-body mb-0 p-0">
												<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
												<img src="<?php echo base_url().'/userservicepics/'.$servicedetails->servicewebimage;?>" style="width:500px;height:auto;" >
												</div>
											</div>
											<div class="modal-footer justify-content-center">
												<button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<a href="javascript:void(0);" onClick="web_source_modal();">View Image</a>	
								<input type="hidden" name="h_servicewebimage" id="h_servicewebimage" value="<?php echo ucfirst($servicedetails->servicewebimage); ?>">
							</div>
							<div class="clearfix"></div><br>							
							<div class="col-xs-4">
								<p class="margin-top-10">Mobile Image </p>
							</div>
							<?php if($servicedetails->servicemobileimage){ ?>
								<div class="col-xs-4">  
									<input accept="image/*" type="file" id="servicemobileimage" name="servicemobileimage" class="form-control" />
									<span id="error_servicemobileimage" style="color:red;"></span>
								</div>
								<div class="col-xs-4"> 
									<a href="javascript:void(0);" onClick="source_modal();">View Image</a>					
									<input type="hidden" name="h_servicemobileimage" id="h_servicemobileimage" value="<?php echo ucfirst($servicedetails->servicemobileimage); ?>">
								</div>
								<div class="modal fade" id="user_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-body mb-0 p-0">
												<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
												<img src="<?php echo base_url().'/userservicepics/'.$servicedetails->servicemobileimage;?>" style="width:500px;height:auto;" >
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
									<input accept="image/*" type="file" id="servicemobileimage" name="servicemobileimage" class="form-control" />
									<span id="error_servicemobileimage" style="color:red;"></span>
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
			var servicedisplayid              = $("#servicedisplayid").val();
			var servicename                   = $("#servicename").val();
			var serviceemailaddress           = $("#serviceemailaddress").val();
			var serviceprimarycontactnumber   = $("#serviceprimarycontactnumber").val();
			var serviceaddress                = $("#serviceaddress").val();
			var servicewebimage               = $("#servicewebimage").val();
			var h_servicewebimage             = $("#h_servicewebimage").val();
			var serviceskil1                  = $("#serviceskil1").val();
			var servicefromdate               = $("#servicefromdate").val();
			var servicetodate                 = $("#servicetodate").val();
			if(servicedisplayid==""){
				flag = false;
				$("#error_servicedisplayid").html("Parent service is required.");
			}else{
				$("#error_servicedisplayid").html("");
			}
			if(servicename==""){
				flag = false;
				$("#error_servicename").html("Service name is required.");
			}else{
				$("#error_servicename").html("");
			}
			if(serviceemailaddress==""){
				flag = false;
				$("#error_serviceemailaddress").html("Email address is required.");
			}else{
				$("#error_serviceemailaddress").html("");
			}
			if(serviceprimarycontactnumber==""){
				flag = false;
				$("#error_serviceprimarycontactnumber").html("Primary contact number is required.");
			}else{
				$("#error_serviceprimarycontactnumber").html("");
			}
			if(serviceaddress==""){
				flag = false;
				$("#error_serviceaddress").html("Address is required.");
			}else{
				$("#error_serviceaddress").html("");
			}
			if(serviceaddress==""){
				flag = false;
				$("#error_serviceaddress").html("Address is required.");
			}else{
				$("#error_serviceaddress").html("");
			}		
			if(h_servicewebimage==""){
				if(servicewebimage==""){
					flag = false;
					$("#error_servicewebimage").html("Service web image is required.");
				}else{
					$("#error_servicewebimage").html("");
				}
			}
			// if(servicemastermobileimage==""){
				// flag = false;
				// $("#error_servicemastermobileimage").html("Service mobile image is required.");
			// }else{
				// $("#error_servicemastermobileimage").html("");
			// }
			if(serviceskil1==""){
				flag = false;
				$("#error_serviceskil1").html("Additional Service is required.");
			}else{
				$("#error_serviceskil1").html("");
			}
			if(servicefromdate==""){
				flag = false;
				$("#error_servicefromdate").html("Service from date is required.");
			}else{
				$("#error_servicefromdate").html("");
			}
			if(servicetodate==""){
				flag = false;
				$("#error_servicetodate").html("Service from date is required.");
			}else{
				$("#error_servicetodate").html("");
			}
			
			if(flag==false){
				return false;
			}else{
				$("#cate_form").submit();
			}
		}
	</script>