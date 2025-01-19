<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerform()
    {
        $departments = ['departments' => Department::all()];
        return view('auth.register', $departments);
    }
    private const REGISTER_VALIDATOR = [
        'name' => 'required|string',
        'last_name' => 'required|string|regex:/[а-яА-Я]/',
        'first_name' => 'required|string|regex:/[а-яА-Я]/',
        'patronym' => 'string | regex:/[а-яА-Я]/',
        'phone' => 'required | string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:5|confirmed'

    ];
    private const REGISTER_ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'min' => 'Значение не должно быть меньше :min символов',
        'string' => 'Данный адрес уже зарегестирован',
        'unique' => 'Данный адрес уже зарегестрирован',
        'regex' => 'Введите корректное выражение',
        'confirmed' => 'Пароли не совпадают'
    ];

    public function register(Request $request)
    {
        $validated = $request->validate(self::REGISTER_VALIDATOR, self::REGISTER_ERROR_MESSAGES);
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'patronym' => $request->patronym,
            'phone' => $request->phone,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'password' => Hash::make($request->password)
        ]);
        event(new Registered($user));

       Auth::login($user);
        return redirect()->route('application.index');
    }

}
