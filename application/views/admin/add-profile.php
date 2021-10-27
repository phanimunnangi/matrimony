<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
	.avoid-clicks { pointer-events: none; }
</style>
<div class="row  border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?=$page_title;?></h2>
        <ol class="breadcrumb"> 
            <li>
                <a href="<?=base_url();?>/admin/user-management">User Management</a>
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
            </div>
			<div class="box-body mandatory_color">						
				<div class="panel with-nav-tabs panel-default">
					<div class="panel-heading">
						<ul id="rowTab" class="nav nav-tabs">
							<li class="active"><a href="#tab1default" data-toggle="tab">Personal Details</a></li>
							<li><a href="#tab2default" data-toggle="tab">Educational Details</a></li>
							<li><a href="#tab3default" data-toggle="tab">Communcation Details</a></li>		
							<li><a href="#tab4default" data-toggle="tab">Prefered Partner Details</a></li>	
							<li><a href="#tab5default" data-toggle="tab">Family Details</a></li>		
							<li><a href="#tab6default" data-toggle="tab">Photo Graph</a></li>		
						</ul>
					</div>
					<form class="form-horizontal"  method="POST" name="add_profile" id="add_profile" enctype="multipart/form-data" action="<?php echo base_url();?>admin/Common/saveuserprofiledata">
						<input type="hidden" id="user_id" name="user_id" value="">
						<div class="panel-body">
							<div class="tab-content">
							<input type="hidden" id="tab1V" name="tab1V" value="0">
							<input type="hidden" id="tab3V" name="tab3V" value="0">
							<input type="hidden" id="tab7V" name="tab7V" value="1">
								<div class="tab-pane fade in active" id="tab1default">
									<div class="form-horizontal">
										<div class="box-body mandatory_color">							
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_last_name" class="col-sm-4 control-label">NRI</label>
															<div class="col-sm-8">
																<input type="checkbox" class="form-control" id="user_is_nri" name="user_is_nri" placeholder="User Name">
																<span id="error_user_is_nri" style="color:red"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6 hidden">
														<div class="form-group">
															<label for="u_last_name" class="col-sm-4 control-label">Second Marriage</label>
															<div class="col-sm-8">
																<input type="checkbox" class="form-control" id="user_is_secondmarriageprofile" name="user_is_secondmarriageprofile" placeholder="Second Marriage">
																<span id="error_user_is_secondmarriageprofile" style="color:red"></span>
															</div>
														</div>	
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_last_name" class="col-sm-4 control-label">User Name <sup>*</sup></label>
															<div class="col-sm-8">
																<input type="text" required class="form-control" id="user_display_name" name="user_display_name" placeholder="User Name">
															<span id="error_user_display_name" style="color:red"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_last_name" class="col-sm-4 control-label">Sur Name<sup>*</sup></label>
															<div class="col-sm-8">
																<input type="text" required class="form-control" id="upd_surname" name="upd_surname" placeholder="Sur Name">
															<span id="error_upd_surname" style="color:red"></span>
															</div>
														</div>	
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_last_name" class="col-sm-4 control-label">Father Name <sup>*</sup></label>
															<div class="col-sm-8">
																<input type="text" required class="form-control" id="upd_fathername" name="upd_fathername" placeholder="Father Name">
															<span id="error_upd_fathername" style="color:red"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_last_name" class="col-sm-4 control-label">Mother Name<sup>*</sup></label>
															<div class="col-sm-8">
																<input type="text" required class="form-control" id="upd_mothername" name="upd_mothername" placeholder="Mother Name">
															<span id="error_upd_mothername" style="color:red"></span>
															</div>
														</div>	
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_last_name" class="col-sm-4 control-label">Date of Birth<sup>*</sup></label>
															<div class="col-sm-5">
																<input type="text" required style="background-color:#ffffff" readOnly="true" id="upi_dateofbirth" name="upi_dateofbirth" class="form-control" placeholder="Date of Birth"/>
																<span id="age_validation" style="color:#a94442"></span>
															</div>
															<div class="col-sm-3">
																<input type="text"  style="background-color:#ffffff" readOnly="true" id="upi_age" name="upi_age" class="form-control" placeholder="Age" maxlength="2"/>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_last_name" class="col-sm-4 control-label">Time of Birth</label>
															<div class="col-sm-4">
																<select id="upi_birth_timings_h" name="upi_birth_timings_h" class="form-control">
																	<?php for($i=0;$i<=23;$i++){ ?>
																		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
																	<?php } ?>
																</select>
																<span id="error_upi_birth_timings" style="color:#a94442"></span>
															</div>
															<div class="col-sm-4">
																<select id="upi_birth_timings_m" name="upi_birth_timings_m" class="form-control" >
																	<?php for($j=0;$j<=59;$j++){ ?>
																		<option value="<?php echo $j; ?>"><?php echo $j; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>	
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Place of birth</label>
															<div class="col-sm-8">
															<input type="text" id="upi_birthplace" name="upi_birthplace" class="form-control" placeholder="Place of Birth"/>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">NRI living country name </label>
															<div class="col-sm-8">
																<input type="text" id="upi_nri_living_country_name" name="upi_nri_living_country_name" class="form-control" placeholder="NRI living country name"/>
															</div>
														</div>
													</div>
												</div>												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Gothram</label>
															<div class="col-sm-8">
															<input type="text" id="upi_gothram" name="upi_gothram" class="form-control" placeholder="Gothram"/>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Caste <sup>*</sup></label>
															<div class="col-sm-8">
																<select required id="upi_caste" name="upi_caste" class="form-control" >
																	<option value="">Select a Caste</option>
																	<?php if(isset($subcasteslist) && !empty($subcasteslist) && count($subcasteslist)>0){ foreach($subcasteslist as $caste){ ?>
																	<option value="<?php echo $caste->subcastedisplayid.'-'.ucfirst($caste->subcastename); ?>"><?php echo ucfirst($caste->subcastename); ?></option>
																	<?php } } ?>
																</select>
																<span id="error_upi_caste" style="color:red"></span>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Star </label>
															<div class="col-sm-8">
																<select id="upi_star" name="upi_star" class="form-control" >
																	<option value="">Select a Star</option>
																	<?php if(isset($starslist) && !empty($starslist) && count($starslist)>0){ foreach($starslist as $stars){ ?>
																	<option value="<?php echo $stars->stardisplayid.'-'.ucfirst($stars->starname); ?>"><?php echo ucfirst($stars->starname); ?></option>
																	<?php } } ?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Padam </label>
															<div class="col-sm-8">
																<select id="upi_leg" name="upi_leg" class="form-control" >
																	<option value="">Select a Padam</option>
																	<?php if(isset($legs) && !empty($legs) && count($starslist)>0){ foreach($legs as $leg){ ?>
																	<option value="<?php echo $leg->legdisplayid.'-'.ucfirst($leg->legvalue); ?>"><?php echo ucfirst($leg->legvalue); ?></option>
																	<?php } } ?>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Rassi</label>
															<div class="col-sm-8">
																<select id="upi_rassi" name="upi_rassi" class="form-control" >
																	<option value="">Select a Rassi</option>
																	<?php if(isset($raasislist) && !empty($raasislist) && count($raasislist)>0){ foreach($raasislist as $raasi){ ?>
																	<option value="<?php echo $raasi->raasidisplayid.'-'.ucfirst($raasi->raasiname); ?>"><?php echo ucfirst($raasi->raasiname); ?></option>
																	<?php } } ?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Manglik</label>
															<div class="col-sm-8">
																<select id="upi_manglik_status" name="upi_manglik_status" class="form-control" >
																	<option value="No">No</option>
																	<option value="Yes">Yes</option>
																	<option value="No Idea">No Idea</option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Height <sup>*</sup></label>
															<div class="col-sm-8">
																<select required id="upi_height" name="upi_height" class="form-control" >
																	<option value="">Select a height</option>
																	<?php if(isset($heightslist) && !empty($heightslist) && count($heightslist)>0){ foreach($heightslist as $height){ ?>
																	<option value="<?php echo $height->heightvalue; ?>"><?php echo ucfirst($height->heightvalue); ?></option>
																	<?php } } ?>
																</select>
																<span id="error_upi_height" style="color:red"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Complexion</label>
															<div class="col-sm-8">
																<select  id="upi_complexion" name="upi_complexion" class="form-control">
																	<option value="Fair">Fair</option>
																	<option value="Dark">Dark</option>
																	<option value="Whitish">Whitish</option>
																	<option value="Medium">Medium</option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Gender <sup>*</sup></label>
															<div class="col-sm-8">
																<select id="user_gender" name="user_gender" class="form-control" >
																	<option value="male">Male</option>
																	<option value="female">Female</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="u_st_id" class="col-sm-4 control-label">Marital Status <sup>*</sup></label>
															<div class="col-sm-8">
																<select  id="upi_maritalstatus" name="upi_maritalstatus" class="form-control">
																	<option value="Unmarried">Unmarried</option>
																	<option value="Married">Married</option>
																	<option value="Seperated">Seperated</option>
																	<option value="Divorced">Divorced</option>
																	<option value="Awaiting Divorced">Awaiting Divorced</option>
																	<option value="Widow">Widow</option>
																	<option value="widower">widower</option>
																</select>
															</div>
														</div>
													</div>
												</div>												
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="box-footer">
											<span style="display:none;float:left;" id="addUserLoader"><i class="fa fa-refresh fa-spin"></i></span>​
											  <a class="btn btn-primary btnNext pull-right" >Next</a>
										</div>										
									</div>
								</div>
								<div class="tab-pane fade" id="tab2default">
									<div class="form-horizontal">
										<div class="box-body mandatory_color">	
											<div class="col-md-9">
												<div class="form-group">
													<label for="u_st_id" class="col-sm-4 control-label">Education Qualifications</label>
													<div class="col-sm-8">
													<input type="text" id="ued_education_qualifications" name="ued_education_qualifications" class="form-control" placeholder="Education Qualifications"/>
													</div>
												</div>
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Profession</label>
													<div class="col-sm-8">
														<select class="form-control" id="ued_profession_id" name="ued_profession_id">
															<option value="">Select a Profession</option>
															<?php if(isset($professionslist) && !empty($professionslist) && count($professionslist)>0){ foreach($professionslist as $profession){ ?>
															<option value="<?php echo $profession->professiondisplayid.'-'.ucfirst($profession->professionname); ?>"><?php echo ucfirst($profession->professionname); ?></option>
															<?php } } ?>
														</select>
														<span id="error_ued_profession" style="color:red"></span>	
													</div>													
												</div>												
												<div class="form-group">
													<label for="u_st_id" class="col-sm-4 control-label">Place Work</label>
													<div class="col-sm-8">
													<input type="text" id="ued_place_work" name="ued_place_work" class="form-control" placeholder="Place work"/>
													</div>
												</div>
												<div class="form-group">
													<label for="u_st_id" class="col-sm-4 control-label">Company Name</label>
													<div class="col-sm-8">
													<input type="text" id="ued_company_name" name="ued_company_name" class="form-control" placeholder="Company name"/>
													</div>
												</div>
												<div class="form-group">
													<label for="u_st_id" class="col-sm-4 control-label">Job Role</label>
													<div class="col-sm-8">
													<input type="text" id="ued_job_role" name="ued_job_role" class="form-control" placeholder="Eg: Sr.Software Engineer"/>
													</div>
												</div>
												<div class="form-group">
													<label for="u_st_id" class="col-sm-4 control-label">Income</label>
													<div class="col-sm-8">
													<input type="text" id="ued_income" name="ued_income" class="form-control" placeholder="Income"/>
													</div>
												</div>
												<div class="form-group">
													<label for="u_st_id" class="col-sm-4 control-label">Other Income</label>
													<div class="col-sm-8">
													<input type="text" id="ued_othersourceofincome" name="ued_othersourceofincome" class="form-control" placeholder="Other Income"/>
													</div>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="box-footer">
											<span style="display:none;float:left;" id="addUserLoader"><i class="fa fa-refresh fa-spin"></i></span>​
											<a class="btn btn-primary btnPrevious pull-left" >Previous</a>
											<a class="btn btn-primary btnNext pull-right" >Next</a>		
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="tab3default">
									<div class="form-horizontal">
										<div class="box-body mandatory_color">							
											<div class="col-md-9">
												<div class="form-group">
													<label for="u_email" class="col-sm-4 control-label">Email <sup>*</sup></label>
													<div class="col-sm-5">
														<input required type="email" class="form-control" id="user_email" name="user_email" placeholder="Email Address">
														<span id="error_user_email" style="color:red"></span>    
													</div>
													<div class="col-sm-3 hidden">
														<b>Don't Publish</b>&nbsp;&nbsp;<input type="checkbox" id="urd_email_is_published" name="urd_email_is_published">
													</div>
												</div>												
												<div class="form-group">
													<label for="u_password" class="col-sm-4 control-label">Password <sup>*</sup></label>
													<div class="col-sm-5">
														<input type="password" required class="form-control" id="user_encrpted_password" name="user_encrpted_password" placeholder="Password" >
														<span id="error_user_encrpted_password" style="color:red"></span> 
													</div>
													<div class="col-sm-3">
														<a href="javascript:void(0);" onClick="viewpassword();"><b><i class="fa fa-eye"></i></b></a>
													</div>
												</div>
												<div class="form-group">
													<label for="u_user_name" value="" class="col-sm-4 control-label">Primary Phone <sup>*</sup></label>
													<div class="col-sm-5">
														<input type="number" required class="form-control" id="user_mobile" name="user_mobile" placeholder="Primary Phone">
														<span id="error_user_mobile" style="color:red"></span>
													</div>
													<div class="col-sm-3 hidden">
														<b>Don't Publish</b>&nbsp;&nbsp;<input type="checkbox" id="urd_primarycontactnumber_is_published" name="urd_primarycontactnumber_is_published">
													</div>
												</div> 
												<div class="form-group">
													<label for="u_password" class="col-sm-4 control-label">Secondary Phone </label>
													<div class="col-sm-5">
														<input type="number" value="" class="form-control" id="urd_contactnumber" name="urd_contactnumber" placeholder="Secondary Phone">
														<span id="error_urd_contactnumber" style="color:red"></span>
													</div>
													<div class="col-sm-3 hidden">
														<b>Don't Publish</b>&nbsp;&nbsp;<input type="checkbox" id="urd_contactnumber_is_published" name="urd_contactnumber_is_published">
													</div>
												</div>
												<div class="form-group">
													<label for="u_password" class="col-sm-4 control-label">Land Line </label>
													<div class="col-sm-2">
														<input class="mdl-textfield__input form-control" id="urd_landlinenumber_c" type="number" name="urd_landlinenumber_c" value="" placeholder="CodeEg:040">
														<span id="error_urd_landlinenumber" style="color:red"></span>
													</div>
													<div class="col-sm-3">
														<input type="number" value="" class="form-control" id="urd_landlinenumber" name="urd_landlinenumber" placeholder="Land line number">
													</div>
													<div class="col-sm-3 hidden">
														<b>Don't Publish</b>&nbsp;&nbsp;<input type="checkbox" id="urd_landinenumber_is_published" name="urd_landinenumber_is_published">
													</div>
												</div>
												<div class="form-group">
													<label for="u_last_name" class="col-sm-4 control-label">Native District</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" id="urd_native_district" name="urd_native_district" placeholder="Native District">
														<span id="error_urd_native_district" style="color:red"></span>
													</div>
												</div>
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Communcation Resident Name </label>
													<div class="col-sm-8">
														<select required id="urd_communication_resident_type" name="urd_communication_resident_type" class="form-control">
															<option value="">Select resident type</option>
															<option value="Own House">Own House</option>
															<option value="Rent House">Rent House</option>
														</select>
														<span id="error_urd_communication_resident_type" style="color:red"></span>
													</div>													
												</div>
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Communcation Address Name </label>
													<div class="col-sm-6">
														<textarea rows="8" required cols="50" class="form-control" id="urd_communication_address" name="urd_communication_address" placeholder="Communcation Address Name"></textarea>
														<span id="error_urd_communication_address" style="color:red"></span>
													</div>
													<div class="col-sm-2 hidden">
														<b>Don't Publish</b>&nbsp;&nbsp;<input type="checkbox" id="urd_communication_address_is_published" name="urd_communication_address_is_published">
													</div>
												</div>												
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="box-footer">
											<span style="display:none;float:left;" id="addUserLoader"><i class="fa fa-refresh fa-spin"></i></span>​
											<a class="btn btn-primary btnPrevious pull-left" >Previous</a>
											<a class="btn btn-primary btnNext pull-right" >Next</a>
										</div>										
									</div>
								</div>
								<div class="tab-pane fade" id="tab4default">
									<div class="col-md-12 hidden">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">From Age </label>
													<div class="col-sm-8">
														<select required class="form-control" id="uppd_from_age" name="uppd_from_age">
															<?php for($i=18;$i<=50;$i++){ ?>
																<option value="<?php echo $i; ?>"><?php echo $i;?></option>
															<?php } ?>
														</select>
														<span id="error_uppd_from_age" style="color:red"></span>	
													</div>													
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">To Age </label>
													<div class="col-sm-8">
														<select required class="form-control" id="uppd_to_age" name="uppd_to_age">
															<?php for($i=18;$i<=50;$i++){ ?>
																<option value="<?php echo $i; ?>"><?php echo $i;?></option>
															<?php } ?>
														</select>
														<span id="error_uppd_to_age" style="color:red"></span>	
													</div>													
												</div>
											</div>											
										</div>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Qualification</label>
													<div class="col-sm-8">
														<input type="text" name="uppd_qualification" id="uppd_qualification" value="" class="form-control" placeholder="Qualification">
														<span id="error_uppd_qualification" style="color:red"></span>	
													</div>													
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Profession</label>
													<div class="col-sm-8">
														<select class="form-control" id="uppd_profession" name="uppd_profession">
															<option value="">Select a Profession</option>
															<?php if(isset($professionslist) && !empty($professionslist) && count($professionslist)>0){ foreach($professionslist as $profession){ ?>
															<option value="<?php echo $profession->professiondisplayid.'-'.ucfirst($profession->professionname); ?>"><?php echo ucfirst($profession->professionname); ?></option>
															<?php } } ?>
														</select>
														<span id="error_uppd_profession" style="color:red"></span>	
													</div>													
												</div>
											</div>											
										</div>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Eating</label>
													<div class="col-sm-8">
														<select  id="uppd_eating_habits" name="uppd_eating_habits" class="form-control">
															<option value="Vegetarian">Vegetarian</option>
															<option value="Non Vegetarian">Non Vegetarian</option>
															<option value="Egg">Egg</option>
														</select>
														<span id="error_uppd_eating_habits"></span>
													</div>													
												</div>
											</div>
											<div class="col-md-6 hidden">
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Area</label>
													<div class="col-sm-8">
														<select class="form-control" id="uppd_stateid" name="uppd_stateid">
															<option value="">Select a Area</option>
															<?php if(isset($areaslist) && !empty($areaslist) && count($areaslist)>0){ foreach($areaslist as $area){ ?>
															<option value="<?php echo $area->areadisplayid.'-'.ucfirst($area->areaname); ?>"><?php echo ucfirst($area->areaname); ?></option>
															<?php } } ?>
														</select>
														<span id="error_uppd_stateid" style="color:red"></span>	
													</div>													
												</div>
											</div>
											<div class="form-group">
												<label for="u_pan" class="col-sm-4 control-label">Other requirement</label>
												<div class="col-sm-6">
													<textarea rows="8" cols="50" class="form-control" id="uppd_other_requirement" name="uppd_other_requirement" placeholder="Other requirement"></textarea>
													<span id="error_uppd_other_requirement" style="color:red"></span>
												</div>
											</div>	
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="box-footer">
										<span style="display:none;float:left;" id="addUserLoader"><i class="fa fa-refresh fa-spin"></i></span>​
										<a class="btn btn-primary btnPrevious pull-left">Previous</a>
										<a class="btn btn-primary btnNext pull-right" >Next</a>								
									</div>	
								</div>
								<div class="tab-pane fade" id="tab5default">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Father's Occupation </label>
													<div class="col-sm-8">
														<input type="text" id="upd_father_profession" name="upd_father_profession" value="" class="form-control">
														<span id="error_upd_father_profession" style="color:red"></span>	
													</div>													
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Mother's Occupation </label>
													<div class="col-sm-8">
														<input type="text" id="upd_mother_profession" name="upd_mother_profession" value="" class="form-control">
														<span id="error_upd_mother_profession" style="color:red"></span>	
													</div>													
												</div>
											</div>											
										</div>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Noof Brothers </label>
													<div class="col-sm-8">
														<select id="upd_noofbrothers" name="upd_noofbrothers" class="form-control" onchange="rowsadded('brothers');">
															<?php for($i=0;$i<=5;$i++) { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
															<?php } ?>
														</select>														
													</div>													
												</div>
											</div>
											<span id="isHasBrothers" style="display:none;">
												<div class="col-md-12">
													<span id="brothers_div"></span>
												</div>								
											</span>																	
										</div>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="u_pan" class="col-sm-4 control-label">Noof Sisters </label>
													<div class="col-sm-8">
														<select id="upd_noofsisters" name="upd_noofsisters" class="form-control" onchange="rowsadded('sisters');">
															<?php for($i=0;$i<=5;$i++) { ?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
															<?php } ?>
														</select>														
													</div>													
												</div>
											</div>
											<span id="isHasSisters" style="display:none;">
												<div class="col-md-12">
													<span id="sisterss_div"></span>
												</div>								
											</span>																	
										</div>
									</div>						
									<div class="clearfix"></div>
									<div class="box-footer">
										<span style="display:none;float:left;" id="addUserLoader"><i class="fa fa-refresh fa-spin"></i></span>​
										<a class="btn btn-primary btnPrevious pull-left" >Previous</a>
										<a class="btn btn-primary btnNext pull-right" >Next</a>								
									</div>
								</div>
								<div class="tab-pane fade" id="tab6default">
									<div class="col-md-9">
										<div class="form-group">
											<label for="u_st_id" class="col-sm-4 control-label">Photo Given </label>
											<div class="col-sm-5">
												<input type="file" id="urd_profile_pic" name="urd_profile_pic" class="form-control" placeholder="Photo Given">
												<span id="error_urd_profile_pic" style="color:red"></span>
											</div>
											<div class="col-sm-3 hidden">
												<b>Don't Publish</b>&nbsp;&nbsp;<input type="checkbox" id="urd_profilepic_is_published" name="urd_profilepic_is_published">
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="box-footer">
										<span style="display:none;float:left;" id="addUserSurveyorLoader"><i class="fa fa-refresh fa-spin"></i></span>​
										<span id="success_message"></span>
										<span style="margin-left: 25%;color: green;" id="success_messages"></span>
										<div class="tab-pane active" id="">
											<a class="btn btn-primary btnPrevious pull-left" >Previous</a>
											<span id="submitform">
												<button type="button" onClick="form_submit();" id="btn" class="btn btn-info pull-right btnNext">Submit </button>
											</span>
											<span id="submitpform" style="display:none;">
												<button type="button" id="btnn" class="btn btn-info pull-right btnNext">Processing..</button>
											</span>
										</div>								
									</div>	
								</div>
							</div>
						</div>		
					</form>
				</div>					
			</div>
        </div>
    </div>
</div>
<?php
	$this->load->view('admin/includes/footer');
?>
<script>
	$(document).ready(function(){
		$("#age_validation").html('');
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		$('#upi_dateofbirth').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
            changeYear: true,
			minDate: new Date(currentYear-50, 01, 01),
			maxDate: new Date(currentYear-19, 11, 31),
		});
		$("#upi_dateofbirth").on("change", function(e) {
			var sud_dob = $("#upi_dateofbirth").val();
			var age = getAge(sud_dob);
			if( age < 0 )
			{
				age = 0;
			}
			if(age>50){
				$('#upi_dateofbirth').val("");
				$("#upi_age").val("");
				$("#age_validation").html('The age cannot be more than 100.');
			}else if(age == 0){
				$("#age_validation").html('The age must be minimum 15 years');
				$("#upi_age").val(age);
			}else if(parseInt(age) < 15){
				$("#age_validation").html('The age must be minimum 15 years');
				$("#upi_age").val(age);
			}else{
				$("#age_validation").html('');
				$("#upi_age").val(age);
			}
		});	
	});
	function getAge(birth) {
	   var today = new Date();
	   var curr_date = today.getDate();
	   var curr_month = today.getMonth() + 1;
	   var curr_year = today.getFullYear();

	   var pieces = birth.split('-');
	   var birth_date = pieces[2];
	   var birth_month = pieces[1];
	   var birth_year = pieces[0];

	   if (curr_month == birth_month && curr_date >= birth_date) return parseInt(curr_year-birth_year);
	   if (curr_month == birth_month && curr_date < birth_date) return parseInt(curr_year-birth_year-1);
	   if (curr_month > birth_month) return parseInt(curr_year-birth_year);
	   if (curr_month < birth_month) return parseInt(curr_year-birth_year-1);
	}

	
	var twoTimes = 1;
	$("#validationPop").modal("hide");
	$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
		// e.stopImmediatePropagation();		
		var $targett = $($(this).attr('href')),
			$idd = $($(this).attr('id')),
			$item = $(this);
		var $id = $targett.attr('id'),
		$item = $(this);
		var $target = $(e.target);
		if ($target.parent().hasClass('disabled')) {
			return false;
		}
		if(twoTimes==1){
			var tab1 = $("#tab1V").val();
			var tab3 = $("#tab3V").val();
			var tab7 = $("#tab7V").val();
			if(tab1==0){
				validation_checker_method('tab1');
				if($id=='tab2default'){
					var tab1 = $("#tab1V").val();
					if(tab1==0){				
						$("#validationPop").modal("show");return false;
					}	
				}else if($id=='tab3default'){
					var tab1 = $("#tab1V").val();
					if(tab1==0){
						$("#validationPop").modal("show");return false;
					}			
				}else if($id=='tab4default'){
					var tab1 = $("#tab1V").val();
					if(tab1==0){
						$("#validationPop").modal("show");return false;
					}			
				}else if($id=='tab5default'){
					var tab1 = $("#tab1V").val();
					if(tab1==0){
						$("#validationPop").modal("show");return false;
					}			
				}else if($id=='tab6default'){
					var tab1 = $("#tab1V").val();
					if(tab1==0){
						$("#validationPop").modal("show");return false;
					}			
				}
			}else if(tab3==0){
				validation_checker_method('tab3');
				var tab3 = $("#tab3V").val();
				if($id=='tab4default'){
					if(tab3==0){
						$("#validationPop").modal("show");return false;
					}			
				}else if($id=='tab5default'){
					if(tab3==0){
						$("#validationPop").modal("show");return false;
					}			
				}else if($id=='tab6default'){
					if(tab3==0){
						$("#validationPop").modal("show");return false;
					}			
				}
			}else if($id=='tab4default'){
				$("#validationPop").modal("hide");
				var uid = $("#user_id").val();	
				var user_email = $("#user_email").val();
				var user_mobile = $("#user_mobile").val();
				$.ajax({
					type		:	'POST',
					dataType	: 	"json",	
					url			:  	'<?php echo base_url();?>admin/Common/useremailandmobilechecking',
					data		:	{user_email:user_email,user_id:uid,user_mobile:user_mobile},
					success: function(data){
						if(data.output=='emailalreadywithus'){
							$("#tab3V").val(0);
							$("#validationPop").modal("show");return false;
							$("#error_user_email").html('Entered email address is already with our records.');
							return false;
						}else if(data.output=='mobilealreadywithus'){
							$("#tab3V").val(0);
							$("#validationPop").modal("show");return false;
							$("#error_user_mobile").html('Entered mobile number is already with our records.');
							return false;
						}else{
							$("#tab3V").val(1);
						}
					}
				});
			}			
		}
		// e.preventDefault();
	});

	$('.btnNext').click(function(){
		$("#age_validation").html('');
		$("#address_proof_valid").html("");
		$("#error_user_email").html("");
		$("#error_user_encrpted_password").html("");
		$("#error_user_mobile").html("");
		$("#error_urd_communication_resident_type").html("");
		$("#error_urd_communication_address").html("");
		var curStep = $(this).closest(".tab-pane"),
		curStepBtn = curStep.attr("id"),
		nextStepWizard = $('div.panel-heading li a[href="#' + curStepBtn + '"]').parent().next().children("a"),
		curInputs = curStep.find("input,select,checkbox");
		isValid = true;
		
		if(curStepBtn=='tab1default'){
			$('#error_user_display_name').html('');
			$('#error_upd_surname').html('');
			$('#error_upd_fathername').html('');
			$('#error_upi_dateofbirth').html('');
			$('#error_upd_mothername').html('');
			$('#error_upi_caste').html('');
			$('#error_upi_height').html('');
			
			var user_display_name = $("#user_display_name").val();
			var upd_surname       = $("#upd_surname").val();
			var upd_fathername    = $("#upd_fathername").val();
			var upd_mothername    = $("#upd_mothername").val();
			var upi_height        = $("#upi_height").val();
			var upi_dateofbirth   = $("#upi_dateofbirth").val();
			var upi_caste         = $("#upi_caste").val();
			if(user_display_name==""){
				$("#error_user_display_name").html('Username is required.');
				isValid = false;
			}
			if(upd_surname==""){
				$("#error_upd_surname").html('Surname is required.');
				isValid = false;
			}
			if(upd_fathername==""){
				$("#error_upd_fathername").html('Father name is required.');
				isValid = false;
			}
			if(upd_mothername==""){
				$("#error_upd_mothername").html('Mother name is required.');
				isValid = false;
			}
			if(upi_caste==""){
				$("#error_upi_caste").html('Caste is required.');
				isValid = false;
			}
			if(upi_height==""){
				$("#error_upi_height").html('Height is required.');
				isValid = false;
			}
			
			var ageVal = $("#upi_age").val();
			if(parseInt(ageVal)<18){
				$("#age_validation").html('The age must be minimum 18 years');
				isValid = false;
			}
			if (isValid==true){
				$("#age_validation").html('');
				$("#tab1V").val(1);
			}
		}else if(curStepBtn=='tab3default'){
			$("#error_user_email").html("");
			$("#error_user_encrpted_password").html("");
			$("#error_user_mobile").html("");
			$("#error_urd_communication_resident_type").html("");
			$("#error_urd_communication_address").html("");
			var user_email             = $("#user_email").val();
			var user_encrpted_password = $("#user_encrpted_password").val();
			var user_mobile = $("#user_mobile").val();
			var urd_communication_resident_type = $("#urd_communication_resident_type").val();
			var urd_communication_address = $("#urd_communication_address").val();
			if(user_email==""){
				isValid = false;
				$("#tab3V").val(0);
				$("#error_user_email").html("Email is required.");
			}
			
			if(user_encrpted_password==""){
				isValid = false;
				$("#tab3V").val(0);
				$("#error_user_encrpted_password").html("Password is required.");
			}
			if(user_mobile==""){
				isValid = false;
				$("#tab3V").val(0);
				$("#error_user_mobile").html("Mobile is required.");
			}			
			
			if(urd_communication_resident_type==""){
				isValid = false;
				$("#tab3V").val(0);
				$("#error_urd_communication_resident_type").html("Resident type is required.");
			}
			if(urd_communication_address==""){
				isValid = false;
				$("#tab3V").val(0);
				$("#error_urd_communication_address").html("Address type is required.");
			}
			var uid = $("#user_id").val();			
			if (isValid==true){
				$("#tab3V").val(1);
			}
		}
		if (isValid==true){
			$("#age_validation").html('');
			$("#tab1V").val(1);
			$("#tab7V").val(1);
			var tab3V = $("#tab3V").val();
			if(curStepBtn=='tab3default'){
				if(tab3V==0){
					$("#tab3V").val(tab3V);
					return false;		
				}else if(tab3V==1){
					$.ajax({
						type		:	'POST',
						dataType	: 	"json",	
						url			:  	'<?php echo base_url();?>admin/Common/useremailandmobilechecking',
						data		:	{user_email:user_email,user_id:uid,user_mobile:user_mobile},
						success: function(data){
							if(data.output=='emailalreadywithus'){
								$("#tab3V").val(0);
								$("#error_user_email").html('Entered email address is already with our records.');
								return false;
							}else if(data.output=='mobilealreadywithus'){
								$("#tab3V").val(0);
								$("#error_user_mobile").html('Entered mobile number is already with our records.');
								return false;
							}else{
								$("#tab3V").val(1);
								$('.nav-tabs > .active').next('li').find('a').trigger('click');
							}
						}
					});
				}else{
					$("#tab3V").val(1);
					$('.nav-tabs > .active').next('li').find('a').trigger('click');		
				}
			}else{
				$('.nav-tabs > .active').next('li').find('a').trigger('click');		
			}
		}else{
			var tab1V = $("#tab1V").val();
			var tab3V = $("#tab3V").val();
			var tab7V = $("#tab7V").val();
			if(curStepBtn=='tab1default'){
				if(tab1V==1){
					$('#rowTab a[href="#tab2default"]').tab('show');
				}else{
					$("#tab1V").val(tab1V);
					return false;
				}				
			}
			if(curStepBtn=='tab2default'){
				$('#rowTab a[href="#tab3default"]').tab('show');
			}
			if(curStepBtn=='tab3default'){
				if(tab3V==1){
					$('#rowTab a[href="#tab4default"]').tab('show');
				}else{
					$("#tab3V").val(tab3V);
					return false;
				}
			}
			if(curStepBtn=='tab4default'){
				$('#rowTab a[href="#tab5default"]').tab('show');
			}
			if(curStepBtn=='tab5default'){
				$('#rowTab a[href="#tab6default"]').tab('show');
			}
			if(curStepBtn=='tab6default'){
				$('#rowTab a[href="#tab7default"]').tab('show');
			}			
		}
		
	});

	$('.btnPrevious').click(function(){
		$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});
	
	
	function validation_checker_method(wTab){
		var uid = $("#user_id").val();	
		if(wTab=="tab1"){
			var curStep = $('#tab1default');
			var nextStepWizard = $('div.panel-heading li a[href="#tab1default"]').parent().next().children("a"),
			curInputs = curStep.find("input,select,checkbox");
			var isValid = true;
			$('#error_user_display_name').html('');
			$('#error_upd_surname').html('');
			$('#error_upd_fathername').html('');
			$('#error_upi_dateofbirth').html('');
			$('#error_upd_mothername').html('');
			$('#error_upi_caste').html('');
			$('#error_upi_height').html('');
			
			var user_display_name = $("#user_display_name").val();
			var upd_surname       = $("#upd_surname").val();
			var upd_fathername    = $("#upd_fathername").val();
			var upd_mothername    = $("#upd_mothername").val();
			var upi_height        = $("#upi_height").val();
			var upi_dateofbirth   = $("#upi_dateofbirth").val();
			var upi_caste         = $("#upi_caste").val();
			if(user_display_name==""){
				$("#error_user_display_name").html('Username is required.');
				isValid = false;
			}
			if(upd_surname==""){
				$("#error_upd_surname").html('Surname is required.');
				isValid = false;
			}
			if(upd_fathername==""){
				$("#error_upd_fathername").html('Father name is required.');
				isValid = false;
			}
			if(upd_mothername==""){
				$("#error_upd_mothername").html('Mother name is required.');
				isValid = false;
			}
			if(upi_caste==""){
				$("#error_upi_caste").html('Caste is required.');
				isValid = false;
			}
			if(upi_height==""){
				$("#error_upi_height").html('Height is required.');
				isValid = false;
			}
			if(upi_dateofbirth==""){
				$("#error_upi_dateofbirth").html('Date of birth is required.');
				isValid = false;
			}
			var ageVal = $("#upi_age").val();
			if(parseInt(ageVal)<18){
				isValid = false;
			}
			if(isValid){
				$("#tab1V").val(1);
			}else{
				$("#tab1V").val(0);
			}
		}else if(wTab=="tab3"){
			var isValid = true;
			$("#error_user_email").html("");
			$("#error_user_encrpted_password").html("");
			$("#error_user_mobile").html("");
			$("#error_urd_communication_resident_type").html("");
			$("#error_urd_communication_address").html("");
			var user_email             = $("#user_email").val();
			var user_encrpted_password = $("#user_encrpted_password").val();
			var user_mobile = $("#user_mobile").val();
			var urd_communication_resident_type = $("#urd_communication_resident_type").val();
			var urd_communication_address = $("#urd_communication_address").val();
			if(user_email==""){
				isValid = false;
				$("#tab3V").val(0);
				$("#error_user_email").html("Email is required.");
			}			
			if(user_encrpted_password==""){
				isValid = false;
				$("#tab3V").val(0);
				$("#error_user_encrpted_password").html("Password is required.");
			}
			if(user_mobile==""){
				isValid = false;
				$("#tab3V").val(0);
				$("#error_user_mobile").html("Mobile is required.");
			}	
			if(user_email!="" && user_mobile!=""){
				$("#tab3V").val(0);
				$.ajax({
					type		:	'POST',
					dataType	: 	"json",	
					url			:  	'<?php echo base_url();?>admin/Common/useremailandmobilechecking',
					data		:	{user_email:user_email,user_id:uid,user_mobile:user_mobile},
					success: function(data){
						if(data.output=='emailalreadywithus'){
							$("#tab3V").val(0);
							$("#error_user_email").html('Entered email address is already with our records.');
							isValid = false;
						}else if(data.output=='mobilealreadywithus'){
							$("#tab3V").val(0);
							$("#error_user_mobile").html('Entered mobile number is already with our records.');
							isValid = false;
						}else{
							$("#tab3V").val(1);
							isValid = true;
							return true;
						}
					}
				});
			}
			if(urd_communication_resident_type==""){
				isValid = false;
				$("#tab3V").val(0);
				$("#error_urd_communication_resident_type").html("Resident type is required.");
			}
			if(urd_communication_address==""){
				isValid = false;
				$("#tab3V").val(0);
				$("#error_urd_communication_address").html("Address type is required.");
			}
		}
	}
	function rowsadded(type){
		if(type=="brothers"){
			var updnoofbrothers = $("#upd_noofbrothers").val();
			if(updnoofbrothers!=0){	
				$("#brothers_div").html("");
				var html ="";				
				for(var i=1; i<=updnoofbrothers;i++){
					html +='<div class="row"><input type="hidden" id="upd_brothername'+i+'" name="upd_brothername'+i+'" value=""><div class="col-md-6"><div class="form-group"><label for="u_pan" class="col-sm-4 control-label">Elder/Younger</label><div class="col-sm-8"><select id="upd_elder_younger'+i+'" name="upd_elder_younger'+i+'" class="form-control"><option value="Elder">Elder</option><option value="Younger">Younger</option></select></div></div></div><div class="col-md-6"><div class="form-group"><label for="u_pan" class="col-sm-4 control-label">Marital Status</label><div class="col-sm-8"><select id="upd_marital_status'+i+'" name="upd_marital_status'+i+'" class="form-control"><option value="Unmarried">Unmarried</option><option value="Married">Married</option></select></div></div></div><input type="hidden" id="upd_brother'+i+'_profession" name="upd_brother'+i+'_profession" value=""></div>';
				}
				$("#isHasBrothers").show();
				$("#brothers_div").html(html);
			}else{
				$("#isHasBrothers").hide();
				$("#brothers_div").html("");
			}
		}else if(type=="sisters"){
			var updnoofsisters = $("#upd_noofsisters").val();
			if(updnoofsisters!=0){	
				$("#sisters_div").html("");
				var html ="";				
				for(var i=1; i<=updnoofsisters;i++){
					html +='<div class="row"><input type="hidden" id="upd_sistername'+i+'" name="upd_sistername'+i+'" value=""><div class="col-md-6"><div class="form-group"><label for="u_pan" class="col-sm-4 control-label">Elder/Younger</label><div class="col-sm-8"><select id="upd_sister_elder_younger'+i+'" name="upd_sister_elder_younger'+i+'" class="form-control"><option value="Elder">Elder</option><option value="Younger">Younger</option></select></div></div></div><div class="col-md-6"><div class="form-group"><label for="u_pan" class="col-sm-4 control-label">Marital Status</label><div class="col-sm-8"><select id="upd_sister_marital_status'+i+'" name="upd_sister_marital_status'+i+'" class="form-control"><option value="Unmarried">Unmarried</option><option value="Married">Married</option></select></div></div></div><input type="hidden" id="upd_sister'+i+'_profession" name="upd_sister'+i+'_profession" value=""></div>';
				}
				$("#isHasSisters").show();
				$("#sisterss_div").html(html);
			}else{
				$("#isHasSisters").hide();
				$("#sisterss_div").html("");
			}
		}
	}
	function form_submit(){		
		var fi = document.getElementById('urd_profile_pic'); 
		// Check if any file is selected. 
		var flag = true;
		if (fi.files.length > 0) { 
			for (var i = 0; i <= fi.files.length - 1; i++) { 
				var fsize = fi.files.item(i).size; 
				var file = Math.round((fsize / 1024)); 
				// The size of the file. 
				if (file > 1024) { 
					flag = false;
					$("#error_urd_profile_pic").html("The file size must be less than 1mb"); return false;
				} 
			} 
		} 
		if(flag == false){
			return false;
		}else{
			$("#submitform").hide();
			$("#submitpform").show();
			$("#add_profile").submit();
		}
		
	}
	</script>