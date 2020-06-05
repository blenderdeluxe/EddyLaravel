<?php

namespace App\Models;

use App\Models\Base\Question as BaseQuestion;

class Question extends BaseQuestion
{
	protected $fillable = [
		'fk_questionnaire',
		'question'
	];
}
