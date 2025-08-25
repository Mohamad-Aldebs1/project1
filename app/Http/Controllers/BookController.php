<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\BookResourceDash;
use App\Models\Author;
use App\Models\Book;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function createBook(Request $request)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'is_paid'     => 'required|boolean',
            'price'       => 'nullable|numeric|gte:0',
            'author_id'   => 'nullable|exists:authors,id',
            'section_id'  => 'required|exists:sections,id',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'file_url'    => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePath = $request->file('image')->store('img/books', 'public');

        $book = Book::create([
            'title'       => $request->title,
            'description' => $request->description,
            'is_paid'     => $request->is_paid,
            'price'       => $request->price,
            'author_id'   => $request->author_id,
            'section_id'  => $request->section_id,
            'image'       =>  'storage/'.$imagePath,
            'file_url'    => $request->file_url,
        ]);

        return response()->json([
            'message' => 'Book created successfully.',
            'data'    => new BookResourceDash($book),
        ], 201);
    }

    public function updateBook(Request $request, $id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title'       => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'is_paid'     => 'sometimes|required|boolean',
            'price'       => 'nullable|numeric|gte:0',
            'author_id'   => 'nullable|exists:authors,id',
            'section_id'  => 'sometimes|required|exists:sections,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'file_url'    => 'sometimes|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $book->fill($request->only([
            'title', 'description', 'is_paid', 'price', 'author_id', 'section_id' , 'file_url'
        ]));

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($book->image)) {
                Storage::disk('public')->delete($book->image);
            }
            $imagePath = $request->file('image')->store('img/books', 'public');
            $book->image ='storage/' . $imagePath;
        }

        $book->save();

        return response()->json([
            'message' => 'Book updated successfully.',
            'data'    => new BookResourceDash($book),
        ]);
    }

    public function deleteBook($id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        if (Storage::disk('public')->exists($book->image)) {
            Storage::disk('public')->delete($book->image);
        }
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully.']);
    }

    public function getBooks()
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $books = Book::with(['author', 'section'])->get();
        return response()->json([
            'data' => BookResourceDash::collection($books),
        ]);
    }

    public function getBook($id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $book = Book::with(['author', 'section'])->find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json(['data' => new BookResourceDash($book)]);
    }

}
