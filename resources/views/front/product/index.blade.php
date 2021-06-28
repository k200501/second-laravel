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
                        <a href="#" class="btn btn-primary" Data_id={{ $product->id }}>加入購物車</a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

@endsection
@section('js')
<script>
    var addBtns = document.querySelectorAll('.add-btn');
    addBtns.forEach(function(addBtn){
        addBtn.addEventListener('click',function(){
            var productId = this.getAttribute('data-id');
            var formData = new FormData();
            formData.append('_token','{{ csrf_token() }}');
            formData.append('productId',productId);
            fetch('/shopping_cart/add',{
                'method':'post',
                'body':formData
            }).then(function(response){
                return response.text();
            }).then(function(result){
                if(result =="success"){
                    alert('加入成功')
                }
            })
        })
    })
</script>

@endsection
