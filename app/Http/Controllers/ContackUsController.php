<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class ContackUsController extends Controller
{
    //
    public function index(){
        $list = ContactUs::get();
        return view('admin.contact_us.index',compact('list'));
    }
    public function store(Request $request){
        ContactUs::create($request->all());
        return redirect('/contact_us')->with('message','發送成功');
    }
    public function edit($id){
        $contactUs = ContactUs::find($id);
        return view('admin.contact_us.edit',compact('contactUs'));
    }
    public function delete($id){
        $contactUs = ContactUs::find($id);
        $contactUs->delete();
        return redirect('/contact_us')->with('message','刪除成功');
    }
}
