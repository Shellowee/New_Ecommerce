<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class detailBd extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library("cart");
		$this->load->model('bd');
	}

	function index($id)
	{
		$data['detailBd'] = $this->bd->getRows($id);
		$data['auteurs'] = $this->bd->getAuteursOfABd($id);
		$data['editeur'] = $this->bd->getEditeurOfABd($id);
		$data['genre'] = $this->bd->getCategoryOfABd($id);

		$this->load->view('templates/header');
		$this->load->view('detailBd/detail', $data);
		$this->load->view('templates/footer');
	}

}
