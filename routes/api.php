<?php

use App\Http\Controllers\ContactController;
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

// api route to get contact details in DB table contacts
// include functionality to create and delete conacts from the DB
Route::get('/contacts', [ContactController::class, 'index']);
Route::prefix('/contact')->group(function () {
        Route::post('/store', [ContactController::class, 'store']);
        Route::delete('/{id}', [ContactController::class, 'destroy']);
    }
);

// this Route will post to send an email to our Mailtrap api we using 
Route::post('/send-contact', [ContactController::class, 'send']);
