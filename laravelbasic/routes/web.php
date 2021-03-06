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
use App\Http\Controllers\UserController;
use App\Http\Controllers\SendMailController;



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
Route::get('send-mail', [SendMailController::class,'sendMail']);

Route::get('config-mail',[SendMailController::class,'configMail']);
Route::post('test-mail',[SendMailController::class,'testMail']);


Route::prefix('users')->name('users.')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('index');

    Route::get('/add',[UserController::class,'add'])->name('add');

    Route::post('/add',[UserController::class,'postAdd'])->name('postAdd');

    Route::get('/edit/{id}',[UserController::class,'getEdit'])->name('getEdit');

    Route::post('/update',[UserController::class,'postEdit'])->name('postEdit');

    Route::get('/delete/{id}',[UserController::class,'delete'])->name('delete');


});
Route::get('/info',function(){
    return view('info');
});

Route::get('/',[ClientsController::class,'index'])->name('home');

Route::get('/san-pham',[ProductController::class,'index'])->name('san-pham');

Route::get('/them',[ClientsController::class,'getAdd']);

Route::post('/them',[ClientsController::class,'postAdd'])->name('post-add');

// Route::put('/them',[ClientsController::class,'putAdd']);

Route::get('demo-response',function () {
    // return view('clients.demo_test');
    return $response = response()->view('clients.demo_test',['title'=>'h???c http'],201)
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

//     //danh s??ch chuy??n m???c
//     Route::get('/',[CategorisController::class,'index'])->name('categories.list');

//     //l???y chi ti???t 1 chuy??n m???c
//     Route::get('edit/{id}',[CategorisController::class,'getCategory'])->name('categories.edit');

//     //x??? l?? update chuy??n m???c
//     Route::post('edit/{id}',[CategorisController::class,'updateCategory']);

//     //hi???n th??? form add d??? li???u
//     Route::get('/add',[CategorisController::class,'addCategory'])->name('categories.add');

//     //x??? l?? add d??? li???u
//     Route::post('/add',[CategorisController::class,'handleAddCategory']);

//     //x??a chuy??n m???c
//     Route::delete('/delete/{id}',[CategorisController::class,'deleteCategory'])->name('categories.delete');

//     // hi???n th??? form upload
//     Route::get('/upload',[CategorisController::class,'getFile']);

//     // x??? l?? file
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
//     return 'Ph????ng th???c post c???a form';
// });

// Route::put('/form',function(){
//     return 'Ph????ng th???c put c???a form';
// });
// Route::delete('/form',function(){
//     return 'Ph????ng th???c delete c???a form';
// });

// nh???n nhi???u req
// Route::match(['get','post'], '/form',function(){
//     return $_SERVER['REQUEST_METHOD'];
// });

// Route::any('form',function(Request $request){
//     return $request->method();
// });

// Route::get('/form',function() {
//         return view('form');
//     });

// chuy???n h?????ng
// Route::redirect('unicode','form');

// h??? tr??? get
// Route::view('show-form','form');

// g???i controller
// Route::get('/', 'App\Http\Controllers\homeController@index')->name('home');

// Route::get('/game', 'homeController@getGames')->name('game');

// Route::get('/tin-tuc/{id}', [homeController::class,'getNews'])->name('news');


// // nh??m
// Route::prefix('admin')->middleware('checkproduct')->group(function(){
//     Route::get('/',function() {
//         return 'admin';
//     });
//     Route::get('/form',function() {
//         return view('form');
//     // ?????t t??n cho route
//     })->name('admin.form');
//     Route::get('/unicode',function() {
//         return 'ph????ng th???c get c???a unicode';
//     });

//     //nh??m c???a nh??m
//     Route::prefix('product')->group(function(){
//         Route::get('/',function() {
//             return 'danh sach';
//         });
//         Route::get('/add',function() {
//             return 'add';
//         })->name('admin.product.add');
//         Route::get('/update/{str?}-{id?}',function($str=null,$id=null) {
//             $content = 'update v???i tham s???:';
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
