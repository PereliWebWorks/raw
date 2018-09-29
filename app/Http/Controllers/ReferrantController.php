<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referrant;
use App\ReferrantOrganization;

class ReferrantController extends Controller
{
    public function create(){
    	return view('referrants.create', [
    		'referrant_orgs' => ReferrantOrganization::all()
    	]);
    }
}
