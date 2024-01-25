<?php

use App\Http\Controllers\API\Card\CreateCardController;
use App\Http\Controllers\API\Card\UpdateCardController;
use App\Http\Controllers\API\Card\MoveCardController;
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



Route::group(['prefix' => 'lists'], function () {
    Route::get('/', GetListDetailsController::class);
    Route::post('/', CreateNewListController::class);
    Route::post('/order-update', UpdateListOrderController::class);
    Route::delete('/{cardList}', DeleteListController::class);

    Route::prefix('{cardList}/cards')->group(function () {
        Route::post('/', CreateCardController::class);
        Route::post('/order-update', UpdateCardOrderController::class);
        Route::patch('/{card}', UpdateCardController::class);
        Route::post('/{card}/move', MoveCardController::class);
    });
});

Route::post('/dump-db', DumpDatabaseController::class);
