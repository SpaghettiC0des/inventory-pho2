<?php defined('SYSPATH') or die('No direct script access.');
 
class Office_Model extends ORM {
 	protected $belongs_to = ['district'];
    protected $has_many = ['requests','office_budgets'];
    
 	public function insert($data){
 		$id = $this->db->insert('offices', $data)->insert_id();
 		return $this->getOne($id);
 	}

 	public function getAll($isArray = FALSE){
 		return $this->db->get('offices')->result_array($isArray);
 	}

 	public function getOne($id){
 		return $this->db->getwhere('offices', ['id'=>$id]);
 	}
}