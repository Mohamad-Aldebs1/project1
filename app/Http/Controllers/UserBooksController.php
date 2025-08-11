<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\UserBooks;
use Illuminate\Http\Request;

class UserBooksController extends Controller
{
    public function buyBook($id)
    {

        $user = auth()->user();
        $wallet = $user->wallet;
        $book = Book::findOrFail($id);


        if (UserBooks::where('user_id', $user->id)->where('book_id', $book->id)->exists()) {
            return response()->json(['message' => 'You already own this book.']);
        }

        if ($book->is_paid) {
            if ($wallet->balance < $book->price) {
                return response()->json(['error' => 'Insufficient balance'], 400);
            }

            $wallet->decrement('balance', $book->price);

            UserBooks::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
            ]);

            return response()->json(['message' => 'The book was purchased successfully']);
        }

    }


    public function getPurchasedBooks()
    {
        $user = auth()->user();
        $books = UserBooks::where('user_id', $user->id)->with('book')->get();

        if ($books->isEmpty()) {
            return response()->json(['error' => 'No books available'], 400);
        }

        $result = $books->map(function ($userBook) {
            return [
                'purchase_date' => $userBook->created_at->toDateTimeString(),
                'book' => new BookResource($userBook->book),
            ];
        });

        return response()->json($result);
    }

}
