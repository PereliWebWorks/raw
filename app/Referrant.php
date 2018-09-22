<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referrant extends Model
{
    public function clients(){
    	return $this->hasMany(Client::class);
    }

    public function company(){
    	return $this->hasOne(ReferrantOrganization::class);
    }
}
