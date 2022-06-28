<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\homeController;
use App\Http\Controllers\CategorisController;
use App\Http\Controllers\Admin\ProductsController;
use Whoops\Run;
use App\Http\Controllers\BladeController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductController;



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

Route::get('/',[ClientsController::class,'index'])->name('home');

Route::get('/san-pham',[ProductController::class,'index'])->name('san-pham');

Route::get('/them',[ClientsController::class,'getAdd']);

Route::post('/them',[ClientsController::class,'postAdd'])->name('post-add');

// Route::put('/them',[ClientsController::class,'putAdd']);

Route::get('demo-response',function () {
    // return view('clients.demo_test');
    return $response = response()->view('clients.demo_test',['title'=>'học http'],201)
    ->header('Content-Type','application/json')
    ->header('Api-Key','123456');
});

Route::get('demo-response-2',function(Request $request) {
    return $request->cookie('unicode');
});

Route::get('download-image',[ClientsController::class,'downloadImage'])->name('download-image');

// Route::get('/blade',[BladeController::class,'index']);

// //client Route
// Route::prefix('categories')->group(function(){

//     //danh sách chuyên mục
//     Route::get('/',[CategorisController::class,'index'])->name('categories.list');

//     //lấy chi tiết 1 chuyên mục
//     Route::get('edit/{id}',[CategorisController::class,'getCategory'])->name('categories.edit');

//     //xử lý update chuyên mục
//     Route::post('edit/{id}',[CategorisController::class,'updateCategory']);

//     //hiển thị form add dữ liệu
//     Route::get('/add',[CategorisController::class,'addCategory'])->name('categories.add');

//     //xử lí add dữ liệu
//     Route::post('/add',[CategorisController::class,'handleAddCategory']);

//     //xóa chuyên mục
//     Route::delete('/delete/{id}',[CategorisController::class,'deleteCategory'])->name('categories.delete');

//     // hiển thị form upload
//     Route::get('/upload',[CategorisController::class,'getFile']);

//     // xử lí file
//     Route::post('/upload',[CategorisController::class,'handleFile'])->name('categories.upload');
// });

// // admin route middleware
// Route::middleware('auth.admin')->prefix('admin')->group(function(){
//     Route::resource('product', ProductsController::class);
// });

// Route::get('/',[homeController::class,'index']);

// Route::get('sp/{id}',[homeController::class,'getProductDetail']);
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/unicode',function(){
//     // $user = new User();
//     // $allUser = $user::all();
//     // dd($allUser);
//     return view('home');
// });

// Route:: get('/san-pham',function(){
//     return view('product');
// });

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
// Route::get('/', 'App\Http\Controllers\homeController@index')->name('home');

// Route::get('/game', 'homeController@getGames')->name('game');

// Route::get('/tin-tuc/{id}', [homeController::class,'getNews'])->name('news');


// // nhóm
// Route::prefix('admin')->middleware('checkproduct')->group(function(){
//     Route::get('/',function() {
//         return 'admin';
//     });
//     Route::get('/form',function() {
//         return view('form');
//     // đặt tên cho route
//     })->name('admin.form');
//     Route::get('/unicode',function() {
//         return 'phương thức get của unicode';
//     });

//     //nhóm của nhóm
//     Route::prefix('product')->group(function(){
//         Route::get('/',function() {
//             return 'danh sach';
//         });
//         Route::get('/add',function() {
//             return 'add';
//         })->name('admin.product.add');
//         Route::get('/update/{str?}-{id?}',function($str=null,$id=null) {
//             $content = 'update với tham số:';
//             $content .= 'str '. $str .= ' id:' . $id;
//             return $content;
//         //validate
//         })->where(
//             [
//                 'str'=>'.+',
//                 'id'=>'[0-9]+'
//             ]
//         )->name('admin.product.update');

//     });
// });
