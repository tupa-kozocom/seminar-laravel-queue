<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\SendWelcomeEmail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/queue', function () {
    SendWelcomeEmail::dispatch();

    return 'Welcome to Seminar';

});

Route::get('/non-queue', function () {
    SendWelcomeEmail::dispatchSync();

    return '<br>Welcome to Seminar';

});

require __DIR__.'/auth.php';
