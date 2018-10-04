<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referrant extends Model
{

	protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'referrant_organization_id'];

    public function clients(){
    	return $this->hasMany(Client::class);
    }

    public function company(){
    	return $this->hasOne(ReferrantOrganization::class);
    }
}
