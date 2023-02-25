<?php

use App\Jobs\SendWelcomeEmail;
use App\Jobs\SendWelcomeEmailFailed;
use Illuminate\Support\Facades\Route;

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

// Queue
Route::get('/queue', function () {
    SendWelcomeEmail::dispatch();

    return 'Welcome to Seminar';

});

// Non-queue
Route::get('/non-queue', function () {
    SendWelcomeEmail::dispatchSync();

    return '<br>Welcome to Seminar';

});

// Failed Queue
Route::get('/failed-queue', function () {
    SendWelcomeEmailFailed::dispatch();

    return 'Failed Job...';
});


require __DIR__.'/auth.php';
