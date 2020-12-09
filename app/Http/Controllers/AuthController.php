<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\User as UserResource;
use JWTAuth;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $messages=[
            'email.required'    => 'Email tidak boleh kosong',
            'email.email'       => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.min'      => 'Password minimal 8 karakter',
        ];
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ],$messages);

        $credentials = $request->only(['email','password']);
        $token       = JWTAuth::attempt($credentials);

        if(!$token){
            return response()->json([
                'status'  => false,
                'message' => 'Unauthorized'
            ],401);
        }

        return (new UserResource($request->user()))
            ->additional(['meta' => [
            'status' => true,
            'token'  => $token,
            ]]);
    }  
    public function register(AuthRequest $request)
    {


        $user                = new User;
        $user->name          = $request->name;
        $user->role_id       = '2';
        $user->email         = $request->email;
        $user->password      = bcrypt($request->password);
        $user->save();

        $credentials = $request->only(['email','password']);
        $token       = JWTAuth::attempt($credentials);


        return (new UserResource($request->user()))
            ->additional(['meta' => [
            'status' => true,
            'token'  => $token,
            ]]);
    }
}
