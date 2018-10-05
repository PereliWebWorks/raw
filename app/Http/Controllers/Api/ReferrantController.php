<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Referrant as Ref;
use App\ReferrantOrganization as RefOrg;

class ReferrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $request->validate([
            'referrant_organization' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email'
        ]);
        $response = [];
        //see if the organization exists
        //If not, create it
        $refOrg = RefOrg::where('name', RefOrg::humanizedStringToDB($request->referrant_organization))->first();
        if (is_null($refOrg)){
            $refOrg = RefOrg::create(['name' => RefOrg::humanizedStringToDB($request->referrant_organization)]);
            $response['referrant_org'] = $refOrg;
        }
        $ref = Ref::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'referrant_organization_id' => $refOrg->id
        ]);
        $response['referrant'] = $ref;
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
