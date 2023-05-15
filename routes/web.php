<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\ViewRenderController;
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



Route::view("/admin",'admin.dashboard')->name("dashboard")->middleware('auth');


Route::get("/login",[LoginController::class,'create'])->name('login');
Route::get("/register",[RegisterController::class,'create'])->name('register');
Route::post("/register",[RegisterController::class,'store']);
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout')->middleware("auth");



Route::get("/admin/estados",[EstadoController::class,'index'])->name('admin.estados')->middleware("auth");
Route::get("/admin/estados/create",[EstadoController::class,'create'])->name('estados.create')->middleware("auth");
Route::post("/admin/estados",[EstadoController::class,'store'])->name("estados.store")->middleware("auth");
Route::get("/admin/estados/{id}/edit",[EstadoController::class,'edit'])->name("estados.edit")->middleware("auth");
Route::put("/admin/estados/{id}",[EstadoController::class,'update'])->name("estados.update")->middleware("auth");
Route::delete("/admin/estados/{id}",[EstadoController::class,'destroy'])->name("estados.destroy")->middleware("auth");


Route::get("/admin/municipios",[MunicipioController::class,'index'])->name("admin.municipios")->middleware("auth");
Route::get("/admin/municipios/create",[MunicipioController::class,'create'])->name("municipios.create")->middleware("auth");
Route::post("/admin/municipios/",[MunicipioController::class,'store'])->name("municipios.store")->middleware("auth");
Route::delete("/admin/municipios/{id}",[MunicipioController::class,'destroy'])->name("municipios.destroy")->middleware("auth");
Route::get("/admin/municipios/{id}/edit",[MunicipioController::class,'edit'])->name("municipios.edit")->middleware("auth");
Route::put("/admin/municipios/{id}",[MunicipioController::class,'update'])->name("municipios.update")->middleware("auth");


Route::get("/admin/universidades",[UniversidadController::class,'index'])->name("admin.universidades")->middleware("auth");
Route::get("/admin/universidades/create",[UniversidadController::class,'create'])->name("universidades.create")->middleware("auth");
Route::post("/admin/universidades/",[UniversidadController::class,'store'])->name("universidades.store")->middleware("auth");
Route::delete("/admin/universidades/{id}",[UniversidadController::class,'destroy'])->name("universidades.destroy")->middleware("auth");
Route::get("/admin/universidades/{id}/edit",[UniversidadController::class,'edit'])->name("universidades.edit")->middleware("auth");
Route::put("/admin/universidades/{id}",[UniversidadController::class,'update'])->name("universidades.update")->middleware("auth");


Route::get("/",[ViewRenderController::class,'home'])->name("home");
Route::get("/{slug}",[ViewRenderController::class,'municipios'])->name("municipios");