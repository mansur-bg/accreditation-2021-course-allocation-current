<?php

use App\Mail\MyTestMail;
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

//Route::get('/', function () {
//    return view('accreditation.index');
//});

//Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
//Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');

Route::get('/', [App\Http\Controllers\Staff\IndexController::class, 'index'])->name('index');
Route::get('/login', [App\Http\Controllers\Staff\LoginController::class, 'index'])->name('login');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('test-mail', function () {
    $details = [
        'title' => 'Mail from '.env('APP_NAME'),
        'body' => 'This is for testing email using smtp'
    ];
    Mail::to('test@gmail.com')->send(new MyTestMail($details));
    echo("Email is Sent.");
})->name('test-mail');
