<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('login.index');
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email kosong!',
                'password.required' => 'Password kosong!',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            //auth sukses
            // return 'auth sukses';
            return redirect('home')->with('success', 'Login Berhasil!');
        } else {
            //auth gagal
            // return 'auth gagal';
            return redirect('login')->withErrors('Data tidak valid');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout Berhasil!');
    }

    function register()
    {
        return view('login.register');
    }

    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6'
            ],
            [
                'name.required' => 'Nama kosong!',
                'email.required' => 'Email kosong!',
                'email.email' => 'Masukkan Email yang Valid',
                'password.required' => 'Password kosong!',
                'password.min' => 'Password kurang dari 6 karakter',
            ]
        );


        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        $infologin = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            //auth sukses
            // return 'auth sukses';
            return view('login.index')->with(['success', 'Register Sukses!']);
        } else {
            //auth gagal
            // return 'auth gagal';
            return redirect('login')->withErrors('Data tidak valid');
        }
    }
}
