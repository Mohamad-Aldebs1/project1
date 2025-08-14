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
use App\Http\Controllers\UserController;
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


    Route::post('books/{id}', [BookController::class, 'updateBook']);
    Route::post('books', [BookController::class, 'createBook']);
    Route::delete('books/{id}', [BookController::class, 'deleteBook']);
    Route::get('books/{id}', [BookController::class, 'getBook']);
    Route::get('books', [BookController::class, 'getBooks']);

    // authors apis routes
    Route::post('authors/{id}', [AuthorController::class, 'updateAuthor']);
    Route::post('authors', [AuthorController::class, 'addAuthor']);
    Route::delete('authors/{id}', [AuthorController::class, 'deleteAuthor']);
    Route::get('authors/{id}', [AuthorController::class, 'getAuthor']);
    Route::get('authors', [AuthorController::class, 'getAllAuthors']);

    // sections apis routes
    Route::post('sections/{id}', [SectionController::class, 'updateSection']);
    Route::post('sections', [SectionController::class, 'addSection']);
    Route::delete('sections/{id}', [SectionController::class, 'deleteSection']);
    Route::get('sections/{id}', [SectionController::class, 'getSection']);
    Route::get('sections', [SectionController::class, 'getAllSections']);

    // users management apis routes
    Route::get('users', [UserController::class, 'getAllUsers']);
    Route::get('users/{id}', [UserController::class, 'getUser']);
    Route::post('users', [UserController::class, 'createUserByAdmin']);
    Route::post('users/{id}', [UserController::class, 'updateUserByAdmin']);
    Route::delete('users/{id}', [UserController::class, 'deleteUserByAdmin']);
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

Route::middleware(['auth:sanctum', 'role:admin'])->prefix("admin")->group(function () {
    // books apis routes
});


