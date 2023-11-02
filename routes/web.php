<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

##Controllers
use App\Http\Controllers\CandidatesController;

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

Route::group(['middleware' => "web"],function(){
    Route::get('/',[HomeController::class, "index"]);

    Auth::routes();
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => 'auth'],function(){

    #Rotas candidatos
    Route::get('v1/pessoas',[CandidatesController::class, "index"]);
    Route::get("v1/pessoas/cadastrar",[CandidatesController::class, "create"]);
    Route::post("v1/pessoas/store",[CandidatesController::class, "store"]);
    Route::get('v1/pessoas/{id}/edit',[CandidatesController::class,"edit"]);
    Route::delete('v1/pessoas/{id}/delete',[CandidatesController::class,"destroy"]);
});
