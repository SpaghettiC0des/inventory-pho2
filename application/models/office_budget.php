<?php defined('SYSPATH') or die('No direct script access.');
 
class Office_Budget_Model extends ORM {
    protected  $belongs_to = array('office');

    public function insert($data){
        $id = $this->db->insert('office_budgets', $data)->insert_id();
        return $this->getOne($id);
    }

    public function getAll(){
        return $this->db->get('office_budgets');
    }

    public function getOne($office_id){
        return $this->db->getwhere('office_budgets', array('office_id'=>$office_id));
    }
    public function updateBudget($office_id, $amount){
        return $this->db->update('office_budgets', array('amount_left'=>$amount),array('office_id'=>$office_id));
    }
}