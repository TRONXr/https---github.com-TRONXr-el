<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') </title>
</head>
<body>
    <div class="container">
        <h1>Сервис Help!!!</h1>
     
        <nav>
            <ul>
            <p><a href="{{ route('application.create') }}">Создать заявку</a></p>
            <p><a href="{{ route('application.index') }}">Мои заявки</a></p>
            <p> <a href="{{ route('auth.register' )}}">Регистрация</a></p> 
            <img class="mlos" src="{{ asset('images/ishka.jpg') }}" alt="Логотип" />
            <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
            </ul>
        </nav>
    
        @yield('main')
    </div>
</body>
</html>