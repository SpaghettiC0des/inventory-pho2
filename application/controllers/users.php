<?php defined('SYSPATH') OR die('No direct access allowed.');

class Users_Controller extends Dashboard_Controller {

    const ALLOW_PRODUCTION = FALSE;

    public function __construct(){
        parent::__construct();
    }
    
    public function index() {
        return;
    }

    public function save(){
        if(request::is_ajax() AND request::method() === 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());

            
            // echo $this->auth->hash("admin").'<br />';
            // echo $this->auth->hash_password("admin");
            // die();
            $role = arr::remove('role',$post);
            foreach ($post as $key => $value) {
                $this->user_model->$key = $value;
            }
            $this->user_model->add( ORM::factory('role', 'login'));
            $this->user_model->add( ORM::factory('role', $role));
            
            	log_helper::add("1",$this->user_log,$this->user_id,"Added New ".$role." User.");
            $this->user_model->save();

        }
    }
}