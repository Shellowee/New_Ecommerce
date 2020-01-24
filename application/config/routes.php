<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'accueilController/bienvenue';
$route['(:any)'] = 'accueilController/bienvenue/$1';
$route['bds'] = 'bds/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
