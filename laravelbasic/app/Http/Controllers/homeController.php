<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //action index
    public function index() {
        // return 'Home';
        $title = 'học lập trình web';
        $body ='hello world';
        $dataview = [
            'title' => $title,
            'body1' => $body
        ];
        // compact('title','body')
        // -> with(['title'=>$title,'body'=>$body)
        return view('home', $dataview);
    }
    public function getNews($id) {
        return 'danh sach tin tưc'.$id;
    }
    public function getGames() {
        return 'danh sach game';
    }
    public function getProductDetail($id) {
        return view('clients.products.detail',compact('id'));
    }
}
