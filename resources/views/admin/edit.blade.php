@extends('layouts.admin')

@section('title', 'Редактирование заявки')

@section('content')
    <h1>Редактирование заявки</h1>

    <form action="{{ route('dashboard.message.update', $message->id) }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $message->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $message->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $message->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <textarea name="message" id="message" class="form-control" rows="5" required>{{ old('message', $message->message) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection
