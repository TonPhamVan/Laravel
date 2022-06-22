<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\homeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/unicode',function(){
    // $user = new User();
    // $allUser = $user::all();
    // dd($allUser);
    return view('home');
});

Route:: get('/san-pham',function(){
    return view('product');
});

// Route::get('/form',function() {
//     return view('form');
// });
// Route::post('/form',function(){
//     return 'Phương thức post của form';
// });

// Route::put('/form',function(){
//     return 'Phương thức put của form';
// });
// Route::delete('/form',function(){
//     return 'Phương thức delete của form';
// });

// nhận nhiều req
// Route::match(['get','post'], '/form',function(){
//     return $_SERVER['REQUEST_METHOD'];
// });

// Route::any('form',function(Request $request){
//     return $request->method();
// });

// Route::get('/form',function() {
//         return view('form');
//     });

// chuyển hướng
// Route::redirect('unicode','form');

// hỗ trợ get
// Route::view('show-form','form');

// gọi controller
Route::get('/', 'App\Http\Controllers\homeController@index')->name('home');

Route::get('/game', 'homeController@getGames')->name('game');

Route::get('/tin-tuc/{id}', [homeController::class,'getNews'])->name('news');


// nhóm
Route::prefix('admin')->middleware('checkproduct')->group(function(){
    Route::get('/',function() {
        return 'admin';
    });
    Route::get('/form',function() {
        return view('form');
    // đặt tên cho route
    })->name('admin.form');
    Route::get('/unicode',function() {
        return 'phương thức get của unicode';
    });

    //nhóm của nhóm
    Route::prefix('product')->group(function(){
        Route::get('/',function() {
            return 'danh sach';
        });
        Route::get('/add',function() {
            return 'add';
        })->name('admin.product.add');
        Route::get('/update/{str?}-{id?}',function($str=null,$id=null) {
            $content = 'update với tham số:';
            $content .= 'str '. $str .= ' id:' . $id;
            return $content;
        //validate
        })->where(
            [
                'str'=>'.+',
                'id'=>'[0-9]+'
            ]
        )->name('admin.product.update');

    });
});
