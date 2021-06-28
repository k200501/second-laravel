<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Darryldecode\Cart\Cart;
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

    public function add(Request $request){
        $product = Product::find($request->productID);
        \Cart::add(array(
            'id' =>456,
            'name' =>'Sample Item',
            'price' =>67.99,
            'quantity' => 4,
            'attributes' =>array()

        ));
        return 'ok';
    }
    public function content(){
        $cartCollection = \Cart::getContent();
        dd($cartCollection);
    }
}
