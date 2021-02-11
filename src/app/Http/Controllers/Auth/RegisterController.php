<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // REGISTER PROCESS
    public function __invoke(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' =>  request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        return response('Done, You are registered');
    }
}
