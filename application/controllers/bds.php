<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bds extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load bd model
        $this->load->model('bd');
    }
    
    function index(){
        $data = array();
        
        // Fetch bds from the database
        $data['bds'] = $this->bd->getRows();
        
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
