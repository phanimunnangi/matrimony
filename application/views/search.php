<?php $ses = $this->session->userdata();
if(isset($ses['userId'])){
 print_r($ses);
?>
<div class="container px-md-0">
			<div class="profile-search rounded-5">
			<!-- Title Starts -->
				<h3 class="text-weight-semi-bold text-color-brand mb-md-4">Start Your Search</h3>
			<!-- Title Ends -->
			<!-- Form Starts -->
				<form enctype="multipart/form-data" class="form-row align-items-center justify-content-lg-between" id="search_form" name="search_form">
				<!-- Gender Starts -->
						
				<!-- Gender Ends -->
				<!-- Age Starts -->
					<div class="col-auto profile-search-col">
						<h6 class="text-weight-normal">Age</h6>
						<select class="custom-select" id="from_search" name="from_search">
							<?php for($i=$ses['userAge'];$i<=50;$i++){ ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-auto profile-search-col">
						<h6 class="text-weight-normal d-none d-sm-block">&nbsp;</h6>
						<h6 class="pt-md-2">To</h6>
					</div>
					<div class="col-auto profile-search-col">
						<h6 class="text-weight-normal d-none d-sm-block">&nbsp;</h6>
						<select class="custom-select" id="to_search" name="to_search">
							<?php for($i=$ses['userAge'];$i<=50;$i++){ ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php } ?>
						</select>
					</div>
				<!-- Age Ends -->
				<!-- Qualification Starts -->
					<div class="col-auto profile-search-col ml-md-3">
						<h6 class="text-weight-normal">Professions</h6>
						<select class="custom-select" id="profession_search" name="profession_search">
							<option selected value="">Select</option>
							<?php if(isset($professionslist) && count($professionslist)>0) { foreach($professionslist as $professions){ ?>
								<option value="<?php echo $professions->professiondisplayid; ?>"><?php echo ucfirst($professions->professionname); ?></option>
							<?php } } ?>
						</select>
					</div>
				<!-- Qualification Ends -->
				<!-- Sub Caste Starts -->
					<div class="col-auto profile-search-col ml-md-3">
						<h6 class="text-weight-normal">Sub Castes</h6>
						<select class="custom-select" id="caste_search" name="caste_search">
							<option value="">Select </option>
							<?php if(isset($subcasteslist) && count($subcasteslist)>0) { foreach($subcasteslist as $subcaste){ ?>
								<option value="<?php echo $subcaste->subcastedisplayid; ?>"><?php echo ucfirst($subcaste->subcastename); ?></option>
							<?php } } ?>
						</select>
					</div>
				<!-- Sub Caste Ends -->
				<!-- OR Starts -->
					<div class="col-auto profile-search-col">
						<h6 class="text-weight-normal d-none d-sm-block">&nbsp;</h6>
						<h6 class="text-weight-semi-bold text-color-brand pt-2">OR</h6>
					</div>
				<!-- OR Ends -->
				<!-- Register ID Starts -->
					<div class="col-auto profile-search-col mr-md-3">
						<h6 class="text-weight-normal">Register ID</h6>
						<input type="text" class="form-control" id="profile_id_search">
					</div>
				<!-- Register ID Ends -->
				<!-- Submit Button Starts -->
					<div class="col-auto profile-search-col">
						<h6 class="text-weight-normal d-none d-sm-block">&nbsp;</h6>
						<button type="button" onClick="searchtoprofilesfun();" class="btn btn-main btn-profile-search animation">Search</button>
					</div>
				<!-- Submit Button Ends -->
				</form>
			<!-- Form Ends -->
			</div>
		</div>
<?php } ?>