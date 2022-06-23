<?php

namespace App\Http\Controllers;

use Facade\Ignition\Http\Controllers\ScriptController;
use Illuminate\Http\Request;

class CategorisController extends Controller
{
    //

    public function __construct()
    {

    }

    //hiển thị danh sách chuyên mục (GET)
    public function index(Request $request){

        // $allData = $request-> all();

        // echo $allData['id'];
        // echo $request->all()['name'];
        $path = $request->path();

        echo $path;

        $url = $request->url();
        echo $url;
        return view('clients/categories/list');
    }

    //lấy ra 1 chuyên mục theo id (GET)
    public function getCategory($id) {
        return view('clients/categories/edit');
    }

    //cập nhật 1 chuyên mục (POST)
    public function updateCategory($id) {
        return 'submit sửa chuyên mục: '.$id;
    }

    //show form thêm dữ liệu (GET)
    public function addCategory(Request $request){
        //cách 1
        $old = $request->old('category_name');
        // echo $old;
        return view('clients/categories/add',compact('old'));

    }

    //thêm dữ liệu vào chuyên mục (POST)
    public function handleAddCategory(Request $request) {
        // $allData = $request-> all();

        // echo $request->all()['category_name'];

        // echo $allData['category_name'];

        // return 'thêm chuyên mục';

        if ($request->has('category_name')){
            $cateName = $request->category_name;
            $request->flash();
            return redirect(route('categories.add'));
        } else {
            return 'không có';
        }
    }

    //xóa dữ liệu (delete)
    public function deleteCategory($id) {
        return 'xóa chuyên mục'.$id;

    }

    // xử lí lấy thông tin file
    public function getFile(Request $request) {
        return view('clients/categories/file');
    }

    // xử lí lấy thông tin file
    public function handleFile(Request $request) {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('images');
            dd($path);
        } else {
            return 'Vui lòng chọn file';
        }
    }

}
