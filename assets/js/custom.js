(function($) {

    "use strict";

	


    // REMOVE # FROM URL
    $('a[href="#"]').click(function(e) {
        e.preventDefault();
    });

    // Featured Profile Carousel
    $(".featured-carousel-12").slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: '<div class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>',
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });

	 // Gallery Carousel
    $(".gallery-carousel-1").slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: '<div class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>',
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });


    // Success Stories Carousel
    $(".home-success-stories-carousel").slick({
      dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: '<div class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>',
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });

    // Register Modal
    // $('#registerModal').modal('show');

    // Copyright Date Stamp
    $(".date-stamp").html( new Date().getFullYear() );

})(window.jQuery);
function closereload(){
	$('#validationPop').modal('hide');
	$("#pvalidationPop").modal('hide');
	window.location = base_url;
}
function removeclosereload(){
	$("#rvalidationPop").modal('hide');
}
function registerationform(){
	$("#registerthru1").prop( "checked", false );
	$("#registerthru2").prop( "checked", false );
	$('#error_user_email').html('');
	$('#error_user_mobile').html('');
	$('#error_user_encrpted_password').html('');
	$('#error_user_create_profile_for').html('');
	$('#error_user_display_name').html('');
	$('#error_user_referal_code').html('');
	$('#hid_user_gender_code_user_create_profile_for').hide();
	$('#hid_user_referal_code').hide();
	$('.clsregisterthru').find('input').prop('checked', false);  
	$('#registerModal').modal('show');
	$('#loginModal').modal('hide');
}
function loginvalidate(){
	$('#registerModal').modal('hide');
	$('#loginModal').modal('show');
}
$(document).ready(function () { 
	$(".clsregisterthru").click(function(){
		var radioValue = $("input[name=registerthru]:checked").val();
		if(radioValue == 2){
			$('#hid_user_gender_code_user_create_profile_for').hide();
			$('#hid_user_referal_code').show();
		}else if(radioValue == 1){
			$('#hid_user_gender_code_user_create_profile_for').show();
			$('#hid_user_referal_code').hide();
		}
	});
});
function registerFormSubmit(type){
	var user_display_name       = $("#user_display_name").val();
	var user_email              = $("#user_email").val();
	var user_mobile             = $("#user_mobile").val();
	var user_encrpted_password  = $("#user_encrpted_password").val();
	var user_create_profile_for = $("#user_create_profile_for").val();
	var getVal                  = $('input[name="registerthru"]:checked').val();
	console.log(getVal);
	var flag = true;
	$('#error_user_email').html('');
	$('#error_user_mobile').html('');
	$('#error_user_encrpted_password').html('');
	$('#error_user_create_profile_for').html('');
	$('#error_user_display_name').html('');
	$('#error_user_referal_code').html('');
	$('#error_registerthru1').html('');
	if(getVal==""){
		flag = false;
		$("#error_registerthru1").html('To which you want to register.');
	}else if(getVal==undefined){
		flag = false;
		$("#error_registerthru1").html('To which you want to register.');
	}
	if(user_display_name==''){
		flag = false;
		$('#error_user_display_name').html('Username is required.');
	}
	if(user_email==''){
		flag = false;
		$('#error_user_email').html('Email is required.');
	}
	if(user_mobile==''){
		flag = false;
		$('#error_user_mobile').html('Mobile is required.');
	}
	if(user_encrpted_password==''){
		flag = false;
		$('#error_user_encrpted_password').html('Password is required.');
	}
	if(getVal==2){
		var user_referal_code = $("#user_referal_code").val();
		if(user_referal_code==""){
			flag = false;
			$('#error_user_referal_code').html('User referral code is required.');
		}else if(user_referal_code!=""){
			$.ajax({
				type		:	'POST',
				url			:  	base_url+'User/userrefferachecking?sRch='+time,
				dataType	: 	"json",
				data		:	{user_referal_code:user_referal_code,register_from:getVal},
				success: function(data){
					if(data.output=="success"){
						$('#error_user_referal_code').html('');
					}else if(data.output=="notinrecords"){
						flag = false;
						$('#error_user_referal_code').html('Entered referral code not in our records.');
					}else if(data.output=="somethingwentwrong"){
						flag = false;
						$('#error_user_referal_code').html('The mobile entered already exists in our records.');
					}else if(data.output=="referralcodeisrequired"){
						flag = false;
						$('#error_user_referal_code').html('User referral code is required.');
					}else{
						return false;
					}
				}
			});
		}
	}
	if(flag==false){
		return false;
	}else{
		$("#form_submit").hide();
		$("#form_process_form").show();
		$.ajax({
			type		:	'POST',
			url			:  	base_url+'User/useremailandmobilechecking?sRch='+time,
			dataType	: 	"json",
			data		:	{user_email:user_email,user_mobile:user_mobile,register_from:getVal},
			success: function(data){
				$("#form_submit").show();
				$("#form_process_form").hide();
				if(data.output=="mobilealreadywithus"){
					$('#error_user_mobile').html('The mobile entered already exists in our records.');
				}else if(data.output=="emailalreadywithus"){
					$('#error_user_email').html('The email address entered already exists in our records.');
				}else if(data.output=="success"){
					$('#registerform').submit();
				}else{
					return false;
				}
			}
		});
	}
}
function loginFormSubmit(type){
	var log_user_email             = $("#log_user_email").val();
	var log_user_encrpted_password = $("#log_user_encrpted_password").val();
	var getVal                     = $('input[name="loginthru"]:checked').val();		
	var flag = true;
	$('#error_loginthru1').html('');
	$('#error_log_user_email').html('');
	$('#error_log_user_encrpted_password').html('');
	if(getVal==""){
		flag = false;
		$("#html_new").html("You are not allowed to see other " +gender+ " Profiles");
		$("#pvalidationPop").modal('show');		$("#error_loginthru1").html('To which you want to login.');
	}else if(getVal==undefined){
		flag = false;
		$("#error_loginthru1").html('To which you want to login.');
	}
	
	if(log_user_email==''){
		flag = false;
		$('#error_log_user_email').html('Username is required.');
	}
	if(log_user_encrpted_password==''){
		flag = false;
		$('#error_log_user_encrpted_password').html('Email is required.');
	}
	if(flag==false){
		return false;
	}else{
		$("#form_submit_login").hide();
		$("#form_process_login").show();
		$.ajax({
			type		:	'POST',
			url			:  	base_url+'/User/loginsubmitprocess?sRch='+time,
			dataType	: 	"json",
			data		:	{user_email:log_user_email,user_encrpted_password:log_user_encrpted_password,loginthru:getVal},
			success: function(data){
				$("#form_submit_login").show();
				$("#form_process_login").hide();
				if(data.output=="loginfail"){
					$('#error_login_fail').html('Login failed: Invalid username or password.');
				}else if(data.output=="passwordisrequired"){
					$('#error_log_user_encrpted_password').html('The password is required.');
				}else if(data.output=="emailormobileisrequired"){
					$('#error_log_user_email').html('The Email or Mobile number is required.');
				}else if(data.output=="success"){
					$('#loginsubmitform').submit();
				}else{
					return false;
				}
			}
		});
	}
}

