<?php
defined('SYSPATH') or die('No direct script access.');

class Item_Model extends ORM
{
    
    protected $belongs_to = array('category', 'supplier');
    protected $has_many = array('item_stocks');
    
    public function insert($data) {
        $id = $this->db->insert('items', $data)->insert_id();
        return $this->getOne($id);
    }
    
    public function update($data, $id) {
        return $this->db->update('items', $data, array('id' => $id));
    }
    public function getOne($id) {
        return $this->db->getwhere('items', array('id' => $id));
    }
    
    public function getAll() {
        $q = @"SELECT reference_no,item_name, code, expiration_date, SUM(quantity) AS quantity 
                FROM vw_all_items GROUP BY expiration_date";
        return $this->db->query($q);
    }
    
    public function getAllOnStock() {
        return $this->db->groupby('reference_no')->getwhere('vw_all_items', array('quantity > ' => 0));
    }
    
    public function getAllOutOfStock() {
        return $this->db->getwhere('vw_all_items', array('quantity =' => 0));
    }
    
    public function getAllExpired() {
        return $this->db->getwhere('vw_all_items', array('expiration_date <=' => date('Y-m-d')));
    }
    
    public function getNewlyAdded() {
        return $this->db->get('items');
    }
    
    public function get_expiring_item($condition) {
        return $this->db->orderby('expiration_date', 'ASC')->getwhere('vw_all_items', array('expiration_date >=' => date('Y-m-d'), 'expiration_date <=' => $condition))->result_array();
        
        //$q = @"SELECT vw_all_items.* FROM vw_all_items WHERE expiration_date >= $fromdate AND expiration_date <= $todate ORDER BY expiration_date ASC";
        
        //return $this->db->query($q);
        
        
    }

    public function itemStatistics($filter, $condition = TRUE){
        if($filter){
            if(is_array($filter)){
                $start = $filter['start'];
                $end = $filter['end'];

                $query = @"SELECT i.name AS item, IF(iss.quantity > 0,iss.quantity, 0) AS quantity, IF(iss.quantity > 0,'#03A9F4', '#8BC34A') AS color FROM items i
                    LEFT JOIN item_stocks iss ON i.id = iss.item_id
                    WHERE i.created_at BETWEEN '$start' AND '$end'
                    
                    AND $condition
                    GROUP BY i.id";

                return $this->db->query($query)->result_array();
            }

            $query = @"SELECT i.name AS item, IF(iss.quantity > 0,iss.quantity, 0) AS quantity, IF(iss.quantity > 0,'#03A9F4', '#8BC34A') AS color FROM items i
                LEFT JOIN item_stocks iss ON i.id = iss.item_id
                WHERE i.created_at LIKE '%$filter%'
                AND $condition
                GROUP BY i.id";

            return $this->db->query($query)->result_array();
        }

        $query = @"SELECT i.name AS item, IF(iss.quantity > 0,iss.quantity, 0) AS quantity, IF(iss.quantity > 0,'#03A9F4', '#8BC34A') AS color FROM items i
            LEFT JOIN item_stocks iss ON i.id = iss.item_id
            WHERE $condition
            GROUP BY i.id";
        return $this->db->query($query)->result_array();
    }
}
