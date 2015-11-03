<?php defined('SYSPATH') OR die('No direct access allowed.');

class Settings_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function __construct(){
        parent::__construct();
    }
    
    public function index() {
        return;
    }

}