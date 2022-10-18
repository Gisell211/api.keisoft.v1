<?php

use App\Http\Controllers\API\AdopcionController;
use App\Http\Controllers\API\EspecieController;
use App\Http\Controllers\API\FundacionController;
use App\Http\Controllers\API\NoticiaController;
use App\Http\Controllers\API\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('users',UserController::class)->names('api.v1.users');
Route::apiResource('noticias',NoticiaController::class)->names('api.v1.noticias');
Route::apiResource('adopciones',AdopcionController::class)->names('api.v1.adopciones');
Route::apiResource('especies',EspecieController::class)->names('api.v1.especies');
Route::apiResource('fundaciones',FundacionController::class)->names('api.v1.fundaciones');