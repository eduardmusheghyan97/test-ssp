<?php

use App\Http\Controllers\{PostController, SubscriberController};
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('subscriber')
    ->name('subscriber.')
    ->group(function () {
        Route::post('/create', [SubscriberController::class, 'create'])->name('create');
        Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
    });
Route::prefix('website/{websiteID}')
    ->name('website.')
    ->group(function () {
        Route::post('/post/create', [PostController::class, 'create'])->name('post.create');
    });

