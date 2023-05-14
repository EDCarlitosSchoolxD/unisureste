<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
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
});


Route::view("/admin",'admin.dashboard')->name("dashboard")->middleware('auth');


Route::get("/login",[LoginController::class,'create'])->name('login');
Route::get("/register",[RegisterController::class,'create'])->name('register');
Route::post("/register",[RegisterController::class,'store']);
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');



Route::get("/admin/estados",[EstadoController::class,'index'])->name('admin.estados');
Route::get("/admin/estados/create",[EstadoController::class,'create'])->name('estados.create');
Route::post("/admin/estados",[EstadoController::class,'store'])->name("estados.store");
Route::get("/admin/estados/{id}/edit",[EstadoController::class,'edit'])->name("estados.edit");
Route::put("/admin/estados/{id}",[EstadoController::class,'update'])->name("estados.update");
Route::delete("/admin/estados/{id}",[EstadoController::class,'destroy'])->name("estados.destroy");


Route::get("/admin/municipios",[MunicipioController::class,'index'])->name("admin.municipios");
Route::get("/admin/municipios/create",[MunicipioController::class,'create'])->name("municipios.create");
Route::post("/admin/municipios/",[MunicipioController::class,'store'])->name("municipios.store");
Route::delete("/admin/municipios/{id}",[MunicipioController::class,'destroy'])->name("municipios.destroy");
Route::get("/admin/municipios/{id}/edit",[MunicipioController::class,'edit'])->name("municipios.edit");
Route::put("/admin/municipios/{id}",[MunicipioController::class,'update'])->name("municipios.update");