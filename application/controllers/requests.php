<?php
defined('SYSPATH') OR die('No direct access allowed.');

class Requests_Controller extends Dashboard_Controller
{
    
    const ALLOW_PRODUCTION = FALSE;
    
    public function index() {
        $index = new View('requests/index');
        $index->requests = $this->request_model->with('office')->find_all();
        $this->template->content = $index;
    }
    
    public function getBudget($office_id) {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            
            $budget = $this->budget_model->getOne($office_id);
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
            $officeBudget = arr::remove('currentBudget', $post);
            
            if ($post['status'] == 'Approved') {
                $this->budget_model->updateBudget($post['office_id'], $officeBudget);
                echo $this->request_model->insert($post);
            }
            $this->request_model->insert($post);
            log_helper::add("1", $this->user_log, $this->user_id, "Added New Request");
        }
    }
    
    public function delete($id) {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $request = $this->request_model->find($id);
            log_helper::add("1", $this->user_log, $this->user_id, "Request deleted with reference no. " . $request->reference_no . ".");
            echo $this->request_model->delete($id);
        }
    }

    public function reports(){
        $this->template->content = new View('requests/report');
    }
}
