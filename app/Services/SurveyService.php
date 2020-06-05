<?php
namespace App\Services;

use App\Models\SurveyResponse;

class SurveyService
{

    public function getTotalResultado($survey)
    {
        $responses = SurveyResponse::with('answer')->where('fk_survey', $survey->id)->get();
    
        $total = 0;
        foreach ($responses as $key => $value) {
            $total += $value->answer->rate;
        }

        return $total;


    }

}