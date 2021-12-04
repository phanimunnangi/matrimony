<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon"  href="<?=base_url();?>logo_icon_150x150_RZ4_icon.ico">
    <title><?php echo $page_title;?> | MatrimonyApp - Dashboard</title>
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/small_logo.jpg" />
    <link href="<?=base_url();?>admin_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>admin_assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>admin_assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>admin_assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>admin_assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">    
    <link href="<?=base_url();?>admin_assets/css/animate.css" rel="stylesheet">
    <link href="<?=base_url();?>admin_assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url();?>admin_assets/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="<?=base_url();?>admin_assets/css/fSelect.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav metismenu" id="side-menu">
					<li class="nav-header">
						<div class="dropdown profile-element" >
							<span>
								<h3>ADMIN Area</h3>
							</span>
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span class="clear text-center"> 
									<span class="block m-t-xs"> 
										<strong class="font-bold"><?=$this->session->userdata('username')?> <b class="caret"></b></strong>
									</span>  
								</span>
							</a>
							<ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="<?=base_url();?>admin/settings/admin_settings">Admin Settings</a></li>
								<li class="divider"></li>
								<li><a href="<?=base_url();?>admin/login/logout">Logout</a></li>
							</ul>
						</div>
						<div class="logo-element">
							<img alt="image" class="img-circle img-md img-responsive" src="<?php echo base_url();?>admin_assets/img/logo.png"/>
						</div>
					</li>
					<li class="<?php if ($page == 'dashboard') {echo 'active';} ?>">
						<a href="<?=base_url();?>admin/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
					</li>
					<li class="<?php if ( $page == 'bannerslist'  || $page == 'addbanner'  || $page == 'editbanner'  || $page == 'raasilist'  || $page == 'starslist'  || $page == 'admin_setting'  || $page=='communitieslist' || $page == 'addcommunity' || $page == 'editcommunity' || $page == 'subcasteslist' || $page == 'addsubcaste' || $page == 'editsubcaste' || $page == 'professionslist' || $page == 'addprofession' || $page == 'editprofession' || $page == 'successstorieslist' || $page == 'editsuccessstory' || $page == 'addsuccessstory' || $page == 'areaslist' || $page == 'addarea' || $page == 'editarea' ) {echo 'active';} ?>">
						<a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Genernal Settings</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse <?php if ( $page == 'communitieslist'  || $page == 'admin_setting'  || $page == 'terms_conditions') {echo 'in';} ?>">
							<li class="<?php if ($page == 'admin_setting') {echo 'active';} ?>"><a href="<?=base_url();?>admin/settings/admin_settings">Admin Settings</a></li>
							<li class="<?php if ($page == 'communitieslist' || $page == 'editcommunity' || $page == 'addcommunity') { echo 'active';} ?>"><a href="<?=base_url();?>admin/settings/communitieslist">Communities</a></li>
							<li class="<?php if ($page == 'subcasteslist' || $page == 'editsubcaste' || $page == 'addsubcaste') { echo 'active';} ?>"><a href="<?=base_url();?>admin/settings/subcasteslist">Sub Castes</a></li>
							<li class="<?php if ($page == 'starslist') { echo 'active';} ?>"><a href="<?=base_url();?>admin/settings/starslist">Stars List</a></li>
							<li class="<?php if ($page == 'raasilist') { echo 'active';} ?>"><a href="<?=base_url();?>admin/settings/raasilist">Raasi List</a></li>
							<li class="<?php if ($page == 'areaslist' || $page == 'addarea' || $page == 'editarea') { echo 'active';} ?>"><a href="<?=base_url();?>admin/settings/areaslist">Areas List</a></li>
							<li class="<?php if ($page == 'professionslist' || $page == 'editprofession' || $page == 'addprofession') { echo 'active';} ?>"><a href="<?=base_url();?>admin/settings/professionslist">Professions List</a></li>
							<li class="<?php if ($page == 'successstorieslist' || $page == 'editsuccessstory' || $page == 'addsuccessstory') { echo 'active';} ?>"><a href="<?=base_url();?>admin/settings/successstorieslist">Success Stoires List</a></li>
							<li class="<?php if ($page == 'bannerslist' || $page == 'editbanner' || $page == 'addbanner') { echo 'active';} ?>"><a href="<?=base_url();?>admin/common/bannerslist">Banners List</a></li>
						</ul>
					</li>
					<li class="<?php if ( $page == 'userserviceslist' || $page == 'adduserservice' || $page == 'edituserservice'|| $page == 'serviceslist'  || $page == 'addservice'  || $page == 'editservice') {echo 'active';} ?>">
						<a href="#"><i class="fa fa-service"></i> <span class="nav-label">Services</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse <?php if ( $page == 'serviceslist'  || $page == 'addservice'  || $page == 'editservice') {echo 'in';} ?>">
							<li class="<?php if ($page == 'serviceslist' || $page == 'addservice'  || $page == 'editservice') {echo 'active';} ?>"><a href="<?=base_url();?>admin/common/serviceslist">Master Services</a></li>
							<li class="<?php if ($page == 'userserviceslist' || $page == 'adduserservice' || $page == 'edituserservice') {echo 'active';} ?>"><a href="<?=base_url();?>admin/common/userserviceslist">User Services List</a></li>
						</ul>
					</li>
					<li class="<?php if ( $page == 'addprofile' || $page == 'allprofileslist' || $page == 'editprofile'|| $page == 'nriprofiles'  || $page == 'secondmarriageprofiles' || $page == 'neartoexpiredprofiles') {echo 'active';} ?>">
						<a href="#"><i class="fa fa-service"></i> <span class="nav-label">Profiles</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse <?php if ( $page == 'waitingprofiles' || $page == 'addprofile' || $page == 'resetnewpassword' || $page == 'userlikedprofiles' || $page == 'allprofileslist' || $page == 'editprofile'|| $page == 'nriprofiles'  || $page == 'secondmarriageprofiles' || $page == 'neartoexpiredprofiles') {echo 'in';} ?>">
							<li class="<?php if ($page == 'addprofile') {echo 'active';} ?>"><a href="<?=base_url();?>admin/common/addprofile">Add Profile</a></li>
							<li class="<?php if ($page == 'waitingprofiles' ) {echo 'active';} ?>"><a href="<?=base_url();?>admin/common/waitingprofiles">Waiting Profiles</a></li>
							<li class="<?php if ($page == 'resetnewpassword' || $page == 'userlikedprofiles' || $page == 'allprofileslist' || $page == 'editprofile') {echo 'active';} ?>"><a href="<?=base_url();?>admin/common/allprofileslist">All Profiles</a></li>
							<li class="<?php if ($page == 'nriprofiles') {echo 'active';} ?>"><a href="<?=base_url();?>admin/common/nriprofiles">NRI Profiles</a></li>
							<li class="<?php if ($page == 'secondmarriageprofiles') {echo 'active';} ?>"><a href="<?=base_url();?>admin/common/secondmarriageprofiles">Second Marriage Profiles</a></li>
							<li class="<?php if ($page == 'neartoexpiredprofiles') {echo 'active';} ?>"><a href="<?=base_url();?>admin/common/neartoexpiredprofiles">Ready to expire Profiles</a></li>						
						</ul>
					</li>
					<li class="<?php if ($page == 'familymembers') {echo 'active';} ?>">
						<a href="<?=base_url();?>admin/common/familymembers"><i class="fa fa-users"></i> <span class="nav-label">Family Members</span></a>
					</li>
				</ul>
			</div>
		</nav>
		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            		</div>
					<ul class="nav navbar-top-links navbar-right">
                        <li><a href="<?=base_url();?>admin/login/logout"><i class="fa fa-sign-out"></i> Log out</a></li>
           			</ul>
				</nav>
			</div>