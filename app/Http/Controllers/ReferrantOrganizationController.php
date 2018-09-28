<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReferrantOrganization;

class ReferrantOrganizationController extends Controller
{
    public function create(){
    	return view('referrant_organizations.create', ['referrant_orgs' => ReferrantOrganization::all()]);
    }
}
