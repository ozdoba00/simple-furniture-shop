<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('index', User::class);

        return User::all();
    }

    public function store(RegisterRequest $request)
    {
        
    }
}
