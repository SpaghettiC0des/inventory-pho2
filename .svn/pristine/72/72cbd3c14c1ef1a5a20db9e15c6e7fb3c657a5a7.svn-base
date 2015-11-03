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
        $suppliers = json_helper::convert( $this->supplier_model->getAll() );
        $categories = json_helper::convert( $this->category_model->getAll() );
        $items = json_helper::convert( $this->item_model->getAll() );
        $districts = json_helper::convert( $this->district_model->getAll() );
        $offices = json_helper::convert( $this->office_model->find_all() );

        echo json_encode(compact('suppliers', 'categories', 'items', 'districts')) ;
    }

}
