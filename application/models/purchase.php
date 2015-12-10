<?php
defined('SYSPATH') or die('No direct script access.');

class Purchase_Model extends ORM
{
    protected $belongs_to = array('supplier');
    protected $has_many = array('item_stocks');
    
    public function insert($data) {
        $id = $this->db->insert('purchases', $data);
        return $this->getOne($id);
    }
    
    public function getOne($id) {
        return $this->getwhere('purchases', array('id', $id));
    }
    
    public function getPurchaseDetails($id) {
        return $this->db->from('vw_purchase_details')->where('purchase_id', $id)->get()->result_array();
    }
    
    public function get_sum_purchases($monthFrom, $monthTo, $year, $supplier_id) {
        $query = "SELECT SUM(grand_total) AS total
            FROM purchases
            WHERE month >= $monthFrom
            AND month <= $monthTo
            AND year = $year
            AND supplier_id = $supplier_id
            GROUP BY supplier_id";
        
        //print_r($query);exit;
        $result = $this->db->query($query);
        return $result;
    }
    
    public function reports() {
        $q = @"SELECT p.status, COUNT(p.status) AS status_count FROM purchases p
            GROUP BY p.status";
        
        return $this->db->query($q)->result_array();
    }
    
    public function purchaseStatistics($filter) {
        if ($filter) {
            if (is_array($filter)) {
                $start = $filter['start'];
                $end = $filter['end'];
                $query = @"SELECT p.status, COUNT(p.status) AS status_count FROM purchases p
                            WHERE p.created_at BETWEEN '$start' AND '$end'
                            GROUP BY p.status";
                
                return $this->db->query($query)->result_array();
            }
            
            $query = @"SELECT p.status, COUNT(p.status) AS status_count FROM purchases p
                        WHERE p.created_at LIKE '%$filter%'
                        GROUP BY p.status";
            
            return $this->db->query($query)->result_array();
        }
        
        $q = @"SELECT p.status, COUNT(p.status) AS status_count FROM purchases p
            GROUP BY p.status";
                
        return $this->db->query($q)->result_array();
    }
}
