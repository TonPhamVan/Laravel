<form action="/form" method="post">
    <div>
        <input type="text" name="username" placeholder="nhập username...">
        <input type="hidden" name="_method" id="" value="post">
        <input type="hidden" name="_token" id="" value="<?php echo csrf_token();?>">
    </div>
    <button type="submit">Submit</button>
</form>
