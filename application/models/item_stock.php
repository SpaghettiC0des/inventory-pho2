<?php defined('SYSPATH') or die('No direct script access.');
 
class Item_Stock_Model extends ORM {
    protected $belongs_to = ['item','purchase'];

    public function insert($data){
        $this->db->insert('item_stocks', $data);
    }
}