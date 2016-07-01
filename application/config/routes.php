<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'admin/login';
$route['logout'] = 'admin/logout';
$route['dashboard'] = 'admin/dashboard';