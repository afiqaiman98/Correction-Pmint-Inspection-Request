<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CubaController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\InspectController as UserInspectController;
use App\Http\Controllers\Engineer\InspectController as EngineerInspectController;
use App\Http\Controllers\UserController;
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

Route::middleware('can:User')->name('user.')->group(function () {

    Route::resource('inspect', UserInspectController::class);
});

Route::middleware('can:UserAndEngineer')->name('engineer.')->group(function () {

    // Route::get('/index', EngineerInspectController::class, 'index');
    Route::get('/index/engineer', [EngineerInspectController::class, 'index'])->name('inspect.index');
    Route::get('/try/engineer', [EngineerInspectController::class, 'try'])->name('inspect.try');
    Route::post('/store/engineer/{id}', [EngineerInspectController::class, 'store'])->name('inspect.store');
});

// Route::middleware('can:UserAndEngineer')

Route::middleware('can:Admin')->group(function () {
    Route::resource('engineer', EngineerController::class);
    Route::get('/index', [UserController::class, 'index']);
    // Route::get('/try',[TryController::class,''])
    // Route::get('/daftar',[AdminController::class,'daftar']);
    // Route::post('/addengineer',[AdminController::class,'addengineer']);
    // Route::get('/engineerlist',[AdminController::class,'engineerlist']);
    // Route::get('/deleteengineer/{id}',[AdminController::class,'deleteengineer']);
    // Route::get('/updateengineer/{id}',[AdminController::class,'updateengineer']);
    // Route::post('/editengineer/{id}',[AdminController::class,'editengineer']);


});
