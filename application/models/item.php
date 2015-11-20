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
        return $this->db->update('items', $data, array('id'=>$id));
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
        return $this->db->getwhere('vw_all_items', array('quantity > ' => 0));
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
}
