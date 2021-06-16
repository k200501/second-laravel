<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    function __construct(){
        $this->index = 'admin.user.index';
        $this->create = 'admin.user.create';
        $this->edit = 'admin.user.edit';
        $this->show = 'admin.user.show';

    }
    public function index(){
        $list = User::get();
        return view($this->index,compact('list'));

    }
    public function create(){

        return view($this->create);
    }
    public function store(Request $request){
        $v = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\User,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
        }
        User::create([
            'name' => $request['name'],
            'email'=> $request['email'],
            'password' =>Hash::make($request['password']),
            'role' =>$request['role']

        ]);
        return redirect('/admin/user')->with('message','驗證成功');

    }
    public function edit($id){
        $record = User::find($id);
        return view('admin.user.edit',compact('record'));
    }
    public function update(Request $request,$id){
        $v = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
        }
        $old_record = User::find($id);
        $old_record->name = $request->name;
        $old_record->password = Hash::make($request->password);
        $old_record->role = $request->role;
        $old_record->save();
        return redirect('/admin/user')->with('message','更新成功');



    }
    public function detete(Request $request,$id){
        $old_record = User::find($id);
        $old_record->delete();
        return redirect('/admin/user')->with('message','刪除成功');

    }
    public function show(){
        return view($this->show);
    }

}
