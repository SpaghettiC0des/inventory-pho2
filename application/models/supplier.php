<?php defined('SYSPATH') or die('No direct script access.');
 
class Supplier_Model extends ORM {
 	
	protected $has_many = ['item']; 

	public function __construct()
	{
		parent::__construct();
	}
 	
 	public function insert($data){
 		$id = $this->db->insert('suppliers', $data)->inser_id();
 		return $this->getOne( $id );
 	}

    public function getOne($id){
        return $this->db->getwhere('suppliers',[ 'id' => $id ]);
    }
    
    public function getAll(){
        return $this->db->get('suppliers');
    }

 	

 	
}