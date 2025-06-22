<?php

namespace App\Http\Controllers;

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
        return response()->json($author, 200);
    }
}
