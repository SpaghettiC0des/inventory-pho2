<?php defined('SYSPATH') OR die('No direct access allowed.');

class Purchases_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function __construct(){
        parent::__construct();
        $this->auth = new Auth;
        $this->cache = Cache::instance();
        $this->session = Session::instance();
    }

    public function index(){
        $index = new View('purchases/index');
        $index->purchases  = $this->purchase_model->getAll();
        $this->template->content = $index;
    }

    public function save(){
        if(request::is_ajax() && request::method() === 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean( $this->input->post() );
				log_helper::add("1",$this->user_log,$this->user_id,"Added New Purchase");
            $this->purchase_model->insert( $post );
        }
    }
}