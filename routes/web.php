<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

##Controllers
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\JobApplicationsController;

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

    ##Rotas de vagas
    Route::get('v1/vagas',[JobsController::class, "index"]);
    Route::get('v1/vagas/cadastrar',[JobsController::class, "create"]);
    Route::post('v1/vagas/store',[JobsController::class,"store"]);
    Route::get('v1/vagas/{id}/edit',[JobsController::class,"edit"]);
    Route::delete('v1/vagas/{id}/delete',[JobsController::class, "destroy"]);

    ## Rotas candidaturas
    Route::get('v1/candidaturas',[JobApplicationsController::class, "index"]);
    Route::get('v1/candidaturas/cadastrar',[JobApplicationsController::class, "create"]);
    Route::post('v1/candidaturas/store',[JobApplicationsController::class, "store"]);
    Route::delete('v1/candidaturas/{id}/delete/all',[JobApplicationsController::class, "destroyAll"]);

    ## rota candidaturas/ranking
    Route::get('v1/vagas/{id}/candidaturas/ranking',[JobApplicationsController::class, "ranking"]);
    Route::delete('v1/vagas/*/candidaturas/{id}/ranking/delete',[JobApplicationsController::class, "destroy"]);
});
