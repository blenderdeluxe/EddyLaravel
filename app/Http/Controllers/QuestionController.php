<?php

namespace App\Http\Controllers;

use App\Models\Question;



use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Questionnaire;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(Request $request, Questionnaire $questionnaire)
    {
       
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.*' => 'required',
        ]);

        $question = Question::create([
            'fk_questionnaire' => $questionnaire->id,
            'question' => $request->question['question']
        ]);

        $question->answers()->createMany($data['answers']);

        return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path());
    }
}
