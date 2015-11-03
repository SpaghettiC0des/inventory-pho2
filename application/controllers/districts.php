<?php defined('SYSPATH') OR die('No direct access allowed.');

class Districts_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function index(){
		$index = new View('districts/index');
		$index->districts = $this->district_model->find_all();
        $this->template->content = $index;
       # if(request::is_ajax() && request::method() === 'post')
    }

    public function save(){
    	if( request::is_ajax() && request::method() === 'post') {
    		$this->auto_render = FALSE;
    		$post = security::xss_clean( $this->input->post() );
    		$latest = json_helper::convert( $this->district_model->insert( $post ) );
            echo json_encode( $latest );
    	}
    }
}