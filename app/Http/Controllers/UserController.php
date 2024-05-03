<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user) {
        // return response()->json(['msg'=>'hello']);
        $users = User::where('id',$user->id)->first();
        return response()->json(['data'=>$users]);
    }

    public function store(UserRequest $user) {
        $validated = $user->validated();
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);
        return response()->json(['msg'=>'user registered successfully!']);
    }

    public function login(LoginRequest $user) {
        // if(Auth::attempt($user->validated())){
            
        // }

        if(Auth::attempt($user->validated())){
            $token = auth()->user()->createToken('Token name')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['msg'=>'Unauthorized',401]);
        }
    }
}
