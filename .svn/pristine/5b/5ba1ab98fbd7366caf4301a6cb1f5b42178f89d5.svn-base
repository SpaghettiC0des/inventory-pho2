<?php defined('SYSPATH') OR die('No direct access allowed.');

class Districts_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function __construct(){
        parent::__construct();
        $this->auth = new Auth;
        $this->session = Session::instance();
        $this->cache = Cache::instance();
    }

    public function index(){
		$index = new View('districts/index');
		$index->districts = $this->district_model->getAll();
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