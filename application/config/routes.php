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
$route['default_controller'] = 'home/Home/index';
$route['404_override'] = 'Page_Error/index';
$route['translate_uri_dashes'] = TRUE;

$route['page'] = 'Page_Error/search_page';

//modules admin//
$route['admin'] 				        = 'admin/Admin/index';
$route['admin/menu'] 				    = 'admin/Menu/index';
$route['admin/submenu'] 			    = 'admin/SubMenu/index';
$route['admin/role']     			    = 'admin/Role/index';
$route['admin/user']                 	= 'admin/User_Management/index';
$route['admin/artikel'] 				= 'admin/Artikel/index';
$route['admin/kuliner'] 				= 'admin/Kuliner/index';
$route['admin/rekreasi'] 				= 'admin/Rekreasi/index';



// 

//modules home Controller Home
$route['home']	        	    =	'home/Home/index';
$route['about']		            =	'home/Home/about';

$route['rekreasi']		        =	'home/Rekreasi/index';
$route['rekreasi/(:any)']		=	'home/Rekreasi/detail/$1';
$route['kuliner']		        =	'home/Kuliner/index';
$route['kuliner/(:any)']		=	'home/Kuliner/detail/$1';
$route['artikel']		        =	'home/Artikel/index';
$route['artikel/(:any)']        =   'home/Artikel/detail/$1';

//

//modules auth Controller Auth
$route['login']			    	= 'auth/Auth/index';
$route['registration']		    = 'auth/Auth/registration';
$route['logout']		    	= 'auth/Auth/logout';
$route['blocked']               = 'auth/Auth/blocked';
$route['forgot_password'] 	    = 'auth/Auth/forgotPassword';

//

// modules user controller User
$route['user'] 					= 'user/User/index';
$route['user/edit_profile'] 	= 'user/User/editProfile';
$route['user/change_password'] 	= 'user/User/changePassword';

//

// medules author controller author
$route['writer'] 	        				= 'writer/Writer/index';
$route['writer/artikel']         			= 'writer/Artikel/index';
$route['writer/kuliner']         			= 'writer/Kuliner/index';
$route['writer/rekreasi']         			= 'writer/Rekreasi/index';

// $route['example/(:any)'] = 'controller/method/$1';