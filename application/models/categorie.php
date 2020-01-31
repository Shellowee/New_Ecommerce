<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Categorie extends CI_Model{

	function __construct()
	{

		parent::__construct();
		$this->genreTable = 'genre';
	}

	public function isACategory($parameter){
		$listCategories = $this->getCategoriesNames();
		$listNoms = Array();
		foreach($listCategories as $categorie){
			array_push($listNoms, $categorie['nom']);
		}
		if(in_array($parameter, $listNoms)) {
			return true;
		}
		return false;
	}

	public function getCategoriesNames(){
		$this->db->select('nom');
		$this->db->from($this->genreTable);
		$query = $this->db->get();
		$result = $query->result_array();

		return !empty($result)?$result:false;
	}

}
