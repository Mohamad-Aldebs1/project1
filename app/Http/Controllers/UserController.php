<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getAllUsers(Request $request)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $users = User::all();
        return response()->json(['data' => $users]);
    }

    public function getUser($id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        return response()->json(['data' => $user]);
    }

    public function createUserByAdmin(Request $request)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'email_verified_at' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'User created successfully.',
            'data' => $user,
        ], 201);
    }

    public function updateUserByAdmin(Request $request, $id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->filled('first_name')) $user->first_name = $request->first_name;
        if ($request->filled('last_name')) $user->last_name = $request->last_name;
        if ($request->filled('email')) $user->email = $request->email;
        if ($request->filled('role')) $user->role = $request->role;

        $user->save();

        return response()->json(['message' => 'User updated successfully.', 'data' => $user]);
    }

    public function deleteUserByAdmin($id)
    {
        $user = auth()->user();
        if($user->role !=="admin"){
            return response()->json(['message'=>"Unauthorized"] , 403);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully.']);
    }
}
