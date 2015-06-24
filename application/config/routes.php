<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
 */

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['dealership/(:num)'] = "welcome/dealership/$1";
$route['brand/(:any)'] = "welcome/brand/$1";
$route['series/(:any)'] = "welcome/series/$1/";
$route['used/(:any)'] = "welcome/used/$1";
$route['demo/(:any)'] = "welcome/demo/$1";
$route['specials/(:any)'] = "welcome/specials/$1";
$route['dealerships/(:any)/(:any)/(:any)'] = "welcome/dealerships/$1/$2/$3";
$route['dealerships/(:any)'] = "welcome/dealerships/$1";
$route['new/(:any)/(:any)'] = "welcome/newcar/$1/$2";
$route['specials-enquiry/(:any)/(:any)'] = "welcome/special_enquiry/$1/$2";
$route['blogs/(:any)'] = "welcome/blogs/$1";
$route['blog/(:any)'] = "welcome/content/$1/$2/$3";
$route['about/(:any)'] = "welcome/about/$1";
$route['contact/(:any)/(:any)'] = "welcome/contact/$1/$2";
$route['preowned/(:any)/(:num)'] = "welcome/preowned/$1/$2";
$route['terms/(:any)'] = "welcome/terms/$1";
$route['brochure/(:any)'] = "welcome/brochure/$1";
$route['service/(:any)'] = "welcome/service/$1";
$route['testdrive/(:any)'] = "welcome/testdrive/$1";
$route['thankyou/(:any)'] = "welcome/thankyou/$1";
$route['thankyou'] = "welcome/thankyou/";
$route['parts/(:any)'] = "welcome/parts/$1";
$route['brochures/(:any)'] = "welcome/brochures/$1";
$route['financial-services/(:any)'] = "welcome/financial_services/$1/$2";

/* End of file routes.php */
/* Location: ./application/config/routes.php */