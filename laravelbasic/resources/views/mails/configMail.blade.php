<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>config</title>
</head>
<body>
    <form action="/test-mail" method="post">
        @csrf
        <input type="text" name="host" value="{{old('host')}}" id="" placeholder="Host"><br>
        <input type="text" name="post" value="{{old('post')}}" id="" placeholder="Post"><br>
        <input type="text" name="username" value="{{old('username')}}" id="" placeholder="Username"><br>
        <input type="text" name="password" value="{{old('password')}}" id="" placeholder="Password"><br>
        <input type="text" name="encryption" value="{{old('encryption')}}" id="" placeholder="Encryption"><br>
        <button type="submit">Test</button>
    </form>
</body>
</html>
