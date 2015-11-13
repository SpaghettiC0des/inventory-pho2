<?php defined('SYSPATH') OR die('No direct access allowed.');

class Office_Base_Controller extends Template_Controller {

    const ALLOW_PRODUCTION = FALSE;
    public $template = 'templates/_main_template'; 

    public function __construct(){
        parent::__construct();
       
               $this->auth = new Auth;
               $this->cache = Cache::instance();
               $this->session = Session::instance();

               if (!$this->auth->logged_in()){
                   $this->session->set("requested_url","/".url::current()); // this will redirect from the login page back to this page/
                   url::redirect('/auth');
               }
               
               $settings = json_decode($this->setting_model->find(1)->configs);
               $this->template->settings = $settings;
            $favicon = json_decode($settings->favicon);
            $this->template->favicon = $favicon;
            //print_r($favicon->location);exit;
            
            $this->user_info = json_decode($this->auth->get_user()->user_information);
            $this->contact_info = json_decode($this->auth->get_user()->contact_information);
            $this->profile_info = json_decode($this->auth->get_user()->user_avatar);
            //print_r($this->auth->get_user()->user_information);exit;
        

               $this->current_role = $this->auth->get_user()->roles[1]->name;

               $uri = $this->uri->segment(1);

               if($uri == 'districts'){
                   $dashboard = '';

                   $districts = array(
                       'toggled'   =>  'toggled',
                       'active'    =>  'active',
                       'display-block'    =>  'display-block'
                   );

                   $offices = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $office_budgets = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $categories = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $suppliers = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $items = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $purchases = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $transactions = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $requests = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $users = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );
                   $this->template->uriClass = (object)compact('dashboard','districts','offices',
                       'office_budgets','categories','suppliers','items','purchases','transactions','requests','users');
               }else if($uri == 'offices'){
                   $dashboard = '';

                   $districts = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                   );

                   $offices = array(
                       'toggled'   =>  'toggled',
                       'active'    =>  'active',
                   );

                   $office_budgets = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $categories = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $suppliers = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $items = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $purchases = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $transactions = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $requests = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $users = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );
                   $this->template->uriClass = (object)compact('dashboard','districts','offices',
                       'office_budgets','categories','suppliers','items','purchases','transactions','requests','users');
               }else{
                   $dashboard = '';

                   $districts = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                   );

                   $offices = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                   );

                   $office_budgets = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $categories = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $suppliers = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $items = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $purchases = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $transactions = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $requests = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );

                   $users = array(
                       'toggled'   =>  '',
                       'active'    =>  '',
                       'display-block'    =>  ''
                   );
                   $this->template->uriClass = (object)compact('dashboard','districts','offices',
                       'office_budgets','categories','suppliers','items','purchases','transactions','requests','users');
               }

            
            if(!empty($this->user_info->fullname)){
                $this->user_log = $this->user_info->fullname;
                }else{
                $this->user_log = "User";
            }
                
            if(!empty($this->auth->get_user()->id)){
                $this->user_id = $this->auth->get_user()->id;
                }else{
                $this->user_id = "0";
            }
    }
    
    public function index() {
      return;
    }

    public function logout(){
        $this->auth->logout();
        $this->session->destroy("requested_url");
        log_helper::add("2",$this->user_log,$this->user_id,"Logged Out from the System.");
        url::redirect('/auth');
    }
}