<?php defined('SYSPATH') or die('No direct script access.');
 
class Item_Model extends ORM {
 	
	protected $belongs_to = ['category','supplier']; 
	
	public function __construct(){
		parent::__construct();
	}

	public function insert($data){
		$id = $this->db->insert('items', $data)->insert_id();
		return $this->getOne( $id );
	}

	public function getOne($id){
		return $this->db->getwhere('items',['id' => $id]);
	}
 	
 	public function getAll(){
 		return $this->db->get('items');
 	}
}