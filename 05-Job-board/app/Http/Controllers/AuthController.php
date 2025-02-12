<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    public function signIn(){
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended('/');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        $hashedPassword = Hash::make($validateData['password']);
        $data = [
            'name'=> $validateData['name'],
            'email'=> $validateData['email'],
            'password'=> $hashedPassword
        ];

        User::create($data);

        return redirect()->route('auth.signIn');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
