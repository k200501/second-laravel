<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function contactus()
    {
        return view('front.contact_us.index');
    }
}
