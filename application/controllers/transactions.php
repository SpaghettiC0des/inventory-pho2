<?php defined('SYSPATH') OR die('No direct access allowed.');

class Transactions_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;
 
    public function index() {
        $index = new View('transactions/index');
        $index->header = 'All Transactions';
        $index->transactions = $this->transaction_model->with('office')->find_all();
        $this->template->content = $index;
    }

    public function allPartial(){
        $index = new View('transactions/index');
        $index->header = 'All Partials';
        $index->transactions = $this->transaction_model->with('office')->where('status','Partial')->find_all();
        $this->template->content = $index;
    }

    public function allPaid(){
        $index = new View('transactions/index');
        $index->header = 'All Paid';
        $index->transactions = $this->transaction_model->with('office')->where('status','Paid')->find_all();
        $this->template->content = $index;
    }
    public function save(){
        if(request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());

            foreach ($post as $key => $value) {
                $this->transaction_model->$key = $value;
            }
		    log_helper::add("1",$this->user_log,$this->user_id,"Added New Transaction.");
            echo $this->transaction_model->save();
        }
    }
}