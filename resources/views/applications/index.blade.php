@extends('layouts.base')

@section('title', 'Все заявки')
@section('main')

<h2>Мои заявки</h2>
<a href=" {{route('application.create') }}">Создать заявку</a>

  <article>
     <p>Пользователь 1</p>
    <p>Кто то украл мою еду </p>
    
   
  </article>
  
  <p>Заявок нет</p>
 
  @endsection('main')