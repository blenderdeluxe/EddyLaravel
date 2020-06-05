<?php

namespace App\Models;

use App\Models\Base\SurveyResponse as BaseSurveyResponse;

class SurveyResponse extends BaseSurveyResponse
{
	protected $fillable = [
		'fk_survey',
		'fk_question',
		'fk_answer'
	];
}
