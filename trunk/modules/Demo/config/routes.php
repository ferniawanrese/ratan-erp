<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

$route['default_controller'] = "demo";
$route[''] = 'demo/index';
# $route['(.*)'] = "demo/index/$1";

// To be able to add customs controllers
// 1. Comment the previous line : $route['(.*)'] = "demo/index/$1";
// 2. Uncomment these lines
$route['404_override'] = 'demo';
$route['(.*)'] = "/$1";
$route['ceklog'] = 'demo/ceklog';
$route['alert'] = 'demo/alert';
$route['breadcrumb'] = 'demo/breadcrumb';
$route['left_menu'] = 'demo/left_menu';
$route['data'] = 'demo/data';
$route['tabs_right'] = 'demo/tabs_right';