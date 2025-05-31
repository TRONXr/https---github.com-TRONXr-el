<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
         // Подготовка данных для запроса
         $requestData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'message' => 'Hello, this is a test message.',
        ];

        // Создаем фейковый HTTP-запрос
        $request = new Request($requestData);

        // Вызываем метод контроллера
        $response = $this->app->call('App\Http\Controllers\LandingController@landing', [$request]);

        // Проверяем, что данные сохранились в базе
        $this->assertDatabaseHas('messages', $requestData);

        // Проверяем JSON-ответ
        $response->assertJson(['success' => 'Вильдан получил заявку!']);
    }

    /**
     * Тест валидации с некорректными данными.
     */
    public function test_landing_validation_fails_with_invalid_data(): void
    {
        // Подготовка некорректных данных для запроса
        $invalidData = [
            'name' => '', // Имя обязательно
            'email' => 'not-an-email', // Некорректный email
            'phone' => 'not-a-number', // Некорректный телефон
            'message' => '', // Сообщение обязательно
        ];

        // Создаем фейковый HTTP-запрос
        $request = new Request($invalidData);

        // Вызываем метод контроллера и ожидаем исключение валидации
        $response = $this->app->call('App\Http\Controllers\LandingController@landing', [$request]);

        // Проверяем, что ответ содержит ошибки валидации
        $response->assertStatus(422); // Код ошибки валидации
        $response->assertJsonValidationErrors(['name', 'email', 'phone', 'message']);
    }
}
