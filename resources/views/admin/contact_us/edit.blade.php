@extends('layouts.app')

@section('page-title', '聯絡我們管理')

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
                <li class="breadcrumb-item"><a href="{{ asset('/admin/news') }}">聯絡我管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">聯終我-查看</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>聯絡我們管理</h2>
                    </div>

                    <div class="card-body">
                        {{-- {{ asset('/admin/news/update') }}/{{ $record->id }} --}}
                        <form action="" method="POST" enctype="multipart/form-data">
							@csrf

                            {{-- <div class="form-group">
                                <label for="type">分類</label>
                                <select class="form-control" id="type" name="type">

                                    @foreach ($type as $item)
                                        <option @if($record->type == $item) selected @endif value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label for="name">姓名</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $contactUs->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">信箱</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $contactUs->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="subject">主旨</label>
                                <input type="text" class="form-control" id="subject" name="subject" value="{{ $contactUs->subject }}" readonly>
                            </div>

                            {{-- <div class="form-group">
                                <label for="img">圖片</label>
                                <img style="width: 200px" src="{{ asset($record->img) }}" alt="">
                                <input type="file" class="form-control" id="img" name="img">
                            </div> --}}

                            <div class="form-group">
                                <label for="content">內容</label>
                                <textarea class="form-control" name="content" id="content" cols="30" rows="10" readonly>{{ $contactUs->content }}</textarea>
                            </div>
                            <a href="{{ asset('/admin/contact_us') }}">返回</a>

							{{-- <button type="submit" class="btn btn-primary">編輯</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')

@endsection
