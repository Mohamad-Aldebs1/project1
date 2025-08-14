<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Http\Resources\BookResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function addAuthor(Request $request)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'about' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $photoPath = $request->file('photo')->store('img', 'public');

        $author = Author::create([
            'name' => $request->name,
            'about' => $request->about,
            'photo' =>asset('storage/'.$photoPath),
        ]);

        return response()->json([
            'message' => 'Author created successfully.',
            'data' => new AuthorResource($author),
        ], 201);
    }

    public function updateAuthor(Request $request, $id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'about' => 'sometimes|required|string',
            'photo' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('photo')) {
            if ($author->photo && Storage::disk('public')->exists($author->photo)) {
                Storage::disk('public')->delete($author->photo);
            }
            $photoPath = $request->file('photo')->store('img', 'public');
            $author->photo = asset('storage/'.$photoPath);
        }

        if ($request->filled('name')) {
            $author->name = $request->name;
        }

        if ($request->filled('about')) {
            $author->about = $request->about;
        }

        $author->save();

        return response()->json([
            'message' => 'Author updated successfully.',
            'data' => new AuthorResource($author),
        ]);
    }

    public function deleteAuthor($id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        if ($author->photo && Storage::disk('public')->exists($author->photo)) {
            Storage::disk('public')->delete($author->photo);
        }

        $author->delete();

        return response()->json(['message' => 'Author deleted successfully.']);
    }

    public function getAllAuthors()
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $authors = Author::all();
        return response()->json([
            'data' => AuthorResource::collection($authors)
        ]);
    }

    public function getAuthor($id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        return response()->json(['data' => new AuthorResource($author)]);
    }

}
