<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'nik' => $request->nik,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            if (Auth::user()->role == 'Intern') {
                return redirect()->route('intern.dashboard');
            } elseif (Auth::user()->role == 'Admin') {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return redirect()->route('login')->with('failed', 'Nik atau Password salah');
        }
    }
}