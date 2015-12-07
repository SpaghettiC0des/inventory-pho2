<?php
defined('SYSPATH') or die('No direct script access.');

class Office_Budget_Model extends ORM
{
    protected $belongs_to = array('office');
    
    public function insert($data) {
        $id = $this->db->insert('office_budgets', $data)->insert_id();
        return $this->getOne($id);
    }
    
    public function getAll() {
        return $this->db->get('office_budgets');
    }
    
    public function getOne($office_id) {
        return $this->db->getwhere('office_budgets', array('status' => 1, 'office_id' => $office_id))->result_array();
    }
    
    public function updateBudget($office_id, $amount) {
        return $this->db->update('office_budgets', array('amount_left' => $amount), array('office_id' => $office_id));
    }
    
    public function officeBudgetStatistics($filter) {
        if ($filter) {
            if (is_array($filter)) {
                $start = $filter['start'];
                $end = $filter['end'];
                $query = @"SELECT o.name AS office_name, ob.amount_left AS budget FROM offices o, office_budgets ob
                        WHERE ob.created_at BETWEEN '$start' AND '$end'
                        AND ob.id = o.id
                        GROUP BY ob.id";
                
                return $this->db->query($query)->result_array();
            }
            
            $query = @"SELECT o.name AS office_name, ob.amount_left AS budget FROM offices o, office_budgets ob
                    WHERE ob.created_at LIKE '%$filter%'
                    AND ob.id = o.id
                    GROUP BY ob.id";
            
            return $this->db->query($query)->result_array();
        }
        
        $query = @"SELECT o.name AS office_name, ob.amount_left AS budget FROM offices o, office_budgets ob
                WHERE ob.id = o.id";
        
        return $this->db->query($query)->result_array();
    }
}
