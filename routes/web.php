<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\registerArgumentsSet;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class,'home'])->name('home');


Route::prefix('order')->group(function (){
    Route::get('/', [App\Http\Controllers\OrderController::class,'index'])->name('index');

    Route::get('/create/{id}', [App\Http\Controllers\OrderController::class,'order'])->name('order');
    Route::post('/create/{id}', [App\Http\Controllers\OrderController::class,'order'])->name('order');
    Route::post('/delete/{id}', [App\Http\Controllers\OrderController::class,'delete'])->name('delete');
});


Route::prefix('stock_movements')->group(function (){
    Route::get('/',[App\Http\Controllers\StockMovementController::class,'index'])->name('index');

    Route::get('/shipping/{id}', [App\Http\Controllers\StockMovementController::class,'shipping'])->name('shipping');
    Route::post('/shipping/{id}', [App\Http\Controllers\StockMovementController::class,'shipping'])->name('shipping');

});
    Route::prefix('suppliers')->group(function (){
        Route::get('/',[App\Http\Controllers\SuppliersController::class, 'index']);
        Route::get('/store',[App\Http\Controllers\SuppliersController::class, 'store']);
        Route::post('/store',[App\Http\Controllers\SuppliersController::class, 'store']);
        Route::post('/delete/{id}', [App\Http\Controllers\SuppliersController::class, 'delete']);
    });

Route::prefix('account')->group(function (){
    Route::get('/register',[\App\Http\Controllers\UserController::class,'register']);
    Route::post('/register',[\App\Http\Controllers\UserController::class,'register'])->name('register');

    Route::get('/login',[\App\Http\Controllers\UserController::class,'login'])->name('loginIndex');
    Route::post('/login',[\App\Http\Controllers\UserController::class,'login'])->name('login');

    Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout');
});

//ログインユーザーのみ
Route::group(['middleware'=>['auth']],function(){
    Route::prefix('myPage')->group(function(){
        Route::get('/setup/{id}',[\App\Http\Controllers\UserController::class,'setup']);
        Route::post('/setup/{id}',[\App\Http\Controllers\UserController::class,'setup']);
    });
});

// 管理者ユーザーのみ
Route::group(['middleware'=>['auth','can:admin']],function(){
    //商品管理
    Route::prefix('items')->group(function () {
        Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
        Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
        Route::get('/detail/{id}', [App\Http\Controllers\ItemController::class, 'detail']);
        Route::post('/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete']);
        Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class,'edit']);
        Route::post('/edit/{id}', [App\Http\Controllers\ItemController::class,'edit']);
    });

    //ユーザー管理
    Route::prefix('users')->group(function (){
        Route::get('/',[App\Http\Controllers\UserController::class, 'index']);
        Route::post('/', [App\Http\Controllers\UserController::class, 'index']);
        Route::get('/edit/{id}', [App\Http\Controllers\UserController::class,'edit']);
        Route::post('/edit/{id}', [App\Http\Controllers\UserController::class,'edit']);
        Route::post('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);
    });

    Route::prefix('suppliers')->group(function (){
        Route::get('/',[App\Http\Controllers\SuppliersController::class, 'index']);
        Route::get('/store',[App\Http\Controllers\SuppliersController::class, 'store']);
        Route::post('/store',[App\Http\Controllers\SuppliersController::class, 'store']);
        Route::post('/delete/{id}', [App\Http\Controllers\SuppliersController::class, 'delete']);
    });
    

});