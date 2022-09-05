<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Livewire\Form;

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

/*管理画面*/
Route::get('/manage', [ContactController::class, 'manage'])->name('manage');
Route::post('/manage', [ContactController::class, 'manage'])->name('manage');
Route::get('/search', [ContactController::class, 'search'])->name('search');
Route::post('/search', [ContactController::class, 'search'])->name('search');
Route::post('/delete/{id}', [ContactController::class, 'delete'])->name('delete');

Route::get('form', function () {
    return view('contactform');
});
