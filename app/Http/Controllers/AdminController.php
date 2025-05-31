<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class AdminController extends Controller
{
    public function index()
{
    $messages = Message::all();
    $achievements = Achievement::all(); // Добавляем получение достижений
    return view('admin.dashboard', compact('messages', 'achievements')); // Передаем обе переменные
}

    // Отображаем форму редактирования заявки
    public function edit($id)
    {
        $message = Message::findOrFail($id); // Находим заявку по ID
        return view('admin.edit', compact('message')); // Передаем заявку в представление для редактирования
    }

    // Обновляем заявку
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id); // Находим заявку по ID

        // Валидируем данные
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|string',
        ]);

        // Обновляем заявку
        $message->update($validatedData);
        return redirect()->route('admin.index')->with('success', 'Заявка успешно обновлена');
    }

    // Удаляем заявку
    public function destroy($id)
    {
        $message = Message::findOrFail($id); // Находим заявку по ID
        $message->delete(); // Удаляем заявку
        return redirect()->route('admin.index')->with('success', 'Заявка удалена');
    }

    
    

    public function storeAchievement(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('achievements', 'public');

        Achievement::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.index')->with('success', 'Достижение добавлено');
    }

 public function destroyAchievement($id)
{
    $achievement = Achievement::findOrFail($id);
    
    // Удаляем изображение из хранилища
    if (Storage::disk('public')->exists($achievement->image)) {
        Storage::disk('public')->delete($achievement->image);
    }
    
    // Удаляем запись из БД
    $achievement->delete();
    
    return redirect()->route('admin.index')->with('success', 'Достижение удалено');
}

}
