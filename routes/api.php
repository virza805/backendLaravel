<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FooterTopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\TaskListController;
use App\Http\Controllers\OrderController;
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
    Route::get('/frontend-footer', [FooterController::class, 'frontend_footer']); // Read all footer data in frontend

});

Route::group(['prefix' => '/user', 'middleware'=>['auth:api'], 'namespace' => 'Api'  ], function(){

    // User information
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'current_user']);
    Route::post('/resend-verification-email', [AuthController::class, 'resendVerificationEmail']);
    Route::put('/update-profile/{id}', [AuthController::class, 'update']);
    // Route::post('/update-profile', [AuthController::class, 'update_profile']);
    // Route::post('/update-profile-pic', [AuthController::class, 'update_profile_pic']);
    Route::get('/all-user', [AuthController::class, 'all_user']);
    // Route::post('/add-new-user', [AuthController::class, 'add_new_user']); // Note work
    // Route::post('/delete', [AuthController::class, 'delete']); // Note work

    // Route::get('/user-list-for-select2', [AuthController::class, 'user_list_for_select2']);


    // Admin all user api ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/s_admin'], function () {

        Route::get('/backend-user-list', [AdminUserController::class, 'all_user']); // Read Admin all user data by user
        Route::post('/store', [AdminUserController::class, 'store']); // admin add user data
        Route::get('/get/{id}', [AdminUserController::class, 'get']);  // Read single user data

        Route::put('/update/{id}', [AdminUserController::class, 'update']);
        Route::post('/delete', [AdminUserController::class, 'delete']);

        Route::post('/delete-multi', [AdminUserController::class, 'delete_multi']);

    });


    // Task api ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/task'], function () {
        Route::get('/task-list', [TaskListController::class, 'task_list']); // Read all task by search & pagination
        Route::post('/store', [TaskListController::class, 'store']); // add task
        Route::put('/update/{id}', [TaskListController::class, 'update']);

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


    // Footer api ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/footer'], function () {

        Route::get('/backend-footer-list', [FooterController::class, 'backend_footer_list']); // Read all footer data
        Route::post('/store', [FooterController::class, 'store']); // add footer data
        Route::get('/get/{id}', [FooterController::class, 'get']);  // Read current user footer data

        Route::put('/update/{id}', [FooterController::class, 'update']);
        Route::post('/delete', [FooterController::class, 'delete']);

    });
    // Footer Top & Opening Houre api ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/footer-top'], function () {

        Route::get('/backend-footer-list', [FooterTopController::class, 'backend_footer_list']); // Read all footer data
        Route::post('/store', [FooterTopController::class, 'store']); // add footer data
        Route::get('/get/{id}', [FooterTopController::class, 'get']);  // Read current user footer data

        Route::put('/update/{id}', [FooterTopController::class, 'update']);
        Route::post('/delete', [FooterTopController::class, 'delete']);

    });

    // Categories api ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/cat'], function () {

        Route::get('/backend-cat-list', [CategoriesController::class, 'backendShowList']); // Read all Categories data by user
        Route::post('/store', [CategoriesController::class, 'store']); // add Categories data
        Route::get('/get/{id}', [CategoriesController::class, 'get']);  // Read current user Categories data

        Route::put('/update/{id}', [CategoriesController::class, 'update']);
        Route::post('/delete', [CategoriesController::class, 'delete']);

        Route::post('/delete-multi', [CategoriesController::class, 'delete_multi']);
        Route::post('/add-buy-get', [CategoriesController::class, 'use']);
        Route::post('/remove-buy-get', [CategoriesController::class, 'un_use']);

    });

    // Sub Categories api ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/sub-cat'], function () {

        Route::get('/backend-sub-cat-list', [SubCategoriesController::class, 'backendShowList']); // Read all Categories data by user
        Route::post('/store', [SubCategoriesController::class, 'store']); // add Categories data
        Route::get('/get/{id}', [SubCategoriesController::class, 'get']);  // Read current user Categories data

        Route::put('/update/{id}', [SubCategoriesController::class, 'update']);
        Route::post('/delete', [SubCategoriesController::class, 'delete']);

    });

    // Slider & Buy 1 Get 1 api ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/slider'], function () {

        Route::get('/backend-slider-list', [SliderController::class, 'backendShowList']); // Read all Categories data by user
        Route::post('/store', [SliderController::class, 'store']); // add Categories data
        Route::get('/get/{id}', [SliderController::class, 'get']);  // Read current user Categories data

        Route::put('/update/{id}', [SliderController::class, 'update']);
        Route::post('/delete', [SliderController::class, 'delete']);

        Route::post('/delete-multi', [SliderController::class, 'delete_multi']);
        Route::post('/add-buy-get', [SliderController::class, 'use']);
        Route::post('/remove-buy-get', [SliderController::class, 'un_use']);

    });

    // Product ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/product'], function () {

        Route::get('/backend-product-list', [ProductController::class, 'backendShowList']); // Read all Product data by user
        Route::post('/store', [ProductController::class, 'store']); // add Product data
        Route::get('/get/{id}', [ProductController::class, 'get']);  // Read current user Product data

        Route::put('/update/{id}', [ProductController::class, 'update']);
        Route::post('/delete', [ProductController::class, 'delete']);

        Route::post('/delete-multi', [ProductController::class, 'delete_multi']);
        Route::post('/add-buy-get', [ProductController::class, 'use']);
        Route::post('/remove-buy-get', [ProductController::class, 'un_use']);

    });

    // Order ( Create, Read, Update, Delete )
    Route::group(['prefix' => '/order'], function () {
        Route::post('/store', [OrderController::class, 'stripeOrder']); // add Order data
        Route::get('/invoice/{id}', [OrderController::class, 'generateInvoice']); // download Order data
        Route::get('/show/{id}', [OrderController::class, 'showInvoice']); // view Order data
        Route::get('/order', [OrderController::class, 'show']); // show all Order data

    });





});

Route::get('/test', function() {
    return "heyyy this is a very secret router";
})->middleware('auth:api','verified');


// Show this route for all user ( Login Or without Login )

Route::group(['prefix' => '/all' ], function() {
    Route::get('/client-footer', [FooterController::class, 'frontend_footer']); // Read all footer data in frontend
    Route::get('/client-footer-top', [FooterTopController::class, 'frontend_footer']); // Read 1st 4 footer data in frontend
    Route::get('/client-footer-open-time', [FooterTopController::class, 'frontend_footer_open_time']); // Read last 4 footer data in frontend
    Route::get('/client-categories', [CategoriesController::class, 'frontendShow']); // Read Categories data in frontend
    Route::get('/client-footer-top-cat', [CategoriesController::class, 'frontendShowBeforeFooter']); // Read Categories data in frontend

    Route::get('/client-sub-categories', [SubCategoriesController::class, 'frontendShow']); // Read Sub Categories data in frontend
    Route::get('/client-slider', [SliderController::class, 'frontendShow']); // Read all slider data in frontend
    Route::get('/client-buy-get', [SliderController::class, 'buyOneGetOne']); // Read all slider->use data in frontend
    Route::get('/client-product', [ProductController::class, 'frontendShow']); // Read all slider->use data in frontend
    Route::get('/client-cat-product/{id}', [ProductController::class, 'frontendShowCatP']); // Read Categories ways product data Show in frontend
    Route::get('/get/{id}', [CategoriesController::class, 'get']);  // Read Category data
    Route::get('/client-product-detail/{id}', [ProductController::class, 'get']);  // Read current user Categories data
});
