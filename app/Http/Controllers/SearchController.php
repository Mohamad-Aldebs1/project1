<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Section;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->query('query');
        $books = Book::where('title', 'like', '%' . $query . '%')->get();
        $authors = Author::where('name', 'like', '%' . $query . '%')->get();
        $section = Section::where('name', 'like', '%' . $query . '%')->get();

        return response()->json([
            'books' => $books,
            'authors' => $authors,
            'section' => $section
        ]);
    }
}
