<?php defined('SYSPATH') or die('No direct script access.');
 
class Purchase_Model extends ORM {
 	protected $belongs_to = ['supplier'];

 	public function insert($data){
 		$id = $this->db->insert('purchases', $data);
 		return $this->db->getOne($id);
 	}

 	public function getAll(){
 		return $this->db->get('purchases');
 	}

 	public function getOne($id){
 		return $this->getwhere('purchases', ['id', ]);
 	}
 }