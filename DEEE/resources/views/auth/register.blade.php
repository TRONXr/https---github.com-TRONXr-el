@extends('layouts.base')

@section('title', 'Регистрация')

@section('main')
    <form method="post" action='{{ route("auth.register") }}'>
        @csrf
        <div class="line">
            <label>Ваши ФИО</label>
            <input id="last_name" name="last_name" type="text"  placeholder="Фамилия" class="@error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
            @error('last_name')
            <span class="invalid-feedback">
                <strong>{{$message}} </strong>
            </span>
            @enderror
            <input id="first_name" name="first_name" type="text"  placeholder="Имя"  class="@error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
            @error('first_name')
            <span class="invalid-feedback">
                <strong>{{$message}} </strong>
                </span>
                @enderror

            
            <input id="patronym" name="patronym" type="text" placeholder="Отчество" class="@error('patronym') is-invalid @enderror" value="{{ old('patronym') }}">
            @error('patronym')
            <span class="invalid-feedback">
                <strong>{{$message}} </strong>
                </span>
                @enderror
        </div>
        <div class="line">
            <label for="name">Ваш логин</label>
            <input id="name" name="name" type="text"class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
            <span class="invalid-feedback">
                <strong>{{$message}} </strong>
                </span>
                @enderror

        </div>
        <div class="line">
            <label for="email">Ваша e-mail</label>
            <input id="email" name="email" type="email"class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback">
                <strong>{{$message}} </strong>
                </span>
                @enderror
        </div>
        <div class="line">
                <label for="phone">Ваш телефон</label>
                <input id="phone" name="phone" type="text" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                @error('phone')
                <span class="invalid-feedback">
                    <strong>{{$message}} </strong>
                    </span>
                    @enderror
        </div>
        <div class="line">
            <label for="departmentText">Отдел в котором работаете</label>
            <select name="department_id" id="departmentText" >
                @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                @endforeach
            </select>
            </div>
            <div class="line">
                <label for="password">Ваш пароль</label>
                <input id="password" name="password" type="password" class="@error('password') is-invalid @enderror" value="{{ old('password') }}">
                @error('password')
                <span class="invalid-feedback">
                    <strong>{{$message}} </strong>
                </span>
                @enderror
            </div>
            <div class="line">
                <label for="password_confirmation">Подтвердите пароль</label>
                <input id="password_confirmation" name="password_confirmation" type="password">
                </div>
                <div class="line">
                    <button type="submit">Регистрация</button>
                    </div>
    </form>
    <p>Есть учетная запись? <a href="{{route('auth.login')}}">Авторизуйтесь</a></p>
    @endsection('main')

