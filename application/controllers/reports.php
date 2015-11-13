<?php defined('SYSPATH') OR die('No direct access allowed.');

class Reports_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
        $index = new View('reports/index');
        //$index->requests  = $this->request_model->with('office')->find_all();
        $this->template->content = $index;
    }

    public function getBudget($office_id){
        if(request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;

            $budget = $this->budget_model->getOne($office_id)->as_array();
            echo json_encode($budget);
        }
    }

    public function getData($id){
        if(request::is_ajax() && request::method() === 'get'){
            $this->auto_render = FALSE;

            $requestData[] = $this->request_model->find($id)->as_array();
            echo json_encode($requestData);
       }
    }
    public function save(){
        if(request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean( $this->input->post() );

            if($post['status'] == 'Approved'){
                echo (float)$post['grand_total'];
            }
            // $this->request_model->insert( $post );
        }
    }
	
	public function get_purchases()
	{
		  if(request::is_ajax() && request::method() === 'get'){
            $this->auto_render = FALSE;
			$more_total = array();
			$more_supp_name = array();

			$suppliers = $this->supplier_model->find_all();

			foreach($suppliers as $supplier){
			    $purchaseData = $this->purchase_model->where('supplier_id',$supplier->id)->find_all();
			    $total = 0;
			foreach($purchaseData as $purchases){
				$total += $purchases->grand_total;
			}
				array_push($more_total,$total);
				array_push($more_supp_name,$supplier->name);
			}
			
			$arrays = array($more_supp_name,$more_total);
			//print_r(json_encode($arrays));exit;
			 echo json_encode($arrays);
			}
		}
}