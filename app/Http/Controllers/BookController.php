<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\Section;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getBooksOfSection($id)
    {
        $books = Section::find($id)->books;
        if($books->isEmpty()){
            return ['message' => 'No books found'];
        }
        return BookResource::collection($books);
    }
    public function getBookDetail($id)
    {
        $book = Book::find($id);
        return new BookResource($book);
    }
}
