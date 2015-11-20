<?php defined('SYSPATH') or die('No direct script access.');
 
class Purchase_Model extends ORM {
 	protected $belongs_to = array('supplier');
    protected $has_many = array('item_stocks');

 	public function insert($data){
 		$id = $this->db->insert('purchases', $data);
 		return $this->getOne($id);
 	}

    public function getOne($id){
        return $this->getwhere('purchases', array('id', $id));
    }

 	public function getPurchaseDetails($id){
 		return $this->db->from('vw_purchase_details')->where('purchase_id', $id)->get()->result_array();
 	}
	
	public function get_sum_purchases($monthFrom,$monthTo,$year,$supplier_id)
	{
	$query = "SELECT SUM(grand_total) AS total
FROM purchases
WHERE month >= $monthFrom
 AND month <= $monthTo
 AND year = $year
 AND supplier_id = $supplier_id
 GROUP BY supplier_id
";  
	//print_r($query);exit;
		$result = $this->db->query($query);
		return $result;
	}

 }