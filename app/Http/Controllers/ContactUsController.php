<?php

namespace App\Http\Controllers;

use App\contact_us;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    public function store(Request $request,$data){
        $data = contact_us::get();


        return view('/front/contact_us/store',compact('data'));

    }
}
