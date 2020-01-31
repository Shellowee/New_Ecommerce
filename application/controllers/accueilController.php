<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class accueilController extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
		$this->load->model('bd');
	}


	public function bienvenue($page = 'commerceAccueil')
	{
		$data['title'] = ucfirst($page);

		$this->load->view('templates/header');
		$this->load->view($page, $data);
		$this->load->view('templates/footer');
	}
}
