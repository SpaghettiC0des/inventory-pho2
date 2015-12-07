<?php
defined('SYSPATH') or die('No direct script access.');

class Email_Model extends ORM
{
   // protected $has_many = array('items');
    
    public function insert($data) {
        $id = $this->db->insert('emails', $data)->insert_id();
        return $this->getOne($id);
    }
	
	public function insertConvo($data){
			$query = $this->db->insert('email_convo',$data);
			return $query->insert_id();
	}
	
	public function getAllConvoEmail($parent_id){
		$query = $this->db
		->join("users","users.id","emails.sender_id","left")
		->where("emails.parent_id",$parent_id)
		->orderby("emails.created_at","DESC")
		->get("emails");
		return $query;
		}
    
    public function getAll($isArray = FALSE) {
        return $this->db->get('emails')->result_array($isArray);
    }
	
	public function getAllUserEmail($userId,$isArray = FALSE){
		 $query = @"SELECT `emails`.*,`users`.`user_information`,`users`.`username`,`users`.`user_avatar`,`offices`.`name` as `officeName`
            FROM (`emails`)
            LEFT JOIN `users` ON `users`.`id` = `emails`.`sender_id`
            LEFT JOIN `offices` ON `offices`.`id` = `users`.`office_id`
			WHERE `emails`.`receiver_id` = $userId
			ORDER BY `emails`.`created_at` DESC
			";
        return $this->db->query($query)->result_array($isArray);
	}
	
	public function getAllNotNotifViewed($userId,$isArray = FALSE){
		 $query = @"SELECT `emails`.*,`users`.`user_information`,`users`.`user_avatar`,`offices`.`name` as `officeName`
            FROM (`emails`)
            LEFT JOIN `users` ON `users`.`id` = `emails`.`sender_id`
            LEFT JOIN `offices` ON `offices`.`id` = `users`.`office_id`
			WHERE `emails`.`receiver_id` = $userId
			AND `emails`.`notif_viewed` = '0'
			";
		
        return $this->db->query($query)->result_array($isArray);
	}
    
    public function getOne($id) {
        return $this->db->getwhere('emails', array('id' => $id));
    }
	
	public function getAllUsers($isArray = FALSE)
	{
		 $query = @"SELECT `users`.*,`offices`.`name` as `office_name`
            FROM (`users`)
            LEFT JOIN `offices` ON `offices`.`id` = `users`.`office_id`
			ORDER BY `users`.`id`
			";
        return $this->db->query($query)->result_array($isArray);
	}
	
	public function getOneUser($id)
	{
	 $query = @"SELECT `users`.*,`offices`.`name` as `office_name`
            FROM (`users`)
            LEFT JOIN `offices` ON `offices`.`id` = `users`.`office_id`
			WHERE `users`.`id` = $id
			";
        return $this->db->query($query)->result_array();
	}
		
	public function getOneEmail($id)
	{
	$query = @"SELECT `emails`.*,`users`.`user_information`,`users`.`username`,`users`.`user_avatar`,`offices`.`name` as `officeName` 
            FROM (`emails`)
            LEFT JOIN `users` ON `users`.`id` = `emails`.`sender_id`
            LEFT JOIN `offices` ON `offices`.`id` = `users`.`office_id`
			WHERE `emails`.`id` = $id
			";
        return $this->db->query($query);
	}
	
	public function emailViewed($id)
	{
		$data = array("notif_viewed" => 1,"email_viewed" => 1);
	$sql = $this->db
	->where("emails.id",$id)
	->update("emails",$data);
		//print_r($sql);exit;
	return $sql;
	}
	
	public function notifViewed($id)
	{
		$data = array("notif_viewed" => 1);
	$sql = $this->db
	->where("emails.receiver_id",$id)
	->update("emails",$data);
		//print_r($sql);exit;
	return $sql;
	}
	
}
