<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Productcontroller extends Controller
{
    //
    public function product(){
        return view('admin.product.index');
    }
}
