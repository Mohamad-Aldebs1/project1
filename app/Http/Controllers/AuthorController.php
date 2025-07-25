<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Http\Resources\BookResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getAuthors()
    {
        $author= Author::all();
        if($author->isEmpty()){
            return response()->json(["message" => "No authors found"], 404);
        }
        return response()->json(AuthorResource::collection($author), 200);
    }
    public function getDetailsOfAuthor($id)
    {
        $author = Author::findOrFail($id);
        $books = $author->books;

        return [
            'author' => new AuthorResource($author),
            'books' => BookResource::collection($books),
        ];

    }
}
