<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Services\SurveyService;



class SurveyController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Questionnaire $questionnaire, SurveyService $service)
    {
        //dd($questionnaire);

        $data = request()->validate([
            'responses.*.fk_answer' => 'required',
            'responses.*.fk_question' => 'required',
        ]);

        $data['survey']['user_id'] = auth()->user()->id;

        $survey = Survey::create([
            'fk_user' => auth()->user()->id,
            'fk_questionnaire' => $questionnaire->id,
        ]);
        
        
        $survey->survey_responses()->createMany($data['responses']);

        //Obtener todas las respuestas guardadas de el survey actual

        $total = $service->getTotalResultado($survey);

        return '¡Gracias! - ' . auth()->user()->name.' total fue de: '.$total;
    }

    public function show(Questionnaire $questionnaire, $slug)
    {

        $survey = Survey::where('fk_user', auth()->user()->id)->where('fk_questionnaire', $questionnaire->id)->latest()->first();

        if($survey && $survey->created_at->isToday()){
            abort(404);
        }

        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }    
}
