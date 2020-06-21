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
$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['logout'] = 'Auth/logout';
//ALUMNI
$route['admin']   = 'admin/Dashboard';
$route['alumni']   = 'admin/Alumni';
$route['insert_alumni']   = 'admin/Alumni/insert';
$route['update_alumni']   = 'admin/Alumni/update';
$route['delete_alumni/(:any)']   = 'admin/Alumni/delete/$1';
//PENGABDIAN
$route['infoPengabdian']   = 'admin/Alumni/infoPengabdian';


//KUSIONER
$route['kuisioner']   = 'admin/Kuisioner';
$route['tambah_kuisioner']   = 'admin/Kuisioner/tambah_kuisioner';
$route['insertKuisioner']   = 'admin/Kuisioner/insert_kuisioner';
$route['editKuisioner/(:any)']   = 'admin/Kuisioner/edit_kuisioner/$1';
$route['deleteKuisioner/(:any)']   = 'admin/Kuisioner/hapus_kuisioner/$1';
$route['insertPertanyaan']   = 'admin/Kuisioner/tambah_pertanyaan';
$route['listPertanyaan']   = 'admin/Kuisioner/list_pertanyaan';
$route['deletePertanyaan/(:any)']   = 'admin/Kuisioner/hapus_pertanyaan/$1';
//PERUSAHAAN
$route['perusahaan']   = 'admin/Perusahaan';
$route['insert_perusahaan']   = 'admin/Perusahaan/insert';
$route['update_perusahaan']   = 'admin/Perusahaan/update';
$route['delete_perusahaan/(:any)']   = 'admin/Perusahaan/delete/$1';
//LOWONGAN
$route['lowongan']   = 'admin/Perusahaan/index_lowongan';
$route['insert_lowongan']   = 'admin/Perusahaan/insert_lowongan';
$route['update_lowongan']   = 'admin/Perusahaan/update_lowongan';
$route['delete_lowongan/(:any)']   = 'admin/Perusahaan/delete_lowongan/$1';


$route['alumniPage']   = 'alumni/Dashboard';
$route['alumniProfile']   = 'alumni/Dashboard/profile';
$route['alumniInfoLowongan']   = 'alumni/InfoLowongan';
