<?php defined('SYSPATH') or die('No direct script access.');
 
class Item_Stock_Model extends ORM {
    protected $has_many = ['item','supplier'];
}