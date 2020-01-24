<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class accueilController extends CI_Controller {


	public function bienvenue($page = 'ShelloweeAccueil')
	{
		$data['title'] = ucfirst($page);

		$this->load->view('templates/header');
		$this->load->view($page, $data);
		$this->load->view('templates/footer');
	}
}
