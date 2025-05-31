<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Показать форму входа
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ], [
            'required' => 'Это поле обязательно для заполнения.',
        ]);

        // Попытка найти пользователя
        $user = User::where('name', $request->name)->first();

        // Проверка пароля с хешированием
        if ($user && Hash::check($request->password, $user->password)) {
            // Авторизация пользователя
            Auth::login($user);
            return redirect()->route('admin.index')->with('success', 'Вы успешно вошли в систему');
        }

        // Если пользователь не найден или пароль неверный
        return back()->withErrors(['name' => 'Неверное имя или пароль.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}