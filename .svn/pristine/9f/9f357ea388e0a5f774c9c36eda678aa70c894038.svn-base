<?php defined('SYSPATH') OR die('No direct access allowed.');

class Profile_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
		$index = new View('profile/index');
       $index->offices = $this->office_model->with('district')->find_all();
       $this->template->content = $index;
    }

    public function save(){
        if(request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean( $this->input->post() );

            $this->office_model->insert( $post );
        }
    }

    public function delete($id){
        if(request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;

            echo $this->office_model->delete($id);
        }
    }
}