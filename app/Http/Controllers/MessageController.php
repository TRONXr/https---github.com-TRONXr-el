<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function landing(Request $request)
{
    // Валидация данных формы
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => [
            'required',
            'numeric',
            'regex:/^\+7\d{10}$/'
        ],
        'message' => 'required|string',
    ], [
        'phone.regex' => 'Номер телефона должен быть в формате +7XXXXXXXXXX (11 цифр)'
    ]);

    // Сохранение данных в базу
    Message::create($validatedData);

    // Возврат ответа или редирект
    return response()->json(['success' => 'Вильдан получил заявку!']);
}
}
