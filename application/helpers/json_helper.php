<?php defined('SYSPATH') OR die('No direct access allowed.');

class json_helper_Core {
	public static function convert($obj, $encode = FALSE)
	{
		$arr = [];
	  	foreach ($obj as $key => $value) {
	  		$arr[$key]= $value;
	  	}
	  	if( $encode ){
	  		return json_encode($arr);
	  	}

	  	return $arr;
	}
}
?>
