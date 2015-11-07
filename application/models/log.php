<?php defined('SYSPATH') or die('No direct script access.');
 
class Log_Model extends ORM {
 	//protected $belongs_to = array('supplier');
   // protected $has_many = array('item_stocks');

 	public function insert($data){
 		$id = $this->db->insert('logs', $data);
		return $id->insert_id();
		//print_r($id);exit;
 		//return $this->getOne($id);
 	}

 	public function getPurchaseDetails($id){
 		return $this->db->from('vw_purchase_details')->where('purchase_id', $id)->get()->result_array();
 	}
    
 	public function getOne($id){
 		return $this->getwhere('logs', array('id', $id));
 	}
 }
 