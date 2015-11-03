<?php defined('SYSPATH') OR die('No direct access allowed.');

class Office_Budgets_Controller extends Dashboard_Controller {

    public function index() {
        $index = new View('office-budgets/index');
        $index->budgets = $this->budget_model->with('office')->find_all();

        $this->template->content = $index;
    }

    public function save(){
        if(request::is_ajax() AND request::method() === 'post'){
            $this->auto_render = FALSE;

            $post = security::xss_clean($this->input->post());

            if($this->budget_model->insert($post)){
                echo 1;
            }
        }
    
    }
}