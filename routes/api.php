<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::get('logout' , [AuthController::class , 'logout']);
});
Route::post('/register' , [AuthController::class , 'register']);
Route::Post('/verifyEmail' , [AuthController::class , 'verifyEmail'])->middleware('auth:sanctum');
Route::post('/login' , [AuthController::class , 'login']);
Route::get('/getSections',[SectionController::class,'getSections']);
Route::get('/getAuthors',[AuthorController::class,'getAuthors']);
Route::get('/getDetailsOfAuthor/{id}',[AuthorController::class,'getDetailsOfAuthor']);
Route::get('/getBooksOfSection/{id}',[BookController::class,'getBooksOfSection']);
Route::get('/getBookDetail/{id}',[BookController::class,'getBookDetail']);

