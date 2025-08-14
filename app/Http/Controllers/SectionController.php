<?php

namespace App\Http\Controllers;

use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    public function getSections()
    {
        $sections = Section::all();
        if ($sections->isEmpty()) {
            return response()->json(["message" => "No sections found"], 404);
        }
        return response()->json(sectionResource::collection($sections), 200);
    }

    public function addSection(Request $request)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePath = $request->file('image')->store('img', 'public');

        $section = Section::create([
            'name' => $request->name,
            'image' =>asset('storage/'.$imagePath),
        ]);

        return response()->json([
            'message' => 'Section created successfully.',
            'data' => new SectionResource($section),
        ], 201);
    }

    public function updateSection(Request $request, $id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $section = Section::find($id);

        if (!$section) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('image')) {
            if ($section->image && Storage::disk('public')->exists($section->image)) {
                Storage::disk('public')->delete($section->image);
            }
            $imagePath = $request->file('image')->store('img', 'public');
            $section->image = asset('storage/'.$imagePath);
        }

        if ($request->filled('name')) {
            $section->name = $request->name;
        }

        $section->save();

        return response()->json([
            'message' => 'Section updated successfully.',
            'data' => new SectionResource($section),
        ]);
    }

    public function deleteSection($id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $section = Section::find($id);

        if (!$section) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        if ($section->image && Storage::disk('public')->exists($section->image)) {
            Storage::disk('public')->delete($section->image);
        }

        $section->delete();

        return response()->json(['message' => 'Section deleted successfully.']);
    }

    public function getSection($id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $section = Section::find($id);

        if (!$section) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        return response()->json([
            'data' => new SectionResource($section),
        ]);
    }

    public function getAllSections()
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $sections = Section::all();

        return response()->json([
            'data' => SectionResource::collection($sections),
        ]);
    }

}
