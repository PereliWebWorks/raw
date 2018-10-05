<?php

namespace App\Http\Traits;

trait HumanizedStringToDBTrait {
	public static function humanizedStringToDB($string){
		return strtolower($string);
	}
}

?>