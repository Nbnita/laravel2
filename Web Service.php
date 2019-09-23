<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sendEmailController extends Controller
{
    //
    function index()
    {
        return view('send_email');
    }
    function send(Request $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $pincode=$request->input('pincode');
       
        $this->validate($request,[
                'name'=>'required|unique:webapp|',
                'email'=>'required|unique:webapp|email',
                'pincode'=>'required|unique:webapp|max:6',
            ]);
        DB::insert('insert into webapp(id,name,email,pincode) value(?,?,?,?)',[null,$name,$email,$pincode]);
        
        print_r( $request->input('name'));
        echo ' !A confirmation mail is sent to your email ';
        //echo '! A confirmation email is sent to your email.';

    }
}