function pleasecontactadmin(val,fromtitle,gender=""){
	if(fromtitle=='viewprofile'){
		$('#registerModal').modal('hide');
		$('#loginModal').modal('hide');
		$('#validationPop').modal('hide');
		$("#myModalLabell").html("Not Allowed");

	}
}
function subscribeform(){
	var subscribeid = $("#subscribeid").val();
	var flag=true;
	if(subscribeid==""){
		flag=false;
		$("#subscribeid").focus();
		$("#error_subscribeid").html('Subscribe email is required');
	}else{		
		$("#error_subscribeid").html('');
	}
	if(flag==false){
		return false;
	}else{
		$.ajax({
			type		:	'POST',
			url			:  	base_url+'User/subscribeemailsave?sRch='+time,
			dataType	: 	"json",
			data		:	{subscribeid:subscribeid},
			success: function(data){
				$("#subscribeid").val('');
				if(data.output=='success'){
					$("#error_subscribeid").html('Subacribe is updated successfully.');
				}else if(data.output=='fail'){
					$("#error_subscribeid").html('Please try again.');
				}else if(data.output=='subscribeemailisrequired'){
					$("#error_subscribeid").html('Subscribe email is required');
				}
				setTimeout(function(){ $("#error_subscribeid").html(''); }, 3000);

			}
		});
	}
}
function searchtoprofilesfun(){
	var gender_search     = $("#gender_search").val();
	var from_search       = $("#from_search").val();
	var to_search         = $("#to_search").val();
	var profession_search = $("#profession_search").val();
	var caste_search      = $("#caste_search").val();
	var profile_id_search = $("#profile_id_search").val();
	var flag = true;
	if(profile_id_search!=""){
		$.ajax({
			type		:	'POST',
			url			:  	base_url+'User/checkProfileId?sRch='+time,
			dataType	: 	"json",
			data		:	{profileid:profile_id_search},
			success: function(data){
				if(data.output=='profileisrequired'){
					$("#error_required_messgae").html('Register ID is required.');
					$("#rvalidationPop").modal('show');
				}else if(data.output=='profileisnotfound'){
					$("#error_required_messgae").html('Register ID is not in our records.');
					$("#profile_id_search").focus();
					$("#rvalidationPop").modal('show');
				}else if(data.output=='profileidisvalid'){
					window.location = base_url+"searchprofiles?fromagesearch="+from_search+"&toagesearch="+to_search+"&professionsearch="+profession_search+"&castesearch="+caste_search+"&registerid="+profile_id_search;
				}else{
					window.location = base_url;
				}			
			}
		});
	}else{
		if(gender_search!=""){
			gender_search = gender_search;
		}else{
			flag = false;
			$("#error_required_messgae").html('Gender is required.');
			$("#rvalidationPop").modal('show');
		}
		if(profession_search==""){
			profession_search = 'emptyprofession';
		}
		if(caste_search==""){
			caste_search = 'emptycaste';
		}
		if(flag==false){
			return false;
		}else{
			window.location = base_url+"searchprofiles?fromagesearch="+from_search+"&toagesearch="+to_search+"&professionsearch="+profession_search+"&castesearch="+caste_search;
		}
	}	
}
function formvalidatefun(){
	var flag = true;
	var servicename         = $("#servicename").val();
	var servicemasterid     = $("#servicemasterid").val();
	var serviceemailaddress = $("#serviceemailaddress").val();			
	var serviceaddress = $("#serviceaddress").val();			
	var serviceskil1    = $("#serviceskil1").val();
	var serviceskil2    = $("#serviceskil2").val();
	var servicewebsite  = $("#servicewebsite").val();
	var servicewebimage = $("#servicewebimage").val();
	var serviceprimarycontactnumber = $("#serviceprimarycontactnumber").val();
	$("#error_servicename").html('');
	$("#error_servicemasterid").html('');
	$("#error_serviceemailaddress").html('');
	$("#error_serviceskil1").html('');
	$("#error_serviceskil2").html('');
	$("#error_servicewebsite").html('');
	$("#error_servicewebimage").html('');
	$("#error_serviceprimarycontactnumber").html('');
	if(servicename==''){
		flag = false;
		$("#error_servicename").html('Service name is required.');
	}
	if(servicemasterid==''){
		flag = false;
		$("#error_servicemasterid").html('Service category id is required.');
	}
	if(servicewebimage==''){
		flag = false;
		$("#error_servicemasterid").html('Service image id is required.');
	}
	if(serviceprimarycontactnumber==''){
		flag = false;
		$("#error_serviceprimarycontactnumber").html('Mobile number is required.');
	}
	if(serviceemailaddress==''){
		flag = false;
		$("#error_serviceemailaddress").html('Email id is required.');
	}
	if(serviceskil1==''){
		flag = false;
		$("#error_serviceskil1").html('Additional skill is required.');
	}
	if(serviceaddress==''){
		flag = false;
		$("#error_serviceaddress").html('Address id is required.');
	}
	if(flag==false){
		return false;
	}else{
		$("#btn_submit").hide();
		$("#btn_process").show();
		$("#formvalidate").submit();
	}	
}
function checkLoggedornot(id){
	$(".requiedstatus").html('Required Alert');
	$("#error_required_messgae").html('Kindly login.');
	$('#rvalidationPop').modal('show');
}
function checkLoggedornott(id){
	$(".requiedstatus").html('Required Alert');
	$("#error_required_messgae").html('For viewing details kindly register.');
	$('#rvalidationPop').modal('show');
}
function profileliked(incr,type,loggeduserid,profileid){
	if(loggeduserid!="" && profileid!=""){
		if(type=='like'){
			var r = confirm("Are you want to like of this profile.");
		}else{
			var r = confirm("Are you want to dislike of this profile.");
		}
		if (r == true) {
			$.ajax({
				type		:	'POST',
				url			:  	base_url+'User/profileLikedorDisliked?sRch='+time,
				dataType	: 	"json",
				data		:	{loggeduserid:loggeduserid,profileid:profileid},
				success: function(data){
					if(data.output=='success'){
						window.location = base_url+"likeduserprofiles";
					}else{
						$(".requiedstatus").html('Server Issue');
						$("#error_required_messgae").html('Some thing went wrong, please tr again.');
						$('#rvalidationPop').modal('show');
					}	
				}
			});
		}
	}else{
		$(".requiedstatus").html('Required Alert');
		$("#error_required_messgae").html('Kindly login.');
		$('#rvalidationPop').modal('show');
	}
}
function validateheader(){
	$("#eevalidationPop").modal('show');
}
function closewindowform(){
	$("#eevalidationPop").modal('hide');
}
function verifyuser(){
	$(".requiedstatus").html('Not Allowed');
	$("#error_required_messgae").html('Contact Admin.');
	$('#rvalidationPop').modal('show');
}