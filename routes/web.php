<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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
    return view('auth.login');
});

Auth::routes();
//商品一覧画面
Route::post('/list', [App\Http\Controllers\ProductsController::class, 'showList'])->name('login_list');
//商品一覧画面
Route::get('/list', [App\Http\Controllers\ProductsController::class, 'showList'])->name('list');
//商品登録画面
Route::get('/regist', [App\Http\Controllers\ProductsController::class, 'showRegistForm'])->name('regist');
//商品登録処理
Route::post('/regist', [App\Http\Controllers\ProductsController::class, 'registSubmit'])->name('submit');
//商品詳細画面
Route::get('/detail/{id}', [App\Http\Controllers\ProductsController::class, 'detaillist'])->name('detail');
//商品編集画面
Route::get('/edit/{id}', [App\Http\Controllers\ProductsController::class, 'editlist'])->name('edit');
//商品更新処理
Route::post('/update/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->name('update');
//商品削除処理
Route::post('/destroy/{id}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('destroy');
//companiesテーブル表示
Route::get('/companieslist', [App\Http\Controllers\CompaniesController::class, 'showList'])->name('companieslist');
//salesテーブル表示
Route::get('/saleslist', [App\Http\Controllers\SalesController::class, 'showList'])->name('saleslist');

Route::get('/detail', [App\Http\Controllers\ProductsController::class, 'detail'])->name('detaillist');
