<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Bd extends CI_Model{
    
        function __construct() {

        parent::__construct();
        $this->bdTable = 'bd';
        $this->custTable = 'customers';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
        $this->genreTable = 'genre';
        $this->auteurTable = 'auteur';
        $this->auteur_bdTable= 'auteur_bd';
        $this->editeurTable= 'editeur';
        $this->ciSessionTable= 'ci_sessions';
    }
    
    /*
     * Fetch products data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from($this->bdTable);
        $this->db->where('status', '1');
        if ($id) {
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $this->db->order_by('titre', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        // Return fetched data
        return !empty($result)?$result:false;
    }

	public function getTotalBdsByCategory($category){
    	$bdList = $this->db->select('*')
			->from($this->bdTable . ' as b')
			->join($this->genreTable . ' as g', 'g.id = b.genre_id')
			->where('g.nom', $category)
			->get();
    	return $bdList->num_rows();
	}

    public function getSession(){
    	$this->db->select('*');
		$this->db->from($this->ciSessionTable);
		$this->db->limit(1);
	}


	public function getCategoryOfABd($id){
    	$this->db->select('*');
    	$this->db->from($this->genreTable . ' as g');
    	$this->db->join($this->bdTable . ' as b', 'g.id = b.genre_id');
		$this->db->where('b.id', $id);
		$query = $this->db->get();
		$result = $query->row_array();

		// Return fetched data
		return !empty($result)?$result:false;
	}

	public function getAuteursOfABd($id){
		$this->db->select('*');
		$this->db->from($this->auteurTable . ' as a');
		$this->db->join($this->auteur_bdTable . ' as j', 'a.id = j.auteur_id');
		$this->db->join($this->bdTable . ' as b', 'b.id = j.bd_id');
		$this->db->where('b.id', $id);
		$query = $this->db->get();
		$result = $query->result_array();

		// Return fetched data
		return !empty($result)?$result:false;
	}

	public function getEditeurOfABd($id){
		$this->db->select('*');
		$this->db->from($this->editeurTable . ' as e');
		$this->db->join($this->bdTable . ' as b', 'e.id = b.editeur_id');
		$this->db->where('b.id', $id);
		$query = $this->db->get();
		$result = $query->row_array();

		// Return fetched data
		return !empty($result)?$result:false;
	}

	public function get_countBds() {
    	return $this->db->count_all($this->bdTable);
	}

	public function get_bdsWithPagination($limit, $start) {
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->bdTable);

		return $query->result();
	}

	public function get_bdsWithPaginationByCategory($limit, $start, $categorie) {
		$this->db->limit($limit, $start);
		$this->db->from($this->bdTable . ' as b');
		$this->db->join($this->genreTable . ' as g', 'g.id = b.genre_id');
		$this->db->where('g.nom', $categorie);
		$query = $this->db->get();

		return $query->result_array();
	}
    
    /*
     * Fetch order data from the database
     * @param id returns a single record of the specified id
     */
    public function getOrder($id){
        $this->db->select('o.*, c.name, c.email, c.phone, c.address');
        $this->db->from($this->ordTable . ' as o');
        $this->db->join($this->custTable . ' as c', 'c.id = o.customer_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('i.*, b.image, b.titre, b.prix_public');
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->bdTable.' as b', 'b.id = i.bd_id', 'left');
        $this->db->where('i.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0) ? $query2->result_array():array();
        
        // Return fetched data
        return !empty($result) ? $result : false;
    }
    
    /*
     * Insert customer data in the database
     * @param data array
     */
    public function insertCustomer($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert customer data
        $insert = $this->db->insert($this->custTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order data in the database
     * @param data array
     */
    public function insertOrder($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert order data
        $insert = $this->db->insert($this->ordTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order items data in the database
     * @param data array
     */
    public function insertOrderItems($data = array()) {
        
        // Insert order items
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);

        // Return the status
        return $insert?true:false;
    }
    
}
