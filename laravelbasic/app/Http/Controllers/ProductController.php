<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public $data = [];
    public function index(){
        $this->data['title'] = 'dao tao lap trinh';
        return view('clients.product',$this->data);
    }
}
