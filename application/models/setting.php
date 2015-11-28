<?php defined('SYSPATH') or die('No direct script access.');
 
class Setting_Model extends ORM {
    //protected  = [''];
	public function update($id,$data){
		$query = $this->db
		->where("settings.id",$id)
		->update("settings",$data);
		return $query;
		}
		
	public function update_user($id,$data){
		$query = $this->db
		->where("users.id",$id)
		->update("users",$data);
		return $query;
		}
		
	public function getOne(){
 		return $this->db->getwhere('settings', array('id'=>"1"))->as_array();
 	}
	
	public function get_one_profile($id){
		$query = $this->db
		->where("users.id",$id)
		->get("users");
		return $query;
		}
	
}