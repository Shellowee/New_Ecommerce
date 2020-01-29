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
        $this->load->model('categorie');
    }
    
    function index($categorie = NULL){

		$config = array();

		//configuration de la pagination du framework personnalisée avec bootstrap
		$config["per_page"] = 9;
		$config["uri_segment"] = 2;
		$config["full_tag_open"] = "<ul class='pagination pagination-sm'>";
		$config["full_tag_close"] = "</ul>";
		$config["num_tag_open"] = "<li class='page-item'>";
		$config["num_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["next_tag_open"] = "<li class='page-item'>";
		$config["next_tag_close"] = "</li>";
		$config["prev_tag_open"] = "<li class='page-item'>";
		$config["prev_tag_close"] = "</li>";
		$config["first_tag_open"] = "<li class='page-item'>";
		$config["first_tag_close"] = "</li>";
		$config["last_tag_open"] = "<li class='page-item'>";
		$config["last_tag_close"] = "</li>";
		$config["next_link"] = "&gt;";
		$config["prev_link"] = "Previous";
		$config["attributes"] = array('class' => 'page-link');

		$data['categorie'] = $categorie;

		//Cas de l'accès à la liste des BD triées par genre
		if($categorie === NULL || !$this->categorie->isACategory($categorie)){
			log_message('error','pas une categorie');
			log_message('error','categorie: '.$categorie);
			$config["base_url"] = base_url() . "bds/index";
			$config["total_rows"] = $this->bd->get_countBds();
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data['bds'] = $this->bd->get_bdsWithPagination($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();

		//cas de l'accès à la liste complète des BD
		} else {
			log_message('error','a une categorie !');
			log_message('error','categorie: '.$categorie);
			$config["base_url"] = base_url() . "bds/" . $categorie;
			$config["total_rows"] = $this->bd->getTotalBdsByCategory($categorie);
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data['bdsWithCat'] = $this->bd->get_bdsWithPaginationByCategory($config["per_page"], $page, $categorie);
			$data["links"] = $this->pagination->create_links();
		}

		// Charge la page de listing des BD
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
