<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
// Auth
$route['login'] = 'Auth/view_index';
$route['logout'] = 'Auth/proses_logout';
$route['signup'] = 'Auth/view_daftar';
$route['verifikasi'] = 'Auth/view_verifikasi';
$route['recovery'] = 'Auth/view_recovery';
$route['a/(:any)'] = 'Auth/proses_$1';

// Superadmin
$route['sp'] = 'Superadmin/view_index';
$route['sp/([a-z]+)'] = 'Superadmin/view_$1';
$route['sp/p/([a-z]+)'] = 'Superadmin/proses_$1';

// Keuangan
$route['kg'] = 'Keuangan/view_index';
$route['kg/([a-z]+)'] = 'Keuangan/view_$1';
$route['kg/p/([a-z]+)'] = 'Keuangan/proses_$1';
$route['kg/p/i/([a-z_]+)'] = 'Keuangan/proses_insert_$1';
$route['kg/p/g/([a-z_]+)'] = 'Keuangan/proses_get_$1';
$route['kg/p/u/([a-z_]+)'] = 'Keuangan/proses_update_$1';
$route['kg/p/up/([a-z_]+)'] = 'Keuangan/proses_upload_$1';
$route['kg/p/del/([a-z_]+)'] = 'Keuangan/proses_delete_$1';
$route['kg/p/d/([a-z_]+)'] = 'Keuangan/proses_delete_$1';
$route['kg/p/dtb/([a-z_]+)'] = 'Keuangan/proses_dtb_$1';
$route['kg/p/s2/([a-z_]+)'] = 'Keuangan/proses_select2_$1';

// Instansi
$route['it'] = 'Instansi/view_index';
$route['it/([a-z_]+)'] = 'Instansi/view_$1';
$route['it/p/([a-z]+)'] = 'Instansi/proses_$1';
$route['it/p/dtb/([a-z_]+)'] = 'Instansi/proses_dtb_$1';
$route['it/p/s2/([a-z_]+)'] = 'Instansi/proses_select2_$1';

// Pengguna
$route['pg'] = 'Pengguna/view_index';
$route['pg/([a-z_]+)'] = 'Pengguna/view_$1';
$route['pg/p/([a-z]+)'] = 'Pengguna/proses_$1';
$route['pg/p/i/([a-z_]+)'] = 'Pengguna/proses_insert_$1';
$route['pg/p/g/([a-z_]+)'] = 'Pengguna/proses_get_$1';
$route['pg/p/u/([a-z_]+)'] = 'Pengguna/proses_update_$1';
$route['pg/p/up/([a-z_]+)'] = 'Pengguna/proses_upload_$1';
$route['pg/p/del/([a-z_]+)'] = 'Pengguna/proses_delete_$1';
$route['pg/p/dtb/([a-z_]+)'] = 'Pengguna/proses_dtb_$1';
$route['pg/p/d/([a-z_]+)'] = 'Pengguna/proses_delete_$1';
$route['pg/p/s2/([a-z_]+)'] = 'Pengguna/proses_select2_$1';

$route['default_controller'] = 'Auth/view_index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
