<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(
            User::when(auth('api')->check(),fn($query) => $query->where('id','!=',auth('api')->id()))->get()
        );
    }

    public function show(User $user)
    {
        return UserResource::make($user);
    }
}
