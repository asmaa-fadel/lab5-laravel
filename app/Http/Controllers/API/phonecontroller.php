<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\phoneController as ControllersPhoneController;
use App\Http\Resources\PhoneResource;
use App\Http\Resources\PhoneCollection;
use App\Http\Resources\UserResource;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class phonecontroller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new PhoneCollection(Phone::all());
        // return new PhoneCollection(Auth::user()->phones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phone=new Phone();
        $phone->phone=$request->phone;
        $phone->user_id=Auth::id();
        //
       // $phone=auth::user()->phones()->create($request->all());
        return new PhoneResource($phone);
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
         return new PhoneResource(Phone::find($id));
         
        return[
            'name' =>$this->name,
            'email'=>$this->email
        ];
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
        $phone=Phone::find($id);
        $phone->update($request->all());
        return new PhoneResource($phone);
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
