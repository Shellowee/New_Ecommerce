<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bds extends CI_Controller{
    
    function  __construct(){
        parent::__construct();

        $this->load->helper('url');
        $this->load->library("pagination");
        
        // Load cart library
        $this->load->library("cart");
        
        // Load bd model
        $this->load->model('bd');
    }
    
    function index(){

		$config = array();
		$config["base_url"] = base_url() . "bds";
		$config["total_rows"] = $this->bd->get_countBds();
		$config["per_page"] = 10;
		$config["uri_segment"] = 2;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['bds'] = $this->bd->get_bdsWithPagination($config["per_page"], $page);


		// Load the bd list view
		$this->load->view('templates/header');
        $this->load->view('bds/index', $data);
		$this->load->view('templates/footer');
    }
    
    function addToCart($cartData){
        
        // Fetch specific bd by id
        $bd = $this->bd->getRows($cartData);
        
        // Add bd to the cart
        $cartData = array(
            'id'    => $cartData,
            'qty'    => 1,
            'price'    => 50,
            'name'    => $bd['titre'],
            'options' => $bd['image']
        );
        $this->cart->insert($cartData);
        
        // Redirect to the cart page
        redirect('cart/index');
    }
    
}
