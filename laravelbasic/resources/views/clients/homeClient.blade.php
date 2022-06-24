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
@endsection

@section('css')

@endsection

@section('js')

@endsection
