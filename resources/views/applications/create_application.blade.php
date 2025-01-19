@extends('layouts.base')

@section('title', 'Все заявки')

@section('main')
<h2>Добавление заявки</h2>
<form action="{{ route('application.create') }}" method="POST">
    @csrf
    <div class="line">
        <label for="descriptionText">Описание проблемы</label>
        <textarea id="descriptionText" name="description" rows="5"></textarea> 
        </div>
        <div class="line">
            <label for="categoryText">Категория проблемы</label>
            <select name="category" id="categoryText">
                
            </select>
        </div>
        <div class="line">
            <button type="submit">Отправить</button>
        </div>
</form>
@endsection('main')