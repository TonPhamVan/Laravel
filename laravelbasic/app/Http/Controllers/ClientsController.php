<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Rules\Uppercase;

class ClientsController extends Controller
{
    //
    public $data = [];
    public function index(){
        $this->data['title'] = 'dao tao lap trinh';
        return view('clients.homeClient',$this->data);
    }

    public function getAdd() {
        $this->data['title'] = 'them san pham';
        $this->data['errorMessage'] = 'Vui lòng kiểm tra lại dữ liệu';
        return view('clients.add',$this->data);
    }

    // public function postAdd(Request $request) {
    //     // dd($request);
    //     $request->validate([
    //         'product_name' => 'required | min:6',
    //         'product_price' => 'required | integer'
    //     ],[
    //         'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
    //         'product_name.min' => 'Tên sản phẩm ko được nhỏ hơn 6 ký tự',
    //         'product_price.required' => 'Giá sản phẩm bắt buộc phải nhập',
    //         'product_price.integer' => 'Giá sản phẩm phải là số'
    //     ]);
    // }

    // public function postAdd(Request $request) {
    //     // dd($request);
    //     $rules = [
    //         'product_name' => 'required | min:6',
    //         'product_price' => 'required | integer'
    //     ];
    //     $messages = [
    //         'product_name.required' => 'Trường :attribute bắt buộc phải nhập',
    //         'product_name.min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
    //         'product_price.required' => 'Trường :attribute bắt buộc phải nhập',
    //         'product_price.integer' => 'Trường :attribute phải là số'
    //     ];
    //     $request->validate($rules,$messages);

    // }

    // sử dụng form request validate
    // public function postAdd(ProductRequest $request) {
    //     dd($request);

    // }

    public function postAdd(Request $request) {
        $rules = [
                    'product_name' =>['required','min:6', function($attribute,$value,$fail){
                        if($value!=mb_strtoupper($value,'UTF-8')){
                            //xảy ra lỗi
                            $fail('Trường :attribute không hợp lệ');
                        }
                    }],
                    'product_price' => 'required | integer'
                ];

        $messages = [
                    'product_name.required' => 'Trường :attribute bắt buộc phải nhập',
                    'product_name.min' => 'Trường :attribute không được nhỏ hơn :min ký tự',
                    'product_price.required' => 'Trường :attribute bắt buộc phải nhập',
                    'product_price.integer' => 'Trường :attribute phải là số'
                ];

        $attributes = [
            'product_name' => 'Tên sản phẩm',
            'product_price' => ' Giá sản phẩm'
        ];
        $validator=Validator::make($request->all(),$rules,$messages,$attributes);
        // $validator->validate();
        $validator->validate();

        // if ($validator->fails()){
        //     $validator->errors()->add('msg','vui lòng kiểm tra lại dữ liệu');
        // } else {
        //     return redirect()->route('san-pham');
        // }
        // return back()->withErrors($validator);
    }

    public function putAdd(Request $request) {
        dd($request);
    }

    public function downloadImage(Request $request) {
        // dd($request->image);
        if(!empty($request->image)){

            $image = trim($request->image);

            $fileName1 = basename($image);

            $fileName = 'image_'.uniqid().'jpg';
            // chỉ chấp nhận link nội bộ trong project
            return response()->download($image);

            //download từ link bên ngoài
            // return response()->streamDownload(function() use($image){
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // },$fileName1);
        }
    }
}
