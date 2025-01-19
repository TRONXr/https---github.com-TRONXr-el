@extends('layouts.base')

@section('title', 'Авторизация')

@section('main')
    <form method="post" action="{{ route('auth.login') }}" >
        @csrf
        <div class="line">
            <label for="email">Ваш e-mail</label>
            <input id="email" name="email" type="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <div class="line">
            <label for="password">Ваш пароль</label>
            <input id="password" name="password" type="password" class="@error('password') is-invalid @enderror ">
            @error('password')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="line">
                <button type="submit">Войти</button>
            </div>
    </form>
    <p>Нет учетной записи? <a href="{{ route('auth.register' )}}">Зарегестирируйтесь</a></p>
    @endsection('main')