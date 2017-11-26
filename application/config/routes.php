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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['editarprofesor/index/(:any)'] = 'editarprofesor/index/$1';
$route['editarmateria/index/(:any)'] = 'editarmateria/index/$1';
$route['listaevaluaciones/index/(:any)'] = 'listaevaluaciones/index/$1';
$route['crearevaluacion/index/(:any)'] = 'crearevaluacion/index/$1';
$route['editarevaluacion/index/(:any)'] = 'editarevaluacion/index/$1';
$route['editarcontenidoevaluacion/index/(:any)'] = 'editarcontenidoevaluacion/index/$1';
$route['editarseccion/index/(:any)/(:any)'] = 'editarseccion/index/$1/$2';
$route['editarcriterio/index/(:any)/(:any)/(:any)'] = 'editarcriterio/index/$1/$2/$3';
$route['mostrarevaluacion/index/(:any)'] = 'mostrarevaluacion/index/$1';
$route['vaciarevaluacion/index/(:any)'] = 'vaciarevaluacion/index/$1';
$route['mostrarestadisticasevaluacion/index/(:any)'] = 'mostrarestadisticasevaluacion/index/$1';