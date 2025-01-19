<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginform()
    {
        return view("auth.login");
    }
    private const LOGIN_VALIDATOR = [
        'email' => 'required|email',
        'password' => 'required'
    ];
    private const LOGIN_ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'email' => 'Введите корректный адрес почты'
    ];
    public function login(Request $request)
    {
        $validated = $request->validate(self::LOGIN_VALIDATOR,
                                        self::LOGIN_ERROR_MESSAGES);
        $success = auth()-attempt([
            'email' => $validated['email'],
            'password' => $validated['password']
        ], request()->has('remember'));
        
        if ($success) {
            return redirect()->route('application.index');
        }
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('auth.login');
    }
}
