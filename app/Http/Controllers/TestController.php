<?php

namespace App\Http\Controllers;
use App\Models\Test;
use App\Models\Option;
use PDF;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('tests.index', compact('tests'));
    }

    public function show(Test $test)
    {
        return view('tests.show', compact('test'));
    }

    public function result(Request $request, Test $test)
    {
        $totalScore = 0;
        
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'question_') === 0) {
                $option = Option::find($value);
                if ($option) {
                    $totalScore += $option->score;
                }
            }
        }
    
        if ($test->id == 2) { // ID теста Шмишека
            $result = $this->processShmishekResult($test, $totalScore);
        } else {
            $result = $test->results()
                ->where('min_score', '<=', $totalScore)
                ->where('max_score', '>=', $totalScore)
                ->first();
        }
    
        // Сохраняем данные в сессию перед возвратом view
        $request->session()->put('test_result', [
            'test' => $test,
            'totalScore' => $totalScore,
            'result' => $result,
            'answers' => $this->getUserAnswers($request, $test)
        ]);
    
        return view('tests.result', [
            'test' => $test,
            'totalScore' => $totalScore,
            'result' => $result
        ]);
    }
    public function downloadPdf(Request $request, Test $test)
    {
        $resultData = $request->session()->get('test_result');
        
        if (!$resultData || $resultData['test']->id != $test->id) {
            return redirect()->back()->with('error', 'Данные результата недоступны');
        }

        $pdf = PDF::loadView('tests.result-pdf', $resultData);
        return $pdf->download('Результат теста ' . $test->title . '.pdf');
    }

    protected function getUserAnswers(Request $request, Test $test)
    {
        $answers = [];
        
        foreach ($test->questions as $question) {
            $optionId = $request->input('question_' . $question->id);
            $selectedOption = Option::find($optionId);
            
            $answers[] = [
                'question' => $question->text,
                'answer' => $selectedOption ? $selectedOption->text : 'Не ответил',
                'score' => $selectedOption ? $selectedOption->score : 0
            ];
        }
        
        return $answers;
    }
    protected function processShmishekResult($test, $totalScore)
    {
        // Здесь можно добавить более сложную логику обработки
        // В данном случае используем тот же подход, что и для теста личности
        return $test->results()
            ->where('min_score', '<=', $totalScore)
            ->where('max_score', '>=', $totalScore)
            ->first();
    }
}
