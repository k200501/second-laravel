<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function contactus()
    {
        return view('front.contact_us.index');
    }
    public function product(Request $request){
        $types = ProductType::get();
        if($request->type_id){
            $record = Product::where('product_type_id',$request->type_id)->get();
        }
        else{$record = Product::get();
        }

        return view('front.product.index',compact('record','types'));
    }
}
