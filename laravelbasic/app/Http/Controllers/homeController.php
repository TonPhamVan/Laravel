<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //action index
    public function index() {
        return 'Home';
    }
    public function getNews($id) {
        return 'danh sach tin tưc'.$id;
    }
    public function getGames() {
        return 'danh sach game';
    }
}
