<?php defined('SYSPATH') OR die('No direct access allowed.');

class Requests_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
        $index = new View('requests/index');
        $index->requests  = $this->request_model->with('office')->find_all();
        $this->template->content = $index;
    }

    public function save(){
        if(request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean( $this->input->post() );

            $this->request_model->insert( $post );
        }
    }
}