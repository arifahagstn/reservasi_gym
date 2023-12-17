<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    //form register
    public function register(Request $request)
    {
        return view('auth.register');
    }

    //store register
    public function store(Request $request, User $user, Auth $auth)
    {
        $request->validate([
            'nama' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users,email',
            'password' => 'required|max:8'
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credential = $request->only('email','password');
        $auth::attempt($credential);
        $request->session()->regenerate();

        return redirect()->route('dashboard')
        ->withSuccess('Anda Telah Registrasi dan Login!');
    }

    //form login
    public function login()
    {
        return view('auth.login');
    }

    //authentication
    public function authentication(Request $request, Auth $auth)
    {
        //validasi form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //proses autentikasi
        $credential = $request->only('email','password');
        if ($auth::attempt($credential))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        //jika proses authentikasi gagal akan diredirect kehalaman login
        return back()->withErrors([
            'email' => 'Email Tidak Ditemukan',
        ])->onlyInput('email');
    }

    //dashboard
    public function dashboard()
    {
        if(Auth::check()){
            return view('gym.index');
        }
        return redirect()->route('auth.login');
    }

    //logout
    public function logout(Request $request, Auth $auth)
    {
        $auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}