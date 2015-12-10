<?php
defined('SYSPATH') or die('No direct script access.');

class Supplier_Model extends ORM
{
    
    protected $has_many = array('items', 'purchases');
    
    public function insert($data) {
        $id = $this->db->insert('suppliers', $data)->inser_id();
        return $this->getOne($id);
    }
    
    public function getOne($id) {
        return $this->db->getwhere('suppliers', array('id' => $id));
    }
    
    public function getAll($isArray = FALSE) {
        return $this->db->get('suppliers')->result_array($isArray);
    }
    
    public function supplierStatistics($filter) {
        if ($filter) {
            if (is_array($filter)) {
                $start = $filter['start'];
                $end = $filter['end'];
                $query = @"SELECT s.name AS supplier_name, COUNT(p.supplier_id) AS item_count 
                    FROM vw_purchase_details p, suppliers s
                    WHERE s.created_at BETWEEN '$start' AND '$end'
                    AND p.supplier_id = s.id
                    GROUP BY p.supplier_id";
                
                return $this->db->query($query)->result_array();
            }
            
           $query = @"SELECT s.name AS supplier_name, COUNT(p.supplier_id) AS item_count 
                FROM vw_purchase_details p, suppliers s
                WHERE s.created_at LIKE '%$filter%'
                AND p.supplier_id = s.id
                GROUP BY p.supplier_id";

            return $this->db->query($query)->result_array();
        }

       $query = @"SELECT s.name AS supplier_name, COUNT(p.supplier_id) AS item_count 
            FROM vw_purchase_details p, suppliers s
            WHERE p.supplier_id = s.id
            GROUP BY p.supplier_id";

        return $this->db->query($query)->result_array();

    }
}
