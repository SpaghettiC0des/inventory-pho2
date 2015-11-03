<?php defined('SYSPATH') or die('No direct script access.');
 
class Office_Budget_Model extends ORM {
    protected  $belongs_to = ['office'];

    public function insert($data){
        $id = $this->db->insert('office_budgets', $data)->insert_id();
        return $this->getOne($id);
    }

    public function getAll(){
        return $this->db->get('office_budgets');
    }

    public function getOne($id){
        return $this->db->getwhere('office_budgets', ['id'=>$id]);
    }
}