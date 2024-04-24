<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //

    public function forgotPass()
    {
        return view("Login-page.forgot");
    }

    public function resetPass()
    {
        return view("Login-page.reset");
    }


    public function actionlogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        
        if (Auth::Attempt($data)) {
            return redirect('getwork');
        }else{
            Session::flash('error', 'Username atau Password Salah');
            return redirect('/');
        }

        // dd($request);
        // $credentials = $request->only('username', 'password');

        // if (Auth::attempt($credentials)) {
        //     // Jika autentikasi berhasil, redirect ke lokasi yang sesuai
        //     return redirect()->intended('/getwork');
        // }

        // // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        // return back()->withErrors(['username' => 'Invalid username or password.']);
    }
}
