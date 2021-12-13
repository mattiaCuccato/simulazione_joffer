<?php

use App\Http\Controllers\OfferController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/list", [OfferController::class,"view_offers"]);
Route::get("/detail/{id}", [OfferController::class,"detail_offer"]);
Route::post("/insert", [OfferController::class,"insert_offer"]);
Route::put("/update/{id}", [OfferController::class,"update_offer"]);
Route::delete("/delete/{id}", [OfferController::class,"delete_offer"]);
