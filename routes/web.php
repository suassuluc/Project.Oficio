<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProtocolosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Livewire\ListOficio;
use App\Livewire\Resol;
use App\Livewire\Ci;


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

/*Route::get('/procolos/home', [HomeController::class, 'index']->name('protocolo.home') {
    return view('pages.protocolos.home');
});*/




Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::redirect('/', 'home');
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('protocolos.home');
    Route::get('/home', ListOficio::class)->name('protocolos.home');
    Route::get('/resol', Resol::class);
    Route::get('/ci', Ci::class);

    //rotas de protocolos
    Route::get('/protocolos/create',[ProtocolosController::class, 'create'])->name('protocolos.create');
    Route::post('/protocolos/store',[ProtocolosController::class,'store'])->name('protocolos.store');
    //rotas de usuarios
    Route::get('/usuarios/index',[UserController::class,'index'])->name('usuarios.index');


});
