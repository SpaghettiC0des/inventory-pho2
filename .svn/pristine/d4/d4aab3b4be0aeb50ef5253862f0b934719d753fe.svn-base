<?php defined('SYSPATH') or die('No direct script access.');
 
class Transaction_Model extends ORM {
    #protected  = [''];

    public function __construct(){
        parent::__construct();
    }

    public function insert($data){
        $id = $this->db->insert('transactions',$data)->insert_id();
        return $this->getOne($id);
    }

    public function getAll(){
        return $this->db->get('transactions');
    }

    public function getOne($id){
        return $this->getwhere( 'transactions', [ 'id' => $id ] )->result( TRUE );
    }
}