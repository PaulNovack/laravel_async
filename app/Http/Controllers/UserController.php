<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ZeroMQService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = new User();
        $user->aFetchAll();
        $users = $user->aFetchResults();
        return view('users.index', compact('users'));
    }
}
