<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

        try{
            User::create($data);
            return redirect()->intended('/')
                ->with('success', 'User created successfully');
        }catch(\Exception $e){
            return $this->handleException($e);
        }
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

    private function handleException($e) {
        // Verificar si la excepción es de entrada duplicada
        if ($e instanceof QueryException && $e->errorInfo[1] == 1062) {
            return redirect()->back()->with('error', 'El correo electrónico ya está registrado.');
        }

        // Verificar si el recurso no fue encontrado
        if ($e instanceof ModelNotFoundException) {
            return redirect()->back()->with('error', 'Recurso no encontrado.');
        }

        // Verificar si hay errores de validación
        if ($e instanceof ValidationException) {
            return redirect()->back()-> with('error', 'Datos inválidos.');
        }

        // Otras excepciones
        return redirect()->back()->with('error', 'Ocurrió un error inesperado.');
    }
}
