<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HumanizedStringToDBTrait as DBString;

class Property extends Model
{

	use DBString;

	protected $fillable = ['nickname'];
}
