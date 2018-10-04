<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferrantOrganization extends Model
{

	protected $fillable = ['name'];

    public function referrants(){
    	return $this->hasMany(Referrant::class);
    }

    public static function humanizedNameToDBName($name){
    	return strtolower($name);
    }
}
