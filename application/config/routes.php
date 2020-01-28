<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'accueilController/bienvenue';
$route['(:any)'] = 'accueilController/bienvenue/$1';
$route['add/(:num)'] = 'bds/addToCart/$1';
$route['bds/(:num)'] = 'bds/index';
$route['bds/bd/(:num)'] = 'detailBd/index/$1';
$route['cart/index'] = 'cart/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
