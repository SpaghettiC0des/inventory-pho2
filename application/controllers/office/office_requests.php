<?php defined('SYSPATH') OR die('No direct access allowed.');

class Office_Requests_Controller extends Office_Base_Controller {

    public function index(){
        $index = new View('office/requests/index');
        $index->requests = $this->request_model->with('office')->where('office_id',$this->office_id)->find_all();
        $this->template->content = $index;
    }

    public function save(){
        if(request::is_ajax() AND request::method() === 'post'){
            $this->auto_render = FALSE;
            $office_id = Auth::instance()->get_user()->office_id;
            $post = security::xss_clean( $this->input->post() );
            $post['office_id'] = $office_id;
            $post['status'] = 'Received';
            $officeBudget = arr::remove('currentBudget',$post);

            if($post['status'] == 'Approved'){
                $this->budget_model->updateBudget($post['office_id'], $officeBudget);
                echo $this->request_model->insert( $post );
            }
			log_helper::add("1",$this->user_log,$this->user_id,"Requested a Budget");
            $this->request_model->insert( $post );
        }
    }
}