<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Bd extends CI_Model{
    
        function __construct() {

        parent::__construct();
        $this->bdTable = 'bd';
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
    	$bdList = $this->db->select('b.*')
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
    	$this->db->select('g.*');
    	$this->db->from($this->genreTable . ' as g');
    	$this->db->join($this->bdTable . ' as b', 'g.id = b.genre_id');
		$this->db->where('b.id', $id);
		$query = $this->db->get();
		$result = $query->row_array();

		// Return fetched data
		return !empty($result)?$result:false;
	}

	public function getAuteursOfABd($id){
		$this->db->select('a.*');
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
		$this->db->select('e.*');
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
		$this->db->select('b.*');
		$this->db->from($this->bdTable . ' as b');
		$this->db->join($this->genreTable . ' as g', 'g.id = b.genre_id', 'left');
		$this->db->where('g.nom', $categorie);
		$query = $this->db->get();
		$result = ($query->num_rows() > 0) ? $query->result_array():array();

		return !empty($result) ? $result : false;
	}
    
}
