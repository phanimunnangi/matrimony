<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'frontend';
$route['default_controller']   = 'LoaddingPage';
$route['aboutus']   = 'LoaddingPage/aboutus';
$route['how']   = 'LoaddingPage/how';
$route['disclaimer']   = 'LoaddingPage/disclaimer';
$route['communitydetails']   = 'LoaddingPage/communitydetails';
$route['contactus']   = 'LoaddingPage/contactus';
$route['services']   = 'LoaddingPage/servicesListing';
$route['services-info']   = 'LoaddingPage/servicesInfo';
$route['services/(:any)']   = 'LoaddingPage/servicesListing';
$route['services/(:any)/(:num)']   = 'LoaddingPage/servicesListing';
$route['bride-profiles']   = 'LoaddingPage/brideGroomListing';
$route['bride-profiles/(:num)']   = 'LoaddingPage/brideGroomListing';
$route['groom-profiles']   = 'LoaddingPage/groomListing';
$route['groom-profiles/(:num)']   = 'LoaddingPage/groomListing';
$route['packages']   = 'LoaddingPage/packages';
$route['nri-profiles']   = 'LoaddingPage/nrisListing';
$route['nri-profiles/(:num)']   = 'LoaddingPage/nrisListing';
$route['secondmarriage-profiles']   = 'LoaddingPage/secondmarriagesListing';
$route['secondmarriage-profiles/(:num)']   = 'LoaddingPage/secondmarriagesListing';
// UserProfiles
$route['changepassword']   = 'User/changePassword';
$route['forgotpassword']   = 'User/forgotPassword';
$route['resetpassword']   = 'User/resetPassword';
$route['viewprofile/(:any)']   = 'User/viewProfile';
$route['editprofile']   = 'User/editProfile';
$route['register']   = 'User/editProfile';
$route['searchprofiles']   = 'User/searchProfiles';
$route['likeduserprofiles']   = 'User/likeduserprofiles';
$route['likeduserprofiles/(:num)']   = 'User/likeduserprofiles';
$route['family-members']   = 'LoaddingPage/fmemberCollections';

$route['sendemail']   = 'LoaddingPage/emailChecking';

$route['swayamadmin'] = 'admin/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
