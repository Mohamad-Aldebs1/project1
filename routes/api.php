<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserBooksController;
use App\Http\Controllers\WalletController;
use App\Models\UserBooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::get('logout' , [AuthController::class , 'logout']);
    Route::Post('/addFavorite/{bookId}',[FavoriteController::class,'addFavorite']);
    Route::delete('/removeFavorite/{bookId}',[FavoriteController::class,'removeFavorite']);
    Route::get('/getFavorites',[FavoriteController::class,'getFavorites']);
    Route::get('/getProfile',[ProfileController::class,'getProfile']);
    Route::post('/updateProfile',[ProfileController::class,'updateProfile']);
    Route::post('/charge', [StripeController::class, 'charge']);
    Route::get('/getWallet', [WalletController::class,'getWallet']);
    Route::post('/buyBook/{id}' , [UserBooksController::class,'buyBook']);
    Route::get('/getPurchasedBooks', [UserBooksController::class,'getPurchasedBooks']);

});
Route::post('/register' , [AuthController::class , 'register']);
Route::Post('/verifyEmail' , [AuthController::class , 'verifyEmail'])->middleware('auth:sanctum');
Route::post('/login' , [AuthController::class , 'login']);
Route::get('/getSections',[SectionController::class,'getSections']);
Route::get('/getAuthors',[AuthorController::class,'getAuthors']);
Route::get('/getDetailsOfAuthor/{id}',[AuthorController::class,'getDetailsOfAuthor']);
Route::get('/getBooksOfSection/{id}',[BookController::class,'getBooksOfSection']);
Route::get('/getBookDetail/{id}',[BookController::class,'getBookDetail']);
Route::get('/search',[SearchController::class,'search']);

