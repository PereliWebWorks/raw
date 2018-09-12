<?php

namespace App\Http\Controllers;

use App\UserAuthorization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserAuthorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorized_users_ids = UserAuthorization::pluck('user_id')->all();
        $unauthorized_users = User::whereNotIn('id', $authorized_users_ids)->get();
        return view('user_authorizations.index')
            ->with(['unauthorized_users' => $unauthorized_users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserAuthorization  $userAuthorization
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAuthorization $userAuthorization)
    {
        //
    }
}
