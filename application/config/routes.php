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
$route['default_controller'] = 'konten/beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// user routes
$route['beranda'] = 'konten/beranda';
$route['kebijakan'] = 'konten/kebijakan';
$route['pembayaran'] = 'konten/pembayaran';
$route['syarat-dan-ketentutan'] = 'konten/syarat';
$route['tentang-kami'] = 'konten/tentang';
$route['tour/(:any)'] = 'konten/tour/$1';
$route['paket/(:any)'] = 'konten/paket/$1';
$route['transport'] = 'konten/transport';
$route['sewa-mobil'] = 'konten/mobil';
$route['sewa-bus'] = 'konten/bus';
$route['sewa-glass-bottom'] = 'konten/glass_bottom';
$route['sewa-speed-boat'] = 'konten/speed_boat';
$route['sewa-slow-boat'] = 'konten/slow_boat';
$route['hotel'] = 'konten/hotel';
$route['hotel/(:any)'] = 'konten/detail_hotel/$1';
$route['booking'] = 'konten/booking';
$route['blog'] = 'konten/blog';
$route['blog/(:any)'] = 'konten/detail_blog/$1';
$route['galeri'] = 'konten/galeri';
// admin routes
$route['admin'] = 'admin/dub_konten';
$route['admin/beranda'] = 'admin/dub_konten/beranda';
$route['admin/tour'] = 'admin/dub_konten/tambah_tour';
$route['admin/paket'] = 'admin/dub_konten/tambah_paket';
$route['admin/daerah'] = 'admin/dub_konten/tambah_daerah';
$route['admin/hotel'] = 'admin/dub_konten/tambah_hotel';
$route['admin/galeri'] = 'admin/dub_konten/tambah_galeri';
$route['admin/slider'] = 'admin/dub_konten/img_slider';
$route['admin/blog'] = 'admin/dub_konten/tambah_blog';
$route['admin/booking'] = 'admin/dub_konten/booking';
$route['admin/edit-paket/(:any)'] = 'admin/dub_konten/edit_paket/$1';
$route['admin/edit-daerah/(:any)'] = 'admin/dub_konten/edit_daerah/$1';
$route['admin/edit-hotel/(:any)'] = 'admin/dub_konten/edit_hotel/$1';
$route['admin/edit-blog/(:any)'] = 'admin/dub_konten/edit_blog/$1';
