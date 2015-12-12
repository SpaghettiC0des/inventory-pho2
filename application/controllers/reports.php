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
        if (request::is_ajax()) {
            $this->auto_render = FALSE;
            
            $filter = security::xss_clean($this->input->post('filter')) or NULL;
            
            $items = $this->item_model->itemStatistics($filter);
            echo json_encode($items);
        }
    }
    
    public function getOnStockItemStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;

            $filter = security::xss_clean($this->input->post('filter')) or NULL;
            
            $items = $this->item_model->itemStatistics($filter,'iss.quantity > 0 AND iss.expiration_date >= CURRENT_DATE()');
            echo json_encode($items);
        }
    }
    
    public function getExpiredItemStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;
            
            $filter = security::xss_clean($this->input->post('filter')) or NULL;

            $items = $this->item_model->itemStatistics($filter,"iss.expiration_date <= CURRENT_DATE()");
            echo json_encode($items);
        }
    }
    
    public function getDistrictStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;
            
            $filter = security::xss_clean($this->input->post('filter')) or NULL;
            
            $districts = $this->district_model->districtStatistics($filter);
            echo json_encode($districts);
        }
    }
    
    public function getOfficeBudgetStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;
            
            $filter = security::xss_clean($this->input->post('filter')) or NULL;
            
            $budgets = $this->budget_model->officeBudgetStatistics($filter);
            echo json_encode($budgets);
        }
    }
    
    public function getCategoryStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;
            
            $filter = security::xss_clean($this->input->post('filter')) or NULL;
            
            $categories = $this->category_model->categoryStatistics($filter);
            echo json_encode($categories);
        }
    }
    
    public function getSupplierStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;
            
            $filter = security::xss_clean($this->input->post('filter')) or NULL;
            
            $suppliers = $this->supplier_model->supplierStatistics($filter);
            echo json_encode($suppliers);
        }
    }
    
    public function getPurchaseStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;

            $filter = security::xss_clean($this->input->post('filter')) or NULL;

            $purchases = $this->purchase_model->purchaseStatistics($filter);
            echo json_encode($purchases);
        }
    }
    
    public function getTransactionStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;

            $filter = security::xss_clean($this->input->post('filter')) or NULL;

            $transactions = $this->transaction_model->transactionStatistics($filter);
            echo json_encode($transactions);
        }
    }
    
    public function getRequestStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;

            $filter = security::xss_clean($this->input->post('filter')) or NULL;

            $requests = $this->request_model->requestStatistics($filter);
            echo json_encode($requests);
        }
    }
    
    public function getOfficeRequestStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;
            $auth = new Auth;
            $office_id = $auth->get_user()->office_id;
            echo json_encode($this->request_model->office_report($office_id));
        }
    }
    
    public function getUserStatistics() {
        if (request::is_ajax()) {
            $this->auto_render = FALSE;
            
            $filter = security::xss_clean($this->input->post('filter')) or NULL;
            
            echo json_encode($this->user_model->userStatistics($filter));
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
