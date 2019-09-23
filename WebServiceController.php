<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\webapp;

class WebServiceController extends Controller
{

  public function create(request $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $pincode=$request->input('pincode');
        DB::insert('insert into webapp(id,name,email,pincode) value(?,?,?,?)',[null,$name,$email,$pincode]);

        return 'Welcome!A confirmation mail is send to your email';

        $message=['name.required'=>'Name is required','email.required'=>'email is required','pincode.required'=>'Pincode is required'];
       $this->validate($request,[
            'name'=>'required|unique:webapp|',
            'email'=>'required|unique:webapp|email',
            'pincode'=>'required|unique:webapp|max:6',
        ],$messages);
     } 
    }