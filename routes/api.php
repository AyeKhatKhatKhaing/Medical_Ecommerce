<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\CheckMailsController;
use App\Http\Controllers\Api\CheckPhonesController;
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

Route::group(['prefix' => 'user'], function () {
    Route::post('/email-login', [LoginController::class, 'emailLogin']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('/check-mail', [CheckMailsController::class, 'check']);

    Route::post('/phno-login', [LoginController::class, 'phnoLogin']);
    Route::post('/check-phno', [CheckPhonesController::class, 'check']);
    Route::post('/check-otp', [CheckPhonesController::class, 'checkOTP']);
    Route::post('/phno-register', [RegisterController::class, 'phLogin']);
    // Route::post('/phno-with-password', [RegisterController::class, 'phLoginWithPwd']);

    Route::post('/check-reset-phno', [CheckPhonesController::class, 'checkResetPhone']);
    Route::post('/reset-pass', [RegisterController::class, 'ResetPass']);
    Route::post('/check-reset-email', [CheckPhonesController::class, 'checkResetEmail']);
    Route::post('/check-mail-otp', [CheckPhonesController::class, 'checkMailOTP']);
    Route::post('google-register', [RegisterController::class, 'googleRegister']);
    Route::post('facebook-register', [RegisterController::class, 'facebookRegister']);

    Route::post('/check-phone', [CheckPhonesController::class, 'checkPhone']);
    Route::post('/check-phone-otp', [CheckPhonesController::class, 'checkPhoneOTP']);
});


Route::get('/test', function () {
    return auth('sanctum')->check() ? "Auth" : "Guest";
})->middleware('auth:sanctum');


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
