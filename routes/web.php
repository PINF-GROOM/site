<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/admin/login', function () {
    return view('login');
});

Route::get('/maintenance', function () {
    return view('maintenance');
});

// Dev only :
Route::get('/demo', function () {
    return view('demo');
});

Route::get('/a', function () {
    return view('demo');
})->middleware('auth');

Route::get('/sa', function () {
    return view('demo');
})->middleware('sadmin');

require __DIR__.'/auth.php';

Route::get('/error', function () {
    return view('error');
});
