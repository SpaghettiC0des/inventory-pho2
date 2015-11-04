<?php defined('SYSPATH') OR die('No direct access allowed.');

use Carbon\Carbon;

class Ajax_Source_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public $auto_render = FALSE;
    public function __construct(){
        parent::__construct();
        $this->auth = new Auth;
        $this->cache = Cache::instance();
    }

    public function index(){
        $suppliers = $this->supplier_model->getAll(TRUE);
        $categories = $this->category_model->getAll(TRUE);
        $items = $this->item_model->getAll(TRUE);
        $districts = $this->district_model->getAll(TRUE);
        $offices = $this->office_model->getAll(TRUE);
        
        echo json_encode(compact('suppliers', 'categories', 'items', 'districts','offices')) ;
    }

}
