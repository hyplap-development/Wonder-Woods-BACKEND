<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('login', [AuthController::class, 'login']);
    Route::post('auth', [AuthController::class, 'checkUser'])->name('auth');
    Route::get('forgetPassword', [AuthController::class, 'showforget']);
    Route::post('forgetPassword', [AuthController::class, 'forgetpassword']);
    Route::post('changePassword', [AuthController::class, 'changepassword']);
    Route::post('getSubCategories', [Controller::class, 'getSubCategories']);


    Route::group([
        'middleware' => 'checkUserr'
    ], function () {

        Route::get('resetP', [AdminController::class, 'resetPassIndex']);
        Route::post('resetPass', [AdminController::class, 'resetPass']);
        Route::post('checkPhone', [AdminController::class, 'checkPhone']);
        Route::post('checkEmail', [AdminController::class, 'checkEmail']);
        Route::post('checkPass', [AdminController::class, 'checkPass']);
        Route::post('checkCatName', [AdminController::class, 'checkCatName']);
        Route::post('checkSubCatName', [AdminController::class, 'checkSubCatName']);
        Route::post('checkProdName', [AdminController::class, 'checkProdName']);

        Route::get('dashboard', [AdminController::class, 'indexAdmin']);

        //User
        Route::group([
            'prefix' => 'user'
        ], function () {
            Route::get('', [AdminController::class, 'indexUser']);
            Route::post('add', [AdminController::class, 'addUser']);
            Route::post('update', [AdminController::class, 'updateUser']);
            Route::post('delete', [AdminController::class, 'deleteUser']);
            Route::get('exportExcel', [AdminController::class, 'exportUserData']);
        });

        // End User
        Route::group([
            'prefix' => 'enduser'
        ], function () {
            Route::get('', [AdminController::class, 'indexEndUser']);
            Route::get('exportEndUserExcel', [AdminController::class, 'exportUserData']);
        });

        // Company
        Route::group([
            'prefix' => 'company'
        ], function () {
            Route::get('', [AdminController::class, 'indexCompany']);
            Route::post('add', [AdminController::class, 'addCompany']);
            Route::post('update', [AdminController::class, 'updateCompany']);
            Route::post('delete', [AdminController::class, 'deleteCompany']);
        });

        // Color
        Route::group([
            'prefix' => 'color'
        ], function () {
            Route::get('', [AdminController::class, 'indexColor']);
            Route::post('add', [AdminController::class, 'addColor']);
            Route::post('update', [AdminController::class, 'updateColor']);
            Route::post('delete', [AdminController::class, 'deleteColor']);
        });

        // Size
        Route::group([
            'prefix' => 'size'
        ], function () {
            Route::get('', [AdminController::class, 'indexSize']);
            Route::post('add', [AdminController::class, 'addSize']);
            Route::post('update', [AdminController::class, 'updateSize']);
            Route::post('delete', [AdminController::class, 'deleteSize']);
        });

        // Gst
        Route::group([
            'prefix' => 'gst'
        ], function () {
            Route::get('', [AdminController::class, 'indexGst']);
            Route::post('add', [AdminController::class, 'addGst']);
            Route::post('update', [AdminController::class, 'updateGst']);
            Route::post('delete', [AdminController::class, 'deleteGst']);
        });

        // Room
        Route::group([
            'prefix' => 'room'
        ], function () {
            Route::get('', [AdminController::class, 'indexRoom']);
            Route::post('add', [AdminController::class, 'addRoom']);
            Route::post('update', [AdminController::class, 'updateRoom']);
            Route::post('delete', [AdminController::class, 'deleteRoom']);
        });



        //Category
        Route::group([
            'prefix' => 'category'
        ], function () {
            Route::get('', [AdminController::class, 'indexCategory']);
            Route::post('add', [AdminController::class, 'addCategory']);
            Route::post('update', [AdminController::class, 'updateCategory']);
            Route::post('delete', [AdminController::class, 'deleteCategory']);
        });

        // Sub Category
        Route::group([
            'prefix' => 'subcategory'
        ], function () {
            Route::get('', [AdminController::class, 'indexSubCategory']);
            Route::post('add', [AdminController::class, 'addSubCategory']);
            Route::post('update', [AdminController::class, 'updateSubCategory']);
            Route::post('delete', [AdminController::class, 'deleteSubCategory']);
        });

        //Product
        Route::group([
            'prefix' => 'product'
        ], function () {
            Route::get('', [AdminController::class, 'indexProduct']);
            Route::get('add', [AdminController::class, 'indexAddProduct']);
            Route::post('add', [AdminController::class, 'addProduct']);
            Route::post('addImages', [AdminController::class, 'addImages']);
            Route::get('update/{slug}', [AdminController::class, 'indexUpdateProduct']);
            Route::post('saveImages', [AdminController::class, 'saveImages']);
            Route::post('update', [AdminController::class, 'updateProduct']);
            Route::post('delete', [AdminController::class, 'deleteProduct']);
        });

        // Transactions
        Route::group([
            'prefix' => 'transaction'
        ], function () {
            Route::get('', [AdminController::class, 'indexTransaction']);
            Route::post('changeStatus', [AdminController::class, 'changeStatus']);
            Route::get('orders/{id}', [AdminController::class, 'indexOrder']);
        });

        // Banners
        Route::group([
            'prefix' => 'banner'
        ], function () {
            Route::get('', [AdminController::class, 'indexBanner']);
            Route::post('add', [AdminController::class, 'addBanner']);
            Route::post('update', [AdminController::class, 'updateBanner']);
            Route::post('delete', [AdminController::class, 'deleteBanner']);
        });

        // Enquiry
        Route::group([
            'prefix' => 'enquiries'
        ], function () {
            Route::get('', [AdminController::class, 'indexEnquiry']);
            Route::post('update', [AdminController::class, 'updateEnquiry']);
        });
    });
});
