<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Controller;
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

Route::group(['middleware' => 'api', 'namespace' => Controller::class], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('collections', [CollectionController::class, 'getCollections'])->name('collections');
    Route::post('store-collection', [CollectionController::class, 'storeCollection'])->name('store-collection');
});