<?php defined('SYSPATH') or die('No direct script access.');
 
class Request_Model extends ORM {
    #protected  = [''];

    public function __construct(){
        parent::__construct();
    }

    public function insert($data){
        $id = $this->db->insert('requests',$data)->insert_id();
        return $this->getOne($id);
    }

    public function getAll(){
        return $this->db->get('requests');
    }

    public function getOne($id){
        return $this->getwhere( 'requests', [ 'id' => $id ] )->result( TRUE );
    }
}