<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HumanizedStringToDBTrait as DBString;


class Address extends Model
{
	use DBString;

	protected $fillable = ['address', 'property_id'];

    public function property(){
    	return $this->belongsTo(Property::class);
    }
}
