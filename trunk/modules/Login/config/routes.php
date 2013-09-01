<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

$route['default_controller'] = "login";
$route[''] = 'login/index';
# $route['(.*)'] = "demo/index/$1";

// To be able to add customs controllers
// 1. Comment the previous line : $route['(.*)'] = "demo/index/$1";
// 2. Uncomment these lines
$route['404_override'] = 'login';
$route['(.*)'] = "/$1";
