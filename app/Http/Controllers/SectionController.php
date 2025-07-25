<?php

namespace App\Http\Controllers;

use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;

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
}
