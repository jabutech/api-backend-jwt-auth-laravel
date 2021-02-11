<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // validasi login
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        // Jika login tidak memiliki token
        if(!$token = auth()->attempt($request->only('username', 'password'))){
            // null akan mengembalikkan halaman kosong, jika ingin mengembalikkan pesan ganti null jadi 'pesan
            return response('User/Password Salah!', 401);
        }

        // jika sukses kirim tokennya
        return response()->json(compact('token'));
    }
}
