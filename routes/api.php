<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

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


Route::group(['prefix' => '/user', 'middleware'=>['guest:api'], 'namespace' => 'Api' ], function(){

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']); // password Reset Link Send by email
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::get('/verify-email', [AuthController::class, 'verifyEmail'])
    ->middleware('signed')
    ->name('verification.verify');

    Route::post('/contact', [ContactController::class, 'contactFrom']);

});

Route::group(['prefix' => '/user', 'middleware'=>['auth:api'], 'namespace' => 'Api'  ], function(){

    // User information
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'current_user']);
    Route::post('/resend-verification-email', [AuthController::class, 'resendVerificationEmail']);
    Route::post('/update-profile', [AuthController::class, 'update_profile']);
    // Route::post('/update-profile', [AuthController::class, 'update_profile']);
    // Route::post('/update-profile-pic', [AuthController::class, 'update_profile_pic']);
    Route::get('/all-user', [AuthController::class, 'all_user']);
    // Route::post('/add-new-user', [AuthController::class, 'add_new_user']); // Note work
    // Route::post('/delete', [AuthController::class, 'delete']); // Note work

    // Route::get('/user-list-for-select2', [AuthController::class, 'user_list_for_select2']);



// Task api ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/task'], function () {
        Route::get('/task-list', [TaskListController::class, 'task_list']); // Read all task by search & pagination
        Route::post('/store', [TaskListController::class, 'store']); // add task
        Route::post('/update', [TaskListController::class, 'update']);

        Route::post('/success-task', [TaskListController::class, 'success_task']);

        Route::get('/get/{id}', [TaskListController::class, 'get']);  // Read current user task
        Route::post('/delete', [TaskListController::class, 'delete']);
        Route::post('/delete-multi', [TaskListController::class, 'delete_multi']);
    });

// ContactMessage api ( Read & Delete )
    Route::group(['prefix' => '/sms'], function () {
        Route::get('/messages', [ContactController::class, 'allMessage']); // Read all message by pagination(10/per page)
        Route::post('/delete', [ContactController::class, 'delete']);
        Route::post('/delete-multi', [ContactController::class, 'delete_multi']);
    });


});

Route::get('/test', function() {
    return "heyyy this is a very secret router";
})->middleware('auth:api','verified');
