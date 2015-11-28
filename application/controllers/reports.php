<?php
defined('SYSPATH') OR die('No direct access allowed.');

class Reports_Controller extends Controller
{
    
    public function index() {
        $index = new View('reports/index');
        
        //$index->requests  = $this->request_model->with('office')->find_all();
        $this->template->content = $index;
    }
    
    public function getItemStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;
            
            $this->auto_render = FALSE;
            $items = $this->item_model->with('item_stocks')->find_all();
            $arr = array();
            foreach ($items as $key) {
                if ($key->item_stocks[0]) {
                    array_push($arr, array("item" => $key->name, "quantity" => $key->item_stocks[0]->quantity, "color" => "#03A9F4"));
                } 
                else {
                    
                    array_push($arr, array("item" => $key->name, "quantity" => 0, "color" => "#8BC34A"));
                }
            }
            echo json_encode($arr);
        }
    }
    
    public function getOnStockItemStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;
            
            echo json_encode($this->item_model->getAllOnStock()->result_array());
        }
    }
    
    public function getExpiredItemStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;
            
            echo json_encode($this->item_model->getAllExpired()->result_array());
        }
    }
    
    public function getDistrictStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;

            $filter = security::xss_clean($this->input->post('filter'));

            if(isset($filter)){
                if(is_array($filter)){
                    $districts = $this->district_model->districtStatistics($filter);
                    echo json_encode($districts);
                    return;
                }

                $districts = $this->district_model->districtStatistics($filter);
                echo json_encode($districts);
                return;
            }
            $districts = $this->district_model->districtStatistics();
            echo json_encode($districts);   
        }
    }
    
    public function getOfficeBudgetStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;
            
            $budgets = $this->budget_model->with('office')->find_all();
            $arr = array();
            foreach ($budgets as $budget) {
                array_push($arr, array('office_name' => $budget->office->name, 'budget' => $budget->amount_given,));
            }
            
            echo json_encode($arr);
        }
    }
    
    public function getCategoryStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;
            echo json_encode($this->category_model->reports());
        }
    }
    
    public function getSupplierStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;
            echo json_encode($this->supplier_model->reports());
        }
    }
    
    public function getPurchaseStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;
            echo json_encode($this->purchase_model->reports());
        }
    }
    
    public function getTransactionStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;
            echo json_encode($this->transaction_model->report());
        }
    }
    
    public function getRequestStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;
            echo json_encode($this->request_model->report());
        }
    }
    
    public function getUserStatistics() {
        if (request::is_ajax() ) {
            $this->auto_render = FALSE;
            
            $q = @"SELECT r.name as role, COUNT(ru.role_id) as role_count FROM users u, roles_users ru, roles r
                WHERE ru.role_id != 1
                AND u.id = ru.user_id
                AND ru.role_id = r.id
                GROUP BY ru.role_id";

            echo json_encode($this->db->query($q)->result_array());
        }
    }
    
    public function getData($id) {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            
            $requestData[] = $this->request_model->find($id)->as_array();
            echo json_encode($requestData);
        }
    }
    
    public function get_purchases() {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $more_total = array();
            $more_supp_name = array();
            $post = security::xss_clean($this->input->post());
            $monthFrom = date("n", strtotime($post['monthFrom']));
            $monthTo = date("n", strtotime($post['monthTo']));
            $year = $post['year'];
            $suppliers = $this->supplier_model->find_all();
            
            foreach ($suppliers as $supplier) {
                $purchaseData = $this->purchase_model->get_sum_purchases($monthFrom, $monthTo, $year, $supplier->id)->current();
                if (!empty($purchaseData->total)) {
                    $total = round($purchaseData->total, 2);
                } 
                else {
                    $total = 0;
                }
                
                // $total = 0;
                // foreach($purchaseData as $purchases){
                // $total += $purchases->grand_total;
                // }
                array_push($more_total, $total);
                array_push($more_supp_name, $supplier->name);
            }
            
            $arrays = array($more_supp_name, $more_total);
            
            //print_r(json_encode($arrays));exit;
            echo json_encode($arrays);
        }
    }
    
    public function get_expired_item_notification($notiftype, $notifdate) {
        
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $currentDate = date("Y-m-d");
            if ($notiftype == "byDay") {
                $date = "+" . $notifdate . " days";
                $expiration_date = date("Y-m-d", strtotime($date));
                
                //  $expiration_date = $notifdate." days";
                
                
            } 
            elseif ($notiftype == "byWeek") {
                $date = "+" . $notifdate . " weeks";
                $expiration_date = date("Y-m-d", strtotime($date));
                
                //  $expiration_date = $notifdate." weeks";
                
                
            } 
            else {
                $date = "+" . $notifdate . " months";
                $expiration_date = date("Y-m-d", strtotime($date));
                
                //$expiration_date = $notifdate." months";
                
                
            }
            
            $notifications = $this->item_model->get_expiring_item($expiration_date);
            echo json_encode($notifications);
        }
    }
}
