@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Результат теста: {{ $test->title }}</h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">
                @if($test->id == 2) {{-- Тест Шмишека --}}
                    Количество баллов: {{ $totalScore }}
                @else
                    Ваш результат: {{ $totalScore }} баллов
                @endif
            </h4>
            
            <div class="card-text mt-4">
                <p>{{ $result->description }}</p>
                
                @if($test->id == 2) {{-- Дополнительная информация для теста Шмишека --}}
                    <div class="mt-4">
                        <h5>Интерпретация результатов:</h5>
                        <ul>
                            <li>0-3 балла: слабо выраженные акцентуации</li>
                            <li>4-6 баллов: умеренно выраженные акцентуации</li>
                            <li>7-10 баллов: ярко выраженные акцентуации</li>
                        </ul>
                        <p class="mt-2">Для более точного анализа рекомендуется пройти полную версию теста (88 вопросов).</p>
                    </div>
                @endif
            </div>
            <div class="card-footer">
             <a href="{{ route('tests.downloadPdf', $test) }}" class="btn btn-success">
                  <i class="fas fa-download"></i> Скачать PDF с результатами
             </a>
            <a href="{{ route('tests.index') }}" class="btn btn-dark">Вернуться к тестам</a>
            <a href="{{ route('landing') }}" class="btn btn-dark">Обратиться к Вильдану</a>
</div>
        </div>
    </div>
@endsection