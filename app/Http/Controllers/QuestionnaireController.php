<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;



class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);

        $questionnaire = Questionnaire::create([
            'fk_user' => auth()->user()->id,
            'title' => $request->title,
            'purpose' => $request->purpose,
        ]);

        return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.survey_responses');

        return view('questionnaire.show', compact('questionnaire'));
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
