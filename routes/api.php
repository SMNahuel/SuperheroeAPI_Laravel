<?php

use App\Http\Controllers\SuperheroeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* ============================= Superheroes del usuario (GET, POST, PUT) ============================= */

Route::put('/mysuperheroe', [SuperheroeController::class, 'deleteSuperheroeByUser']);
Route::post('/mysuperheroe', [SuperheroeController::class, 'addSuperheroe']);
Route::get('/mysuperheroe/{idUser}', [SuperheroeController::class, 'getMySuperheroe']);
/* ==================================================================================================== */

/* ============================= Lista de superheroes ================================================= */

Route::get('/superheroe', [SuperheroeController::class, 'index']);
/* ==================================================================================================== */

/* ============================= Auth (Login y Register) ============================================== */

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
/* ==================================================================================================== */

/* ============================= Funciones User Profile  ============================================== */

Route::get('/user/info/{idUser}', [UserController::class, 'infoUser']);
Route::put('/user/info/{idUser}', [UserController::class, 'updateUser']);
/* ==================================================================================================== */

/* ============================= ABM (Usuarios ADMIN) ================================================= */

Route::get('/abm/user', [UserController::class, 'abmAllUser']);
Route::put('/abm/user/changeRol/', [UserController::class, 'abmUpdateRol']);
Route::delete('/abm/user/{idUser}', [UserController::class, 'abmDeleteUser']);
/* ==================================================================================================== */

/* ============================= ABM (Superheroe ADMIN) ================================================= */

Route::put('/abm/superheroe/{idSuperhero}', [SuperheroeController::class, 'abmUpdateSuperheroe']);
Route::delete('/abm/superheroe/{idSuperhero}', [SuperheroeController::class, 'abmDeleteSuperheroe']);
/* ==================================================================================================== */