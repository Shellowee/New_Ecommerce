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
        $this->load->view('bds/index', $data);
    }
    
    function addToCart($proID){
        
        // Fetch specific bd by id
        $bd = $this->bd->getRows($proID);
        
        // Add bd to the cart
        $proID = array(
            'id'    => $bd['id'],
            'qty'    => 1,
            'price'    => $bd['prix_public'],
            'nom'    => $bd['titre'],
            'image' => $bd['image']
        );
        $this->cart->insert($proID);
        
        // Redirect to the cart page
        redirect('cart/');
    }
    
}