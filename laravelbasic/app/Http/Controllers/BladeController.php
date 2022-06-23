<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeController extends Controller
{
    //
    public $data = [];
    public function index() {
        $this->data['webcome']= 'Học lập trình laravel';
        $this->data['hello']= 'Học lập trình laravel <p>Unicode</p>';
        $this->data['index'] = '1';
        $this->data['dataArr'] = [
            'item 1',
            'item 2',
            'item 3'
        ];
        $this->data['check'] = true;
        $this->data['number'] = 10;


        return view('hom',$this->data);
    }
}
