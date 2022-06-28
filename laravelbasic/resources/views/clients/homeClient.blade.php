@extends('layouts.clients')
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h3>Home sidebar</h3>
@endsection

@section('content')
    <h1>Trang chủ</h1>

    {{-- @datetime('2021-12-15 15:00:30') --}}
    {{-- @env('local')
        <p>môi trường local</p>
    @elseenv('production')
        <p>môi trường production</p>
    @else
        <p>môi trường test</p>
    @endenv --}}

    <x-alert type="info" message="đăng kí thành công"/>
    <x-package-button />

    <p><img src="https://znews-photo.zingcdn.me/w960/Uploaded/znanug/2022_06_27/6XiG_6gy_1.jpg" alt=""></p>
    <p><a href="{{route('download-image').'?image=https://znews-photo.zingcdn.me/w960/Uploaded/znanug/2022_06_27/6XiG_6gy_1.jpg'}}" class="btn btn-primary">Download ảnh</a></p>
    <p><a href="{{route('download-image').'?image='.public_path('storage/6XiG_6gy_1.jpg')}}" class="btn btn-primary">Download ảnh nội bộ</a></p>
@endsection

@section('css')
    <style>
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('js')

@endsection
