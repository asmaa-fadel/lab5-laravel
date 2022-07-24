<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactcontroller extends Controller
{
    public function list(){
        return "list of allcontact";
    }
    public function create(){
        return "create of contact";
    }
    public function edit(){
        return "edit of contact";
    }
    public function delete(){
        return "delet of contact";
    }
    public function update(){
        return "update of contact";
    }
    public function show(){
        return "show of contact";
    }
   
}
