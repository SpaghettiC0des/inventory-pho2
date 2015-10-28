<?php defined('SYSPATH') OR die('No direct access allowed.');

class Requests_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function __construct(){
        parent::__construct();
    }
    
    public function index() {
        $index = new View('requests/index');
        $index->requests = $this->request_model->getAll();
        $this->template->content = $index;
    }
}