@extends('layouts.app')
@section('css')

@endsection
@section('pagetitle','標題')
@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Library</a></li> --}}
          <li class="breadcrumb-item active" aria-current="page">Data</li>
          <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">首頁</a></li>
          <li class="breadcrumb-item active" aria-current="page">會員管理</li>
        </ol>
      </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">產品種類</div>


            </div>
            <div class="card-body">
                <form action="{{ asset('/admin/product/type/create') }}" method="GET">
                    @csrf
                    {{-- @method('create') --}}
                    <button class="btn btn-success btn-sm">新增</button>

                </form>
                <table id="example" class="display" style="width:100%">

                    <thead>
                        <tr>
                            <th>種類名稱</th>
                            <th>操作</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->type_name }}</td>
                                <td>
                                    <a href="{{ asset('/admin/product/edit') }}/{{ $item->id }}" class="btn btn-primary btn-sm">編輯</a>
                                    <form action="{{ asset('/admin/product/delete') }}/{{ $item->id }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">刪除</button>

                                    </form>
                                </td>

                            </tr>

                        @endforeach

                        {{-- <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr> --}}

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>種類名稱</th>
                            <th>操作</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

@endsection
