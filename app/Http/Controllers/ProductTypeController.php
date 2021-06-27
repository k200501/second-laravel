<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ProductTypeController extends Controller
{
    //
    function __construct()
    {
        $this->index = 'admin.product.type.index';
        $this->create = 'admin.product.type.create';
        $this->edit = 'admin.product.type.edit';
        $this->show = 'admin.product.type.show';
    }

    public function index()
    {
        $lists = ProductType::get();

        // foreach ($lists as $item) {
        //     dd($item->product);
        // }

        return view($this->index, compact('lists'));
    }
    public function create(){
        return view($this->create);

    }
    public function store(Request $request){
        ProductType::create([
            // $request->all()
            'type_name' => $request->type_name


        ]);
        return redirect('/admin/product/type')->with('message','新增產品種類成功');

    }
    public function edit($id){
        $record = ProductType::find($id);
        return view($this->edit, compact('record'));

    }
    public function update(Request $request, $id){
        $old_record = ProductType::find($id);
        $old_record->type_name = $request->type_name;
        $old_record->save();

        return redirect('/admin/product/type')->with('message','編輯產品種類成功');

    }
    public function delete(Request $request,$id){
        $old_record = ProductType::find($id);
        $old_record->delete();
        return redirect('/admin/product/type')->with('message','刪除產品種類成功');

    }
}
