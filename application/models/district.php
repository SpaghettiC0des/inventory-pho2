<?php defined('SYSPATH') or die('No direct script access.');
 
class District_Model extends ORM {
 	protected $has_many = array('offices');
 	
	public function insert($data){
		$id = $this->db->insert('districts', $data)->insert_id();
		return $this->getOne( $id );
	}

 	public function getAll($isArray = FALSE){
 		return $this->db->get('districts')->result_array($isArray);
 	}

 	public function getOne($id){
 		return $this->db->getwhere('districts',  array('id' => $id) )->result(TRUE);
 	}

    public function districtStatistics(){
        $query = @"SELECT d.name, COUNT(o.name) as offices FROM districts d, offices o
            where d.id = o.district_id
            GROUP BY d.id";

        return $this->db->query($query)->result_array();
    }
}