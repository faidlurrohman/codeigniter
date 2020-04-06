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
$route['cover'] = 'admin/cover';
$route['delete-image-cover/(:any)'] = 'admin/cover/delete_cover_db/$1';

/////////////////////////////////////////////////////////////////////////////////////////////////////
// user routes
$route['home'] = 'user/index';

$route['content/destinations'] = 'destination/index';
$route['content/destinations/(:any)'] = 'destination/index/$1';
$route['content/choose-destinations/(:any)'] = 'destination/detail_destination/$1';

$route['content/tours'] = 'tour/index';
$route['content/tours/(:any)'] = 'tour/index/$1';
$route['content/choose-tours/(:any)'] = 'tour/detail_tour/$1';

$route['content/transports'] = 'transport/index';
$route['content/transports/(:any)'] = 'transport/index/$1';
$route['content/choose-transports/(:any)'] = 'transport/detail_transport/$1';

$route['content/blog'] = 'blog/index';
$route['content/blog/(:any)'] = 'blog/index/$1';
$route['content/choose-blog/(:any)'] = 'blog/detail_blog/$1';

$route['content/gallery'] = 'gallery/index';
$route['content/gallery/(:any)'] = 'gallery/index/$1';

$route['content/booking'] = 'booking/index';
