<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center; color: red;">Học lập trình Laravel</h1>
        <?php
            echo date('Y-m-d H:i:s');
        ?>
        {{-- gọi theo name --}}
        <a href="<?php echo route('admin.form')?>">form</a>
        <a href="<?php echo route('admin.product.add')?>">add</a>
        <a href="<?php echo route('admin.product.update',['id'=>1,'str'=>'tin-tuc'])?>">update</a>


    </div>
</body>
</html>
