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
            $post = $this->input->post();

            $this->user_model->username = $post['username'];
            $this->user_model->email = $post['email'];
            $pass = $this->user_model->password = $post['password'];
            echo $this->auth->hash($pass);
            echo $this->auth->hash_password($pass);
            die();
            $this->user_model->add( ORM::factory('role', 'login') );
            #$this->user_model->add( ORM::factory('role', 'admin') );
            $this->user_model->save();

        }
    }
}