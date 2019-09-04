<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class ATGController extends Controller
{
    //
    public function index(request $request){
        $name=$request->input('name');
        $email=$request->input('email');
        $pincode=$request->input('pincode');
       DB::insert('insert into webapp(id,name,email,pincode) value(?,?,?,?)',[null,$name,$email,$pincode]);
       echo 'Welcome ';
       print_r( $request->input('name'));
    }
}
