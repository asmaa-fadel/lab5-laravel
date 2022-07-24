<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Validation\Rule;

class phonecontactcontroller  extends Controller 
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $phone= Phone::all();
        
        return view ('phones.index',['phone'=>$phone]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->cannot('create',Phone::class))
        abort(403);
        
        
        $validatedData = $request->validate([
            'phone' => 'required|unique:userphone|numeric|digits:11|starts_with:010,011,012',
        ]);


        $phone=auth::user()->phones()->create($request->all());
        // $phone=new Phone();
        // $phone->phone=$request->phone;
        // $phone->user_id=Auth::id();
        if($phone->save()){
            return redirect()->route('phones.index')->with('success','phone added');
        }
       
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //
        $phone=Phone::find($id);
        $this->authorize('update',$phone);
           //    if(Auth::user()->cannot('update','$phone'))
           //    abort(403);
                //


        return view('phones.edit',['phone'=>$phone]);
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
        $validatedData = $request->validate([
            'phones' => ['required','digits:11','numeric',
            Rule::unique('userphone','phone')->ignore($id)
            ]
        ]);
        $phone=Phone::find($id);
        if(Auth::user()->cannot('update',$phone))
        abort(403);
       //$phone->update($request->phone);

        $phone->phone=$request->phone;
        if($phone->save()){
            return redirect()->route('phones.index')->with('success','phone edited');
           }
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
        Phone::find($id)->delete();
        if(Auth::user()->cannot('delete',$phone))
        abort(403);
        //$phone->delete();
        return redirect()->route('phones.index');
    }
}


