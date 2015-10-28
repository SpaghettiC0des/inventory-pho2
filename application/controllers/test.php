<?php defined('SYSPATH') OR die('No direct access allowed.');

class Test_Controller extends Template_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public $template = 'test';

    public function __construct(){
        parent::__construct();
        $this->auth = new Auth;
        $this->cache = Cache::instance();
        $this->session = Session::instance();
        
        if (!$this->auth->logged_in()){
            $this->session->set("requested_url","/".url::current()); 
            url::redirect('/auth');
        }
    }

    public function index(){
		$index = new View('test/index');
        #$index->test_data = $this->items_model->getAll();
        $this->template->content = $index;
    }
}