@extends('layouts.clients')
@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>Thêm sản phẩm</h1>
    <form action="{{route('post-add')}}" method="post" id="product-form">
        @error('msg')
            <div class="alert alert-danger text-center">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm..." id="">
            @error('product_name')

                <span style="color: red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Giá sản phẩm</label>
            <input type="text" name="product_price" class="form-control" placeholder="Giá sản phẩm..." id="">
            @error('product_price')

                <span style="color: red">{{$message}}</span>
                {{-- $message có sẵn trong laravel --}}
            @enderror
        </div>
        {{-- <input type="text" name="username"/> --}}
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        @csrf
        {{-- @method('put') --}}
    </form>
@endsection

@section('css')

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#product-form').on('submit',function(e){
                // e.preventDefault();
                let productName =$('input[name="product_name"]').val().trim();
                let productPrice =$('input[name="product_price"]').val().trim();
                let csrfToken = $(this).find('input[name="_token"]').val();
                $.ajax({
                    url: $(this).attr('action'),
                    typr: 'POST',
                    data: {
                        product_name: productName,
                        product_price: productPrice,
                        _token: csrfToken,
                    },
                    dataType: 'json',
                    success: function(response) {

                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endsection
