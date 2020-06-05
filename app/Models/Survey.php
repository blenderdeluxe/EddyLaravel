<?php

namespace App\Models;

use App\Models\Base\Survey as BaseSurvey;

class Survey extends BaseSurvey
{
	protected $fillable = [
		'fk_user',
		'fk_questionnaire'
	];

	protected $dates = ['created_at'];
}
