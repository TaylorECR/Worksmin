<?php
namespace App\Helpers;

class Helper {
	public static function uploadFile($key, $path) {
		\request()->file($key)->store($path);
		return request()->file($key)->hashName();
	}


	public static function dataToArray($array){
		$new_array = array();
        foreach( $array as $key => $value) {
            $new_array[] = $value['id'];
        }
        return $new_array;
	}
}