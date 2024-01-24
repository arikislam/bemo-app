<?php

use App\Http\Controllers\API\Card\CreateCardController;
use App\Http\Controllers\API\Card\UpdateCardController;
use App\Http\Controllers\API\Card\UpdateCardOrderController;
use App\Http\Controllers\API\CardList\CreateNewListController;
use App\Http\Controllers\API\CardList\DeleteListController;
use App\Http\Controllers\API\CardList\GetListDetailsController;
use App\Http\Controllers\API\CardList\UpdateLIstOrderController;
use App\Http\Controllers\API\Manage\DumpDatabaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/lists', GetListDetailsController::class);
Route::post('/lists', CreateNewListController::class);
Route::delete('/lists/{list}', DeleteListController::class);
Route::post('/lists-order-update', UpdateLIstOrderController::class);

Route::post('/cards', CreateCardController::class);
Route::patch('/cards/{card}', UpdateCardController::class);
Route::post('/cards-order-update', UpdateCardOrderController::class);

Route::post('dump-db', DumpDatabaseController::class);
