<?php defined('SYSPATH') OR die('No direct access allowed.');

use Carbon\Carbon;

class Items_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
        $view = new View('items/index');
        $view->items = $this->item_model->with('category:supplier')->find_all();
        $this->template->content = $view;
    }


    public function save(){
        if(request::is_ajax() && request::method() == 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean( $this->input->post() );

            $this->item_model->insert( $post );

        }
    }

    public function handleUpload(){
        $this->auto_render = FALSE;
        echo $this->input->post();
    }
}