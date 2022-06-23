<h1>upload file</h1>

<form action="<?php echo route('categories.upload')?>" method="post"
enctype="multipart/form-data">
    <div>
        <input type="file" name="photo" id="">
    </div>
    <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
    <button type="submit">Upload</button>
</form>
