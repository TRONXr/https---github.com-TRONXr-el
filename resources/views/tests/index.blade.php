@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Психологические тесты</h1>
    
    <div class="row">
        @foreach($tests as $test)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $test->title }}</h5>
                        <p class="card-text">{{ $test->description }}</p>
                        <a href="{{ route('tests.show', $test) }}" class="btn btn-dark">Пройти тест</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection