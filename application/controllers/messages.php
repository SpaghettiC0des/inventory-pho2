<?php
defined('SYSPATH') OR die('No direct access allowed.');

class Messages_Controller extends Dashboard_Controller
{
    public function index() {
        $index = new View('messages/index');
        $index->emails = $this->email_model->getAllUserEmail($this->user_id,TRUE);
        $this->template->content = $index; 
    }
    
    public function save_email() {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $post = security::xss_clean($this->input->post());
			$senderId = $this->auth->get_user()->id;
			$receiver = $this->category_model->getOneUser($post['receiverId']);
						print_r($post['receiverId']);exit;
			$decodeUserInfo = json_decode($receiver[0]->user_information,TRUE);

			$dataSent = array(
			"email_data" => $post['content'],
			"subject" => $post['subject'],
			"receiver_id" => $post['receiverId'],
			"sender_id" => $senderId,
			"notif_viewed" => 0,
			"email_viewed" => 0,
			"email_deleted" => 0,
			);
			//print_r($post);exit;
			//$this->auth->get_user()->id
           $latest = $this->email_model->insert($dataSent);
          log_helper::add("1", $this->user_log, $this->user_id, "Message Sent to " . $decodeUserInfo['fullname'] . ".");
            
          //  echo json_encode($latest);
        }
    }
    
    public function delete($id) {
        if (request::is_ajax() && request::method() === 'post') {
            $this->auto_render = FALSE;
            $district = $this->district_model->find($id);
            log_helper::add("1", $this->user_log, $this->user_id, "Deleted District named " . $district->name . ".");
            echo $this->district_model->delete($id);
        }
    }
    
	
	public function getUserEmails()
	{
		   if (request::is_ajax() && request::method() === 'get') {
            $this->auto_render = FALSE;
			$emails = $this->email_model->getAllUserEmail($this->user_id,TRUE);
			$notif = count($this->email_model->getAllNotNotifViewed($this->user_id,TRUE));
		
			 $more_emails = array();
	 foreach ($emails as $email){
	 $userInfo = json_decode($email->user_information,TRUE);
	 $userAvatar = json_decode($email->user_avatar,TRUE);
	 $email = (array) $email;
		 $user_info = $userInfo['fullname'];
		 $user_avatar = $userAvatar['location'];
			 //array_push($user,$user_info);
			 $email['fullName'] = $user_info;
			 $email['userAvatar'] = $user_avatar;
			 array_push($more_emails,$email);
		 }
		
			echo json_encode(compact('more_emails','notif'));
		}
	}
    
    public function reports() {
        $view = new View('districts/report');
        $this->template->content = $view;
    }
	
	public function viewMessage($id){
		 $index = new View('messages/viewMessage');
		 $index->email = $this->email_model->getOneEmail($id)->current();
        $this->template->content = $index; 
		 $this->email_model->emailViewed($id);
		}
		
	public function getOneEmail($id){
	if (request::is_ajax() && request::method() === 'get') {
	$this->auto_render = FALSE;
	
	$email = $this->email_model->getOneEmail($id)->current();
	$userInfo = json_decode($email->user_information,TRUE);
	$userAvatar = json_decode($email->user_avatar,TRUE);
	$email = (array) $email;
	$user_info = $userInfo['fullname'];
	$user_avatar = $userAvatar['location'];
			 //array_push($user,$user_info);
	$email['fullName'] = $user_info;
	$email['userAvatar'] = $user_avatar;
			 
		echo json_encode($email);
		}
	}
	
	public function userNotifViewed(){
		if (request::is_ajax() && request::method() === 'get') {
	$this->auto_render = FALSE;
	$email = $this->email_model->notifViewed($this->user_id);
	echo "OK";
		}
	}
	
}
