<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferrantOrganization extends Model
{
    public function referrants(){
    	return $this->hasMany(Referrant::class);
    }
}
