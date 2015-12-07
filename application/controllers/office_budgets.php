<?php
defined('SYSPATH') OR die('No direct access allowed.');

class Office_Budgets_Controller extends Dashboard_Controller
{
    
    public function index() {
        $index = new View('office-budgets/index');
        $index->header = 'All Office Budgets';
        $index->budgets = $this->budget_model->with('office')->find_all();
        
        $this->template->content = $index;
    }
    
    public function approvedBudgets() {
        $index = new View('office-budgets/index');
        $index->header = 'All Approved Budgets';
        $index->budgets = $this->budget_model->with('office')->where('status',1)->find_all();
        
        $this->template->content = $index;
    }
    
    public function pendingBudgets() {
        $index = new View('office-budgets/pending');
        $index->budgets = $this->budget_model->with('office')->where('status !=',1)->find_all();
        
        $this->template->content = $index;
    }

    public function getBudget($id) {
        if (request::is_ajax() AND request::method() === 'get') {
            $this->auto_render = FALSE;
            echo json_encode($this->budget_model->find($id)->as_array());
        }
    }
    
    public function hasBudgetRecord($officeID) {
        if (request::is_ajax() AND request::method() === 'post') {
            $this->auto_render = FALSE;
            $record = $this->budget_model->find($officeID);
            echo $record;
        }
    }
    
    public function save() {
        if (request::is_ajax() AND request::method() === 'post') {
            $this->auto_render = FALSE;
            
            $post = security::xss_clean($this->input->post());
            
            if ($this->budget_model->insert($post)) {
                log_helper::add("2", $this->user_log, $this->user_id, "Added New Office Budget.");
                echo "1";
            }
        }
    }
    
    public function update($id) {
        if (request::is_ajax() AND request::method() === 'post') {
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());
            
            $officeBudget = $this->budget_model->find($id);
            foreach ($post as $key => $value) {
                $officeBudget->$key = $value;
            }
            log_helper::add("2", $this->user_log, $this->user_id, "Updated a Office Budget.");
            echo $officeBudget->save();
        }
    }
    
    public function delete($id) {
        if (request::is_ajax() AND request::method() === 'post') {
            $this->auto_render = FALSE;
            $officeBudget = $this->budget_model->with('office')->find($id);
            log_helper::add("2", $this->user_log, $this->user_id, "Deleted a Office Budget for " . $officeBudget->office->name . ".");
            echo $this->budget_model->delete($id);
        }
    }
    
    public function reports() {
        $this->template->content = new View('office-budgets/report');
    }
}
