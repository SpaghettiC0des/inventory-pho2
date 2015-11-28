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
    
    public function reports() {
        $q = @"SELECT s.name AS supplier_name, COUNT(p.supplier_id) AS item_count 
            FROM vw_purchase_details p, suppliers s
            WHERE p.supplier_id = s.id
            GROUP BY p.supplier_id";

        return $this->db->query($q)->result_array();
    }
}
