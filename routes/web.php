<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InspectController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/home', [HomeController::class, 'redirect']);
Route::get('/', [HomeController::class, 'index']);

Route::middleware('can:User')->group(function () {

    Route::resource('inspect', InspectController::class);
});

Route::middleware('can:Admin')->group(function(){
    Route::resource('engineer',EngineerController::class);
    // Route::get('/daftar',[AdminController::class,'daftar']);
    // Route::post('/addengineer',[AdminController::class,'addengineer']);
    // Route::get('/engineerlist',[AdminController::class,'engineerlist']);
    // Route::get('/deleteengineer/{id}',[AdminController::class,'deleteengineer']);
    // Route::get('/updateengineer/{id}',[AdminController::class,'updateengineer']);
    // Route::post('/editengineer/{id}',[AdminController::class,'editengineer']);


});


