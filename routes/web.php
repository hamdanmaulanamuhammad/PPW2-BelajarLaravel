<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Support\Facades\Storage;

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
})->name('welcome');

Route::get('/about', function () {
    return view('about', [
        'nama' => 'Anthony',
        'email' => 'elgasingsingsing@slebew.com'
    ]);
});

// routes/web.php
Route::get('/halo', function () {
    return view('halo', [
        'namaku' => 'Hamdan',
        'alamat' => 'Jogja'
    ]);
});

// Controller
Route::get('/posts', [PostController::class, 'index']);
Route::get('/students', [studentsController::class, 'index']);
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

// CRUD Buku
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

// Route untuk menampilkan gambar buku dari storage/app/gambar_buku
Route::get('/gambar_buku/{filename}', function ($filename) {
    $path = storage_path('app/gambar_buku/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file, 200)->header("Content-Type", $type);
})->name('gambar_buku');

// Pertemuan 8 Auth
Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

// Pertemuan 9 Middleware
Route::get('restricted', function () {
    return redirect(route('dashboard'))->with('success', 'Anda berusia lebih dari 18 tahun');
})->middleware('checkage');

// Pertemuan 10
Route::resource('users', UserController::class);
