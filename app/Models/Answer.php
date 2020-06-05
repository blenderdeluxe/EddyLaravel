<?php

namespace App\Models;

use App\Models\Base\Answer as BaseAnswer;

class Answer extends BaseAnswer
{
	protected $fillable = [
		'fk_question',
		'answer',
		'rate'
	];
}
