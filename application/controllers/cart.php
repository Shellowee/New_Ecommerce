<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        $this->load->library('session');
        
        // Load product model
        $this->load->model('bd');
    }
    
    function index(){
        $data = array();
        $this->bd->getSession();
        
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        $result = $this->cart->total_items();
        log_message('error','dans mon cart: '.$result);

        // Load the cart view
		$this->load->view('templates/header');
        $this->load->view('cart/index', $data);
		$this->load->view('templates/footer');

	}
    
    function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }

    function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
        redirect('cart/index');
    }

    function endSession() {

		$this->session->sess_destroy();
		redirect('cart/index');

	}
    
}
