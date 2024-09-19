<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\studentsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/about', function () {
    return view('about',[
        'nama'=>'Anthony',
        'email'=>'elgasingsingsing@slebew.com']
    );
});

// routes/web.php
Route::get('/halo', function () {
    return view('halo',[
        'namaku'=>'Hamdan',
        'alamat'=>'Jogja'
    ]);
});

// Controller
Route::get('/posts',[PostController::class,'index']); 

Route::get('/students',[studentsController::class,'index']); 

Route::get('/buku',[BukuController::class,'index']);

//crud model
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');



