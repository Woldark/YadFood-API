<?php

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
Route::resources([

    'students' => 'API\StudentController',
    'foods' => 'API\FoodController',
    'reserves' => 'API\ReserveController',
    'restaurants' => 'API\RestaurantController',
    'transactions' => 'API\TransactionController',
    'wallets' => 'API\WalletController'

]);