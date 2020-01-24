<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class accueilController extends CI_Controller {


	public function bienvenue()
	{
		$this->load->view('ShelloweeAccueil.php');
	}
}
