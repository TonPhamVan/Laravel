@extends('layouts.clients')
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h3>San pham sidebar</h3>
@endsection

@section('content')
    <h1>Sản phẩm</h1>
    @push('scripts')
    <script>
        console.log('push lần 2')
    </script>
    @endpush

@endsection

@section('css')

@endsection

@section('js')
    {{-- <script>
        console.log('ok');
    </script> --}}
@endsection

{{-- @prepent('scripts')
    <script>
        console.log('push lần 1')
    </script>
@endprepent --}}


