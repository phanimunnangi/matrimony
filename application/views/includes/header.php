<?php 
	if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO']!=""){
		$page=basename($_SERVER['PATH_INFO']);
	}else{
		$page='/';
	}	
	$aboutuspage = "";
	$homepage    = "";
	$contactuspage = "";
	$packagespage  = "";
	$secondmarriagepage = "";
	$nripage     = "";
	$groompage   = "";
	$bridepage   = "";
	if($page=='aboutus'){
		$aboutuspage ="active";
	}else if($page=='/'){
		$homepage ="active";
	}else if($page==''){
		$homepage ="active";
	}else if($page=='bride-profiles'){
		$bridepage ="active";
	}else if($page=='groom-profiles'){
		$groompage ="active";
	}else if($page=='nri-profiles'){
		$nripage ="active";
	}else if($page=='secondmarriage-profiles'){
		$secondmarriagepage ="active";
	}else if($page=='packages'){
		$packagespage ="active";
	}else if($page=='contactus'){
		$contactuspage ="active";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Brahmana Swayamvaram Vivaha Parichaya Vedika <?php echo $page_title; ?></title>
		<!-- Bootstrap -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		<!-- Google Web Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
		<!-- Template CSS Files  -->
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/style.css?refresh=<?php echo time(); ?>" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/responsive.css?refresh=<?php echo time(); ?>" rel="stylesheet">
		<!-- Template JS Files -->
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
		
		<?php if(isset($_GET['register_error']) && $_GET['register_error']!=""){ ?>
				<script>
					$('#validationPop').modal('show');
				</script>
		<?php } ?>
		<script>
			var base_url = '<?php echo base_url(); ?>';
			var time = '<?php echo time(); ?>';
		</script>
	</head>
	<body>
	<!-- Topbar Starts -->
		<div class="topbar text-white">
		<!-- Nested Container Starts -->
			<div class="container px-md-0 clearfix text-center">
				<p class="mb-2 mb-md-0 float-md-left">Register for Matrimony & Business Services</p>
				<?php if(isset($_SESSION['user_registeredid']) && $_SESSION['user_registeredid']!=""){ ?>
					<ul class="list-unstyled list-inline topbar-links mb-0 float-md-right text-md-right">
						<?php if(isset($_SESSION['loginwith']) && $_SESSION['loginwith']=="CommunityProtal"){
							if(isset($_SESSION['referalcode']) && $_SESSION['referalcode']!=""){ ?>
							<li class="ml-md-4 list-inline-item">My Referal Code: <a href="javascript:void(0);" class="text-white"><?php echo $_SESSION['referalcode']; ?></a></li>
						<?php  } }else{ ?>
							<li class="ml-md-4 list-inline-item"><i class="fa fa-user mr-2"></i> <a href="<?php echo base_url(); ?>likeduserprofiles" class="text-white">Liked Profiles</a></li>
						<?php } ?>
						<li class="ml-md-4 list-inline-item"><i class="fa fa-user mr-2"></i> <a href="<?php echo base_url(); ?>changepassword"  class="text-white">Change Password</a></li>						
						<li class="list-inline-item"><i class="fa fa-lock mr-2"></i> <a href="<?php echo base_url(); ?>user/logoutactionsubmit" class="text-white">Logout</a></li>
					</ul>
				<?php }else{ ?>
					<ul class="list-unstyled list-inline topbar-links mb-0 float-md-right text-md-right">
						<li class="ml-md-4 list-inline-item"><i class="fa fa-user mr-2"></i> <a href="javascript:void(0);" onClick="loginvalidate();" class="text-white">Login</a></li>
					</ul>
				<?php } ?>
			</div>
		<!-- Nested Container Ends -->
		</div>
	<!-- Topbar Ends -->
	<!-- Main Header Starts -->
		<header class="main-header">
		<!-- Nested Container Starts -->
			<div class="container px-md-0 text-center clearfix">
			<!-- Logo Starts -->
				<div class="logo float-sm-left mb-3 mb-sm-0">
					<a href="<?php echo base_url(); ?>"><h4 class="text-warning">Brahmana</h4><h5 class="text-success">Swayamvaram</h5></a>
				</div>
			<!-- Logo Ends -->
			<!-- Button Starts -->				 
				<?php if(isset($_SESSION['user_registeredid']) && $_SESSION['user_registeredid']!=""){ 
					if(isset($_SESSION['loginwith']) && $_SESSION['loginwith']=="CommunityProtal"){ ?>
						<a style="margin-left:10px;" href="<?php echo base_url(); ?>family-members" class="btn btn-main btn-style-1 animation float-sm-right text-uppercase text-weight-bold text-small-2 rounded-2">Add Family Info</a>&nbsp;&nbsp; 
					<?php }else{ ?>
					<a href="<?php echo base_url(); ?>editprofile" class="btn btn-main btn-style-1 animation float-sm-right text-uppercase text-weight-bold text-small-2 rounded-2">Edit Profile</a>
					<?php } }else{ ?>
					<a href="javascript:void(0);" onClick="registerationform();"  class="btn btn-main btn-style-1 animation float-sm-right text-uppercase text-weight-bold text-small-2 rounded-2">Register your profile</a>&nbsp;&nbsp;
				<?php } ?>
			<!-- Button Ends -->
			</div>
		<!-- Nested Container Ends -->
		</header>
	<!-- Main Header Ends -->
	<!-- Main Menu Starts -->
		<nav id="nav" class="main-menu navbar navbar-expand-lg rounded-0">
		<!-- Nested Container Starts -->
			<div class="container px-md-0">
			<!-- Navbar Toggler Starts -->
				<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target=".navbar-cat-collapse" aria-controls=".navbar-cat-collapse" aria-expanded="false" aria-badge="Toggle navigation">
					<span class="navbar-toggler-icon fa fa-bars"></span>
				</button>
			<!-- Navbar Toggler Ends -->
			<!-- Navbar Cat collapse Starts -->
				<div class="collapse navbar-collapse navbar-cat-collapse animation">
				<!-- Nav Links Starts -->
					<ul class="nav navbar-nav text-uppercase">
						<li class="nav-item <?php echo $homepage; ?>"><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
						<li class="nav-item <?php echo $aboutuspage; ?>"><a href="<?php echo base_url(); ?>aboutus" class="nav-link">About Us</a></li>
						<li class="nav-item <?php echo $packagespage; ?>"><a href="<?php echo base_url(); ?>how" class="nav-link">How</a></li>
						<li class="nav-item <?php echo $packagespage; ?>"><a href="<?php echo base_url(); ?>Desclimer" class="nav-link">Desclimer</a></li>
						<li class="nav-item <?php echo $packagespage; ?>"><a href="<?php echo base_url(); ?>packages" class="nav-link">Payment Info</a></li>
						<li class="nav-item <?php echo $contactuspage; ?>"><a href="<?php echo base_url(); ?>contactus" class="nav-link">Contact Us</a></li>
					</ul>
				<!-- Nav Links Ends -->
				</div>
			<!-- Navbar Cat collapse Ends -->
			</div>
		<!-- Nested Container Ends -->
		</nav>
	<!-- Main Menu Ends -->