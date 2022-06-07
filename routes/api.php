<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;


Route::get('/restaurants/{id?}', [RestaurantController::class, 'getAllRestros']);
Route::post('/add_restro', [AdminController::class, 'addRestro']);
Route::post('/add_category', [AdminController::class, 'addCategory']);
Route::post('/add_city', [AdminController::class, 'addCity']);

Route::get('/reviews/{id?}', [UserController::class, 'getAllReviews']);
Route::post('/add_user', [UserController::class, 'addUser']);

Route::post('/add_review', [UserController::class, 'addReview']);
