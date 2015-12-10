<?php
defined('SYSPATH') or die('No direct script access.');

class Request_Model extends ORM
{
    protected $belongs_to = array('office');
    
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
        return $this->db->select('id as request_id, office_id, reference_no, grand_total')->from('requests')->where('grand_total >', 0)->get()->result_array();
    }
    
    public function getCurrentOfficeRequests() {
        $id = Auth::instance()->get_user()->office_id;
        return $this->db->getwhere('requests', array('office_id' => $id));
    }
    
    public function report() {
        $q = @"SELECT r.status, COUNT(r.status) AS status_count FROM requests r
            GROUP BY r.status";

        return $this->db->query($q)->result_array();
    }

    public function requestStatistics($filter){
        if($filter){
            if(is_array($filter)){
                $start = $filter['start'];
                $end = $filter['end'];

                $q = @"SELECT r.status, COUNT(r.status) AS status_count FROM requests r
                    WHERE r.created_at BETWEEN $start AND $end
                    GROUP BY r.status"; 

                return $this->db->query($q)->result_array();
            }

            $q = @"SELECT r.status, COUNT(r.status) AS status_count FROM requests r
                WHERE r.created_at LIKE '%$filter%'
                GROUP BY r.status"; 

            return $this->db->query($q)->result_array();
        }


       $q = @"SELECT r.status, COUNT(r.status) AS status_count FROM requests r
           GROUP BY r.status"; 

        return $this->db->query($q)->result_array();
    }

    public function office_report($office_id){
        $q = @"SELECT r.status, COUNT(r.status) AS status_count FROM requests r
            WHERE r.office_id = $office_id
            GROUP BY r.status";

        return $this->db->query($q)->result_array();
    }
}
