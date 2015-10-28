<?php defined('SYSPATH') or die('No direct script access.');
 
class Category_Model extends ORM {
 	protected $has_many = ['item'];

 	public function __construct(){
 		parent::__construct();
 	}

	public function getAll(){
		return $this->db->get('categories');
	}

 	public function insert($data){
 		$id = $this->db->insert('categories', $data)->insert_id();
 		return $this->getOne($id);
 	}

 	public function getOne($id){
 		return $this->db->getwhere('categories',[ 'id' => $id ] );
 	}
}