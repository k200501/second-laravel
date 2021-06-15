<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Newscontroller extends Controller
{
    //
    public function index(){
        if (Gate::allows('admin')){

                return view('admin.news.index');

        }
        else{
            return '你哪位？';
        }
    }
}
