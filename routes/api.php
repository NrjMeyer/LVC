<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CommandeController;

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

Route::get('commands', [CommandeController::class, 'index']);
Route::group(['prefix' => 'command'], function () {
    Route::post('add', [CommandeController::class, 'add']);
    Route::get('edit/{id}', [CommandeController::class, 'edit']);
    Route::post('update/{id}', [CommandeController::class, 'update']);
    Route::delete('delete/{id}', [CommandeController::class, 'delete']);
});
