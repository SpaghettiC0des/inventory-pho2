<?php defined('SYSPATH') OR die('No direct access allowed.');

class Purchases_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
        $index = new View('purchases/index');
        $index->purchases  = $this->purchase_model->with('supplier')->find_all();
        $this->template->content = $index;
    }

    public function save(){
        if(request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean( $this->input->post() );

            $this->purchase_model->insert( $post );
        }
    }
}