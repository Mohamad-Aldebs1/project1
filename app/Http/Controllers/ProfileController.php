<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class
ProfileController extends Controller
{
    public function getProfile(){
        $user = Auth::user();
        return response()->json([
            'first_name' => $user->first_name,
                 'last_name' => $user->last_name,
                    'email' => $user->email,
        ]);
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        $data = $request->only('first_name', 'last_name');
        $validator = Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->save();
        return response()->json(['message' => 'Profile updated successfully.']);
    }

}
