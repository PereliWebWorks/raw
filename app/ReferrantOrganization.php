<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HumanizedStringToDBTrait as DBString;


class ReferrantOrganization extends Model
{

	use DBString;

	protected $fillable = ['name'];

    public function referrants(){
    	return $this->hasMany(Referrant::class);
    }
}
