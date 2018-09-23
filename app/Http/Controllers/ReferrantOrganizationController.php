<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferrantOrganizationController extends Controller
{
    public function create(){
    	return view('referrant_organizations.create');
    }
}
