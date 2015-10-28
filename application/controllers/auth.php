<?php defined('SYSPATH') OR die('No direct access allowed.');

use Carbon\Carbon;

class Auth_Controller extends Template_Controller {

    const ALLOW_PRODUCTION = FALSE;

    // Set the name of the template to use
    public $template = 'templates/_login_template';

    public function __construct(){
        parent::__construct();

        $this->session = Session::instance();
        $this->cache = Cache::instance();
        $this->auth = new Auth;

        if ($this->auth->logged_in()){
            #$this->session->set("requested_url","/".url::current()); // this will redirect from the login page back to this page/
            url::redirect('/dashboard');
        }
    }

    public function index()
    {
        $requested_url = $this->session->get('requested_url');
        $this->template->content = new View('login/login_view');
        $user = ORM::factory('user');
        
        if($_POST){
            $remember = FALSE;
            $credentials = security::xss_clean( $this->input->post() );
            
            if( $user->username_exists( $credentials['username'] ) ){
               if( isset($credentials['remember'])){
                    $remember = TRUE;
                }
                if($this->auth->login( $credentials['username'], $credentials['password'], $remember )){
                    if( isset($requested_url )){
                        url::redirect( $requested_url );
                    }
                    url::redirect('/dashboard');

                }else{
                    $this->session->set_flash('error','Username/Password incorrect.');
                    url::redirect('/auth');
                }

            }else {
                $this->session->set_flash('error','Username does not exist! Contact your administrator.');
                url::redirect('/auth');
            }
           

        
        } 
    }

}