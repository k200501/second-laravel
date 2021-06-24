@extends('layouts.app')
@section('css')
    <style>
        .product-img {
            width: 100%;
            height: 300px;
            background-position: center;
            background-size: cover;
        }

    </style>

@endsection
@section('content')
    <div class="container my-3">
        <div class="row">
            <a href="/product" class="btn btn-primary mr-2">ALL</a>

        </div>
        @foreach ($types as $type)
        <a href="/product?type_id={{ $type->id }}" class="btn btn-primary mr-2">{{ $type->type_name }}</a>

        @endforeach

    </div>
    <div class="container">
        <div class="row">
            @foreach ($record as $product)
                <div class="card" style="width: 18rem;">
                    <div class="product-img" style="background-image: {{ asset($product->photo) }}"></div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->discript }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

@endsection
@section('js')

@endsection
