<?php
defined('SYSPATH') OR die('No direct access allowed.');

class Users_Controller extends Dashboard_Controller
{
    public function index() {
        $view = new View('users/index');
        $view->users = $this->user_model->with('roles:office')->find_all();
        //echo sha1("admin"); exit;
        $this->template->content = $view;
    }
    
    public function checkUsername(){
        if(request::is_ajax() AND request::method() == 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post('username'));
            echo $this->user_model->username_available($post);
        }
    }

    public function checkEmail(){
        if(request::is_ajax() AND request::method() == 'post'){
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post('email'));
            echo $this->user_model->email_available($post);
        }
    }

    public function save() {
        if (request::is_ajax() AND request::method() === 'post') {
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());
            
            // echo $this->auth->hash("admin").'<br />';
            // echo $this->auth->hash_password("admin");
            // die();
            $role = arr::remove('role', $post);
            foreach ($post as $key => $value) {
                $this->user_model->$key = $value;
            }
            $this->user_model->add(ORM::factory('role', 'login'));
            $this->user_model->add(ORM::factory('role', $role));
            
            log_helper::add("1", $this->user_log, $this->user_id, "Added New " . $role . " User.");
            echo $this->user_model->save();
        }
    }
    
    public function changeRole($id) {
        if (request::is_ajax() AND request::method() === 'post') {
            $this->auto_render = FALSE;
		   $post = security::xss_clean($this->input->post());
		  
		  if(array_key_exists("office_id",$post)){
			  $office_id = $post['office_id'];
			  }else{
			  $office_id = 0;
			  }
			  
		$dataUsers = array(
		"office_id" => $office_id,
		);
		$dataRole = array(
		"role_id" => $post['role']
		);
		$this->category_model->updateUser($id,$dataUsers);
		$this->category_model->updateUserRole($id,$dataRole);
		echo 1;
	}	
	}
	
	
	public function changePassword($id){
		 if (request::is_ajax() AND request::method() === 'post') {
           $this->auto_render = FALSE;
		$post = security::xss_clean($this->input->post());
		$data = array("password" =>"test","password_confirm"=> "test");
		$user = $this->user_model->find($id);
		//print_r($user);exit;
		$test = $user->change_password($data);
	
		echo $user;
		//$this->user_model->change_password($post);
		
		}
		}
    
    
    public function getUserList() {
        if (request::is_ajax() AND request::method() === 'get') {
            $this->auto_render = FALSE;
            $users = $this->category_model->getAllUsers($this->user_id, TRUE);
            
            $usersList = array();
            foreach ($users as $user) {
                $userInfo = json_decode($user->user_information, TRUE);
                $userAvatar = json_decode($user->user_avatar, TRUE);
                $user = (array)$user;
                $user_info = $userInfo['fullname'];
                $user_avatar = $userAvatar['location'];
                
                $user['fullName'] = $user_info;
                $user['userAvatar'] = $user_avatar;
                array_push($usersList, $user);
            }
            
            // $users = $this->user_model->with('office')->find_all();
            
            // foreach ($users as $key => $value) {
            //     $usersList[$key] = $value->as_array();
            //     $usersList[$key]['contact_information'] = json_decode($value->contact_information);
            //     $usersList[$key]['fullName'] = json_decode($value->user_information);
            //     $usersList[$key]['user_avatar'] = json_decode($value->user_avatar);
            //     $usersList[$key]['office_name'] = $value->office->name;
            // }
            
            echo json_encode($usersList);
        }
    }
    
    public function getOneUser($id) {
        if (request::is_ajax() AND request::method() === 'get') {
            $this->auto_render = FALSE;
            $user = $this->category_model->getOneUser($id);
            echo json_encode($user);
        }
    }
    
    public function save_email() {
        if (request::is_ajax() && request::method() == 'post') {
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());
            print_r($post);
            exit;
        }
    }
    
    public function delete($id) {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $user = $this->user_model->find($id);
            
            $userInfo = json_decode($user->user_information);
            if (!empty($user->user_information)) {
                $userName = $userInfo->fullname;
            } 
            else {
                $userName = "User";
            }
            log_helper::add("1", $this->user_log, $this->user_id, "Deleted User named " . $userName . ".");
            echo $this->user_model->delete($id);
        }
    }
}
