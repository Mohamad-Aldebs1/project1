<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Mail\VerificationCodeMail;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $code = mt_rand(100000, 999999);

        DB::table('verification_codes')->insert([
            'user_id' => $user->id,
            'code' => $code,
            'expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new VerificationCodeMail($code));

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 1,
            'data' => [
                'user' => $user,
                'token' => $token
            ],
            'message' => 'User registered successfully, please check your email.',
        ], 201);
    }

    public function verifyEmail(Request $request): JsonResponse
    {
        $request->validate([
            'code' => ['required'],
        ]);

        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $verification = DB::table('verification_codes')->where([
            ['user_id', '=', $userId],
            ['code', '=', $request->code],
        ])->where('expires_at', '>', now())->first();

        if (!$verification) {
            return response()->json(['message' => 'Invalid or expired code'], 400);
        }

        $user = User::find($userId);
        $user->email_verified_at = now();
        $user->save();

        DB::table('verification_codes')->where('user_id', $userId)->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Email verified successfully',
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => ['required','exists:users'],
            'password' => ['required'],
        ]);
        if(!Auth::attempt(['email' => $request['email'] , 'password' => $request['password']])){
            $message = 'Incorrect password';
            return response()->json([
                'status' => 0,
                'data' => [],
                'message' => $message
            ] , 500);
        }
        $user =User::query()->where('email' , $request['email'])->first();
        $token = $user->createToken('auth_token')->plainTextToken;
        $data =[];
        $data ['user'] = $user;
        $data['token'] = $token;
        return response()->json([
            'status' => 1,
            'data' => $data,
            'message' => 'user logged in successfully'
        ]);
    }
    public function logout(){
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 1,
            'data' => [],
            'message' => 'user logged out successfully'
        ]);
    }
}


