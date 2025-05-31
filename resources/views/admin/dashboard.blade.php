@extends('layouts.admin')

@section('title', 'Админ панель')

@section('content')
    <h1>Список заявок</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Почта</th>
                <th>Телефон</th>
                <th>Сообщение</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->phone }}</td>
                    <td>{{ $message->message }}</td>
                    <td>
                        <a href="{{ route('dashboard.message.edit', $message->id) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('dashboard.message.destroy', $message->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <hr>

    <h2>Управление достижениями</h2>
    
    <!-- Форма добавления нового достижения -->
    <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Описание</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Изображение</label>
                    <input type="file" name="image" class="form-control-file" required>
                </div>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </form>

    <!-- Список достижений -->
    <div class="row">
        @foreach($achievements as $achievement)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $achievement->image) }}" class="card-img-top" alt="{{ $achievement->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $achievement->title }}</h5>
                        <p class="card-text">{{ $achievement->description }}</p>
                        <form action="{{ route('admin.achievements.destroy', $achievement->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection