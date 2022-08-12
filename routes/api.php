<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\StudentController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/test', function () {
    return "A";
});


Route::group(['prefix' => 'credo-app', 'middleware' => 'credo-app'], function () {

    Route::post('login', [UserController::class, 'login']);


    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('user', [UserController::class, 'getUser']);
        Route::post('save-fcm-token', [UserController::class, 'saveFcmToken']);
        

        Route::group(['prefix' => 'student-affairs'], function () {
            Route::get('student-list', [StudentController::class, 'studentAffairStudentList']);
            Route::get('reasons-list', [StudentController::class, 'studentAffairReasonList']);
            Route::post('student-affairs-form', [StudentController::class, 'submitStudentAffairsForm']);
            
            
        });


        








    });

});




