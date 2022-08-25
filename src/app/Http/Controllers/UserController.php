<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return new UserResource(User::all(['first_name', 'last_name', 'photo_100']));
    }

    public function indexById(Request $request)
    {
        return new UserResource(User::where('id', '=', $request['id'])->get());
    }
}
