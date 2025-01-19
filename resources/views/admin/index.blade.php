@extends('layouts.base')

@section('title', 'Все заявки')

@section('main')
<h2>Добавление заявки</h2>
<form action="{{ route('admin.index') }}" method="POST">
    @csrf
    <div class="line">
        <h1>ВЫ АДМИН</h1>
        <textarea id="descriptionText" name="description" rows="5"></textarea> 
        </div>
        <div class="line">
            <label for="categoryText">Вы можете менять что хотите </label>
            <select name="category" id="categoryText">
                
            </select>
        </div>
        <div class="line">
            <button type="submit">Отправить</button>
        </div>
</form>
@endsection('main')