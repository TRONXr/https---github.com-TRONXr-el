@extends('layouts.app')

@section('content')
    <h1 class="mb-4">{{ $test->title }}</h1>
    <p class="lead mb-4">{{ $test->description }}</p>
    
    <form method="POST" action="{{ route('tests.result', $test) }}">
        @csrf
        
        @foreach($test->questions as $question)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Вопрос {{ $loop->iteration }}</h5>
                    <p class="card-text">{{ $question->text }}</p>
                    
                    <div class="form-group">
                        @foreach($question->options as $option)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" 
                                       name="question_{{ $question->id }}" 
                                       id="option_{{ $option->id }}" 
                                       value="{{ $option->id }}" required>
                                <label class="form-check-label" for="option_{{ $option->id }}">
                                    {{ $option->text }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        
        <button type="submit" class="btn btn-dark btn-lg">Узнать результат</button>
    </form>
@endsection