<?php
defined('SYSPATH') or die('No direct script access.');

class Category_Model extends ORM
{
    protected $has_many = array('items');
    
    public function insert($data) {
        $id = $this->db->insert('categories', $data)->insert_id();
        return $this->getOne($id);
    }
    
    public function getAll($isArray = FALSE) {
        return $this->db->get('categories')->result_array($isArray);
    }
    
    public function getOne($id) {
        return $this->db->getwhere('categories', array('id' => $id));
    }
    
    public function getAllUsers($userId,$isArray = FALSE) {
        $query = @"SELECT `users`.*,`offices`.`name` as `office_name`
            FROM (`users`)
            LEFT JOIN `offices` ON `offices`.`id` = `users`.`office_id`
			WHERE `users`.`id` != $userId
            ORDER BY `users`.`id`
            ";
        return $this->db->query($query)->result_array($isArray);
    }
    
    public function reports() {
        $query = @"SELECT c.name AS category_name, COUNT(i.category_id) AS item_count 
            FROM items i, categories c
            WHERE i.category_id = c.id
            GROUP BY i.category_id";
        
        return $this->db->query($query)->result_array();
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
		
	public function updateUser($id,$data)
	{
	$query = $this->db
	->where("users.id",$id)
	->update("users",$data);
	return $query;
	}
	
	public function updateUserRole($id,$data)
	{
	$query = $this->db
	->where("roles_users.user_id",$id)
	->where("roles_users.role_id !=",1)
	->update("roles_users",$data);
	return $query;
	}
	
	public function getOneRolesUsers($id)
	{
		$query = $this->db
		->where("roles_users.user_id",$id)
		->where("roles_users.role_id !=",1)
		->get("roles_users");
		return $query;
		}
	
}
