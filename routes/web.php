<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //modulos principales
    Route::get('/adoraciones_divinas', [DashboardController::class, 'adoraciones_divinas'])->name('adoraciones_divinas');
    Route::get('/curiosidades', [DashboardController::class, 'curiosidades'])->name('curiosidades');
    Route::get('/cultura', [DashboardController::class, 'cultura'])->name('cultura');
    Route::get('/terminos', [DashboardController::class, 'terminos'])->name('terminos');
});

Route::get('/usuarios', [AdminController::class, 'usuarios'])->name('usuarios');


Route::get('limpieza', function () {
    //$php = Artisan::call('up');
    $php  = Artisan::call('config:cache');
    $php1 = Artisan::call('view:clear');
    $php2 = Artisan::call('route:clear');
    //$php3 = Artisan::call('migrate');
    return Redirect::to('/');
});

Route::get('3jecut4rbds_f@j@l@', function(){
    //$php = Artisan::call('up');
    $php   = Artisan::call('db:seed');
    return redirect()->route('/');
});

//limpiar aplicacion por medio de crobs interno
Route::get('cr34rcache', function(){
    //$php = Artisan::call('up');
    $php   = Artisan::call('config:cache');
    $php1  = Artisan::call('view:cache');
    return redirect()->route('/');
});

//limpiar aplicacion por medio de crobs interno
Route::get('4ctu4l1z4r', function(){
    $php   = Artisan::call('optimize:clear');
    $php1  = Artisan::call('config:cache');
    $php2  = Artisan::call('view:cache');
    return redirect()->route('/');
});

Route::get('3jecut4rkey_f@j@l@', function(){
    //$php = Artisan::call('up');
    $php   = Artisan::call('key:generate');
    return redirect()->route('/');
});



require __DIR__ . '/auth.php';
