<?php defined('SYSPATH') OR die('No direct access allowed.');

class log_helper_Core {

	public static function add($level, $username, $action)
	{
		$log = ORM::factory('log');

		$data = array(
			"user" => $username,
			"level" =>$level,
			"action" => $action
		);
		
		$log->insert($data);
	}
	
}
?>