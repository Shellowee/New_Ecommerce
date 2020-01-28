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
        log_message('error','voila ce que remonte la bdd: '.$bd['id']);

        // Add bd to the cart
        $cartData = array(
            'id'    => $bd['id'],
            'qty'    => 1,
            'price'    => $bd['prix_public'],
            'name'    => $bd['titre'],
            'options' => array('image' => $bd['image'])
        );
        $this->cart->insert($cartData);
        $cart=$this->cart->total_items();
		log_message('error','voila ce quon a persisté: '.$cart);

        // Redirect to the cart page
        redirect('cart/index');
    }
    
}
