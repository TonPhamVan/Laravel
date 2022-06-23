<h1>thêm chuyên mục</h1>

<form action="<?php echo route('categories.add')?>" method="post">
    <div>
        <input type="text" name="category_name"
         placeholder="tên chuyên mục"
         value="<?php echo old('category_name')?>">
        <!-- cách 1: echo $old -->
    </div>
    <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
    <button type="submit">Thêm chuyên mục</button>
</form>
