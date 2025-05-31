@extends('layouts.admin')

@section('title', 'Вход в админ-панель')

@section('content')
<style>
    .login-container {
        height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
    .login-card {
        width: 100%;
        max-width: 400px;
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .login-header {
        background: #2c3e50;
        color: white;
        border-radius: 10px 10px 0 0 !important;
    }
    .btn-login {
        background: #2c3e50;
        border: none;
        color: white; /* Белый текст */
        transition: all 0.3s;
    }
    .btn-login:hover {
        background: #1a252f;
        color: white; /* Белый текст при наведении */
        transform: translateY(-2px);
    }
    .form-control:focus {
        border-color: #2c3e50;
        box-shadow: 0 0 0 0.25rem rgba(44, 62, 80, 0.25);
    }
</style>

<div class="login-container d-flex align-items-center justify-content-center">
    <div class="card login-card">
        <div class="card-header login-header text-center py-3">
            <h4><i class="bi bi-shield-lock me-2"></i>Административный вход</h4>
        </div>
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Логин</label>
                    <input type="text" class="form-control py-2" id="name" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control py-2" id="password" name="password" required>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-login btn-lg py-2">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Войти
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@endsection