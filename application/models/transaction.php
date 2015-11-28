<?php defined('SYSPATH') or die('No direct script access.');
 
class Transaction_Model extends ORM {
    protected $belongs_to = array('office');

    public function insert($data){
        $id = $this->db->insert('transactions',$data)->insert_id();
        return $this->getOne($id);
    }

    public function getAll($isArray = FALSE){
        return $this->db->get('transactions')->result_array($isArray);
    }

    public function getOne($id){
        return $this->getwhere( 'transactions', array( 'id' => $id ) )->result( TRUE );
    }

    public function report(){
        $q = @"SELECT t.status, COUNT(t.status) AS status_count FROM transactions t
            GROUP BY t.status";

        return $this->db->query($q)->result_array();
    }   
}