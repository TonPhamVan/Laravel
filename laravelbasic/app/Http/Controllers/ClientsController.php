<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('clients.add',$this->data);
    }

    public function postAdd(Request $request) {
        dd($request);
    }

    public function putAdd(Request $request) {
        dd($request);
    }
}
