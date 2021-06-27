@extends('layouts.app')

@section('page-title', '產品品項新增')

@section('css')
    <style>
        .card-header h2 {
            margin-bottom: 0;
        }

    </style>
@endsection


@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
                <li class="breadcrumb-item" active>產品管理</li>
                <li class="breadcrumb-item"><a href="{{ asset('/admin/product/item') }}">產品品項管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">產品品項新增</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>產品品項新增</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ asset('/admin/product/item/store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="product_type_id">產品種類</label>
                                <select class="form-control" id="product_type_id" name="product_type_id">
                                    @foreach ($type as $item)
                                    <option value="{{ $item->id }}">{{ $item->type_name }}</option>

                                    @endforeach

                                </select>
                              </div>
                            <div class="form-group">
                              <label for="product_name">產品品項名稱</label>
                              <input type="text" class="form-control" id="product_name" name="product_name">
                            </div>
                            <div class="form-group">
                                <label for="price">價格</label>
                                <input type="text" class="form-control" id="price" name="price">
                              </div>
                              <div class="form-group">
                                <label for="discript">產品描述</label>
                                {{-- <input type="text" class="form-control" id="type_name" name="type_name"> --}}
                                <textarea name="discript" id="dixcript" cols="30" rows="10"class="form-control"></textarea>
                              </div>

                            <button type="submit" class="btn btn-primary">新增</button>
                          </form>
                        {{-- <form action="{{ asset('/admin/product/type/store') }}" method="POST">
							@csrf

                            <div class="form-group">
                                <label for="type_name">產品品項名稱</label>
                                <input type="text" class="form-control" id="type_name" name="type_name">
                            </div>

							<button type="submit" class="btn btn-primary">新增</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')

@endsection
