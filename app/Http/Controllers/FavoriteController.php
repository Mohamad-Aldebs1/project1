<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request , $bookId){
        $userId = Auth::id();
        $favorite = Favorite::create([
            'user_id' => $userId,
            'book_id' => $bookId
        ]);
        return response()->json([
                'message' => 'book added to favorite successfully',
                'favorite' => $favorite,
        ]);
    }
    public function removeFavorite(Request $request , $bookId){
        $userId = Auth::id();
        Favorite::where('user_id',$userId)
            ->where('book_id',$bookId)
            ->delete();
        return response()->json([
            'message' => 'book removed from favorite successfully',
        ]);
    }
    public function getFavorites(){
        $userId =Auth::id();
        $userFavorites = User::find($userId)->favoriteBooks;
        if($userFavorites->isEmpty()){
            return response()->json(['message' => 'no favorites yet']);
        }
        return response()->json(['favorites' => $userFavorites]);
    }
}
