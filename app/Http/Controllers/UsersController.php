<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function GetAllUsers()
    {
        $users = User::all();

        return response()->json($users);
    }
}