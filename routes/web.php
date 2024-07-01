<?php

use Illuminate\Support\Facades\Route;
use App\Mail\CobaEmail;
use Illuminate\Support\Facades\Mail;

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
Route::get('tes-mail',function(){
    try {
        Mail::to('wisnubaldas@gmail.com')->send(new CobaEmail());
        dd('Sukses kirim email');
    } catch (\Exception $e) {
        dd($e);
    }
    
});

Auth::routes();
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

