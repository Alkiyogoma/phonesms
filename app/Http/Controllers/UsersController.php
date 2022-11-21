<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function index()
    {
        $users = User::active()
            ->orderByName()
            ->get(['id', 'name', 'email']);

        return Inertia::render('Users', [
            'users' => $users
        ]);
    }
}
