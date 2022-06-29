@extends('layouts.clients')
@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}}</h1>
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>

    @endif

    <a href="{{route('users.add')}}" class="btn btn-primary">Thêm người dùng</a>
    <form action="" method="get">
        <input type="text" name="search" class="form-control"
        style="margin: 10px 0 0 0;" placeholder="tìm kiếm theo tên">
    </form>
    <hr/>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th width="15%">Thời gian</th>
                <th width = "5%">Sửa</th>
                <th width = "5%">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($userList))
                @foreach ($userList as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->fullname}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->creat_at}}</td>
                        <td>
                            <a href="{{route('users.getEdit',['id'=>$item->id])}}" class ="btn btn-warning btn-sm">Sửa</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{route('users.delete',['id'=>$item->id])}}" class ="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">Không có người dùng</td>
                </tr>
            @endif
        </tbody>
    </table>


@endsection
