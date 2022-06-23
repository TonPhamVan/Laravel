<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>trang chủ</h1>
    <h2>{{$webcome}}</h2>

    <h2>{!!$hello!!}</h2>

    @for($i = 1;$i<=10;$i++)
    <p>Phần tử: {{$i}}</p>
    @endfor

    @while ($index <= 10)
        <p>Phần tử: {{$index}}</p>
        @php
         $index++;
        @endphp
    @endwhile

    @foreach ($dataArr as $key => $item)
        <p>Phần tử : {{$key}}=>{{$item}}</p>
    @endforeach

    @forelse ($dataArr as $item)
    <p>Phần tử : {{$item}}</p>
    @empty
    <p>Không có phần tử nào khi mảng rỗng []</p>
    @endforelse

    @if ($number>=10)
        <p>Đây là giá trị hợp lệ</p>
    @else
        <p>Đây là giá trị ko hợp lệ</p>
    @endif

    @if ($number>=10)
        <p>Đây là giá trị hợp lệ</p>
    @elseif ($number <10)
        <p>nho hon 10</p>
    @else
        <p>Đây là giá trị ko hợp lệ</p>
    @endif

    @switch($number)
        @case(1)
            <p>so 1</p>
            @break
        @case(2)
        @case(3)
        @case(4)
            <p>so 2</p>
            @break
        @case(10)
            <p>so 10</p>
            @break
        @default
            <p>so con lai</p>
    @endswitch

    {{-- ko bien dich --}}
    @verbatim
    <div>hello</div>
    <script>
        hello, @{{name}}
    </script>
    @endverbatim

    {{-- tach view thanh nhieu file nho(nhieu path) --}}
    @php
        $message ='dat hang thanh cong';
    @endphp
    @include('parts.notice')
</body>
</html>
