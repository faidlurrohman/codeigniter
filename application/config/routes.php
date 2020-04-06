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
$route['default_controller'] = 'user/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/////////////////////////////////////////////////////////////////////////////////////////////////////

// user routes
$route['home'] = 'user/index';
//bank
$route['bank'] = 'user/bank';
$route['confirm'] = 'user/confirm';	
// destination
$route['destination'] = 'user/destination';
$route['destination/(:any)'] = 'user/destination/$1';
$route['this-destination/(:any)'] = 'user/detail_destination/$1';
// tour
$route['tours'] = 'user/tours';
$route['tours/(:any)'] = 'user/tours/$1';
$route['tour/(:any)'] = 'user/detail_tour/$1';
// transport
$route['transports'] = 'user/transports';
$route['transports/(:any)'] = 'user/transports/$1';
$route['transport/(:any)'] = 'user/detail_transport/$1';
// transport
$route['posts'] = 'user/blogs';
$route['posts/(:any)'] = 'user/blogs/$1';
$route['post/(:any)'] = 'user/detail_blog/$1';
// contact
$route['booking'] = 'user/booking';

/////////////////////////////////////////////////////////////////////////////////////////////////////

// admin routes
$route['admin'] = 'admin/admin';
$route['login'] = 'admin/admin';
$route['logout'] = 'admin/admin/logout';
$route['dashboard'] = 'admin/admin/home';
// admin destination
$route['featured'] = 'admin/featured';
$route['featured/(:any)'] = 'admin/featured/index/$1';
// admin destination
$route['destinations'] = 'admin/destinations';
$route['destinations/(:any)'] = 'admin/destinations/index/$1';
$route['delete-destination/(:any)'] = 'admin/destinations/delete_destination_db/$1';
// admin package
$route['packages'] = 'admin/packages';
$route['packages/(:any)'] = 'admin/packages/index/$1';
$route['edit-package/(:any)'] = 'admin/packages/edit_package/$1';
$route['delete-package/(:any)'] = 'admin/packages/delete_package_db/$1';
// admin transportation
$route['transportations'] = 'admin/transportations';
$route['transportation/(:any)'] = 'admin/transportations/index/$1';
$route['edit-transportation/(:any)'] = 'admin/transportations/edit_transportation/$1';
$route['delete-transportation/(:any)'] = 'admin/transportations/delete_transportation_db/$1';
// admin blog
$route['blog'] = 'admin/blog';
$route['blog/(:any)'] = 'admin/blog/index/$1';
$route['edit-blog/(:any)'] = 'admin/blog/edit_blog/$1';
$route['delete-blog/(:any)'] = 'admin/blog/delete_blog_db/$1';
// admin gallery
$route['gallery'] = 'admin/galery';
$route['gallery/(:any)'] = 'admin/galery/index/$1';
$route['delete-image-gallery/(:any)'] = 'admin/galery/delete_gallery_db/$1';
// admin slider
$route['slider'] = 'admin/slider';
$route['slider/(:any)'] = 'admin/slider/index/$1';
$route['delete-image-slider/(:any)'] = 'admin/slider/delete_slider_db/$1';
