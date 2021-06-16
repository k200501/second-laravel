<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Productcontroller extends Controller
{
    //

    function __construct(){
        $this->index = 'admin.product.type.index';
        $this->create = 'admin.product.type.create';
        $this->edit = 'admin.product.type.edit';
        $this->show = 'admin.product.type.show';

    }
    public function product(){

        $list = ProductType::get();
        return view($this->index,compact('list'));
    }
    public function create(){

        return view($this->create);
    }
    public function store(Request $request){
        // $v = Validator::make($request->all(), [
        //     'type_name' => ['required', 'string', 'max:255'],
        //     // 'email' => ['required', 'string', 'email', 'max:255', 'unique:App\User,email'],
        //     // 'password' => ['required', 'string', 'min:8', 'confirmed'],

        // ]);
        // if($v->fails()){
        //     // dd($v);
        //     return redirect()->back()->withErrors($v->errors());

        // }
        ProductType::create([
            'type_name' => $request['type_name'],
            // 'email'=> $request['email'],
            // 'password' =>Hash::make($request['password']),
            // 'role' =>$request['role']

        ]);
        return redirect('/admin/product/type')->with('message','新增成功');

    }

}
