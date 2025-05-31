<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Результат теста: {{ $test->title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { color: #2c3e50; }
        .question { margin-bottom: 20px; }
        .answer { margin-left: 20px; color: #3498db; }
        .score { color: #e74c3c; font-weight: bold; }
        .result { margin-top: 30px; padding: 15px; background: #f8f9fa; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Результат теста: {{ $test->title }}</h1>
    <p>Дата прохождения: {{ now()->format('d.m.Y H:i') }}</p>
    
    <h2>Ваши ответы:</h2>
    @foreach($answers as $answer)
        <div class="question">
            <p><strong>Вопрос {{ $loop->iteration }}:</strong> {{ $answer['question'] }}</p>
            <p class="answer">Ответ: {{ $answer['answer'] }} <span class="score">({{ $answer['score'] }} баллов)</span></p>
        </div>
    @endforeach
    
    <div class="result">
        <h3>Итоговый результат:</h3>
        <p>Набранное количество баллов: <strong>{{ $totalScore }}</strong></p>
        <p>{{ $result->description }}</p>
    </div>
</body>
</html>