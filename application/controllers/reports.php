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
        if (request::is_ajax() AND request::method() == 'get') {
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
            echo json_encode($arr, JSON_PRETTY_PRINT);
        }
    }
    
    public function getDistrictStatistics() {
        if(request::is_ajax() AND request::method() == 'get'){
            $this->auto_render = FALSE;
            $districts = $this->district_model->districtStatistics();

            echo json_encode($districts);
        }
    }
    
    public function getOfficeBudgetStatistics(){
        if(request::is_ajax() AND request::method() == 'get'){
            $this->auto_render = FALSE;
            
            $budgets = $this->budget_model->with('office')->find_all();
            $arr = array();
            foreach ($budgets as $budget) {
                array_push($arr, array(
                    'office_name' => $budget->office->name,
                    'budget' => $budget->amount_given,
                ));
            }

            echo json_encode($arr);
        }
    }

    public function getBudget($office_id) {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            
            $budget = $this->budget_model->getOne($office_id)->as_array();
            echo json_encode($budget);
        }
    }
    
    public function getData($id) {
        if (request::is_ajax() && request::method() === 'get') {
            $this->auto_render = FALSE;
            
            $requestData[] = $this->request_model->find($id)->as_array();
            echo json_encode($requestData);
        }
    }
    public function save() {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());
            
            if ($post['status'] == 'Approved') {
                echo (float)$post['grand_total'];
            }
            
            // $this->request_model->insert( $post );
            
            
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
}
