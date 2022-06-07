<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;


Route::get('/users/{id?}', [AdminController::class, 'getAllUsers']);
Route::post('/add_restro', [AdminController::class, 'addRestro']);
Route::post('/add_category', [AdminController::class, 'addCategory']);
Route::post('/add_city', [AdminController::class, 'addCity']);
Route::post('/add_restro_type', [AdminController::class, 'addType']);
Route::post('/update_review_status/{status}', [AdminController::class, 'updateReviewStatus']);
Route::post('/update_user_status/{status}', [AdminController::class, 'updateUserStatus']);
Route::post('/update_restaurant_status/{status}', [AdminController::class, 'updateRestaurantStatus']);

Route::get('/reviews/{id?}', [UserController::class, 'getAllReviews']);
Route::post('/add_user', [UserController::class, 'addUser']);
Route::post('/update_user', [UserController::class, 'updateUser']);
Route::post('/add_review', [UserController::class, 'addReview']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/restaurants/{id?}', [RestaurantController::class, 'getAllRestros']);
