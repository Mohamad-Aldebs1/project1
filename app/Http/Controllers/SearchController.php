<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Http\Resources\BookResource;
use App\Http\Resources\SectionResource;
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
            'books' => BookResource::collection($books),
            'authors' => AuthorResource::collection($authors),
            'section' => SectionResource::collection($section)
        ]);
    }
}
