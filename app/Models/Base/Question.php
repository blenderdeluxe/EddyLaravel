<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Answer;
use App\Models\Questionnaire;
use App\Models\SurveyResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * 
 * @property int $id
 * @property int $fk_questionnaire
 * @property string $question
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Questionnaire $questionnaire
 * @property Collection|Answer[] $answers
 * @property Collection|SurveyResponse[] $survey_responses
 *
 * @package App\Models\Base
 */
class Question extends Model
{
	protected $table = 'questions';

	protected $casts = [
		'fk_questionnaire' => 'int'
	];

	public function questionnaire()
	{
		return $this->belongsTo(Questionnaire::class, 'fk_questionnaire');
	}

	public function answers()
	{
		return $this->hasMany(Answer::class, 'fk_question');
	}

	public function survey_responses()
	{
		return $this->hasMany(SurveyResponse::class, 'fk_question');
	}
}
