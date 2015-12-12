<?php defined('SYSPATH') or die('No direct script access.');
 
class User_Model extends Auth_User_Model {
   
   public function userStatistics($filter){

        if($filter){
            $q = @"SELECT r.name as role, COUNT(ru.role_id) as role_count FROM users u, roles_users ru, roles r
               WHERE ru.role_id = $filter
               AND u.id = ru.user_id
               AND ru.role_id = r.id
               GROUP BY ru.role_id";

            return $this->db->query($q)->result_array();
        }
        $q = @"SELECT r.name as role, COUNT(ru.role_id) as role_count FROM users u, roles_users ru, roles r
           WHERE ru.role_id != 1
           AND u.id = ru.user_id
           AND ru.role_id = r.id
           GROUP BY ru.role_id";

        return $this->db->query($q)->result_array();
   }
}