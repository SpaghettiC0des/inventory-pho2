<?php defined('SYSPATH') or die('No direct script access.');
 
class District_Model extends ORM {
 	protected $has_many = ['office'];

	public function __construct()
	{
		parent::__construct();
	}
 	
	public function insert($data){
		$id = $this->db->insert('districts', $data)->insert_id();
		return $this->getOne( $id );
	}

 	public function getAll(){
 		return $this->db->get('districts');
 	}

 	public function getOne($id){
 		return $this->db->getwhere('districts', [ 'id' => $id ])->result(TRUE);
 	}
}