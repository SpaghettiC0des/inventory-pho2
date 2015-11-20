<?php
defined('SYSPATH') or die('No direct script access.');

class Report_Model extends ORM
{
    
    public function insert($data) {
        $id = $this->db->insert('requests', $data)->insert_id();
        return $this->getOne($id);
    }
    
    public function getAll() {
        return $this->db->get('requests');
    }
    
    public function getOne($id) {
        return $this->getwhere('requests', array('id' => $id));
    }
    
    public function getReferenceNumbers() {
        return $this->db->select('id as request_id, office_id, reference_no, grand_total')->from('requests')->get()->result_array();
    }
    
    public function get_sum_purchases($monthFrom, $monthTo, $year, $supplier_id) {
        $query = @"SELECT `purchases`.*
             SUM (grand_total) as purchasesTotal
             FROM (`purchases`)
             WHERE month >= $monthFrom
             AND month <= $monthTo
             AND year = $year
             AND supplier_id = $supplier_id
            ";
        return $this->db->query($query);
    }
}
