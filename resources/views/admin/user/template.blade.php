@extends('layouts.app')
@section('css')

@endsection
@section('pagetitle','標題')
@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Library</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
          <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">首頁</a></li>
          <li class="breadcrumb-item active" aria-current="page">會員管理</li>
        </ol>
      </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>


            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

@endsection
