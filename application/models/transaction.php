<?php defined('SYSPATH') or die('No direct script access.');
 
class Transaction_Model extends ORM {
    protected $belongs_to = array('office');

    public function insert($data){
        $id = $this->db->insert('transactions',$data)->insert_id();
        return $this->getOne($id);
    }

    public function getAll($isArray = FALSE){
        return $this->db->get('transactions')->result_array($isArray);
    }

    public function getOne($id){
        return $this->getwhere( 'transactions', array( 'id' => $id ) )->result( TRUE );
    }

    public function getTransactionTotal($id){
        $q = @"SELECT SUM(amount_paid) AS sum FROM transactions
            WHERE office_id = $id";

        return $this->db->query($q);
    }
    public function report(){
        $q = @"SELECT t.status, COUNT(t.status) AS status_count FROM transactions t
            GROUP BY t.status";

        return $this->db->query($q)->result_array();
    }   

    public function transactionStatistics($filter){
        if($filter){
            if(is_array($filter)){
                $start = $filter['start'];
                $end = $filter['end'];

                $q = @"SELECT t.status, COUNT(t.status) AS status_count FROM transactions t
                    WHERE t.created_at BETWEEN $start AND $end
                    GROUP BY t.status";

                return $this->db->query($q)->result_array();
            }

            $q = @"SELECT t.status, COUNT(t.status) AS status_count FROM transactions t
                WHERE t.created_at LIKE '%$filter%'
                GROUP BY t.status";

            return $this->db->query($q)->result_array();
        }

        $q = @"SELECT t.status, COUNT(t.status) AS status_count FROM transactions t
            GROUP BY t.status";

        return $this->db->query($q)->result_array();
    }
}