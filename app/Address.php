<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

	protected $fillable = ['address', 'property_id'];

    public function property(){
    	$this->belongsTo('App\Property')
    }
}