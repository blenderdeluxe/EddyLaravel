<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SurveyResponse
 * 
 * @property int $id
 * @property int $fk_survey
 * @property int $fk_question
 * @property int $fk_answer
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Answer $answer
 * @property Question $question
 * @property Survey $survey
 *
 * @package App\Models\Base
 */
class SurveyResponse extends Model
{
	protected $table = 'survey_responses';

	protected $casts = [
		'fk_survey' => 'int',
		'fk_question' => 'int',
		'fk_answer' => 'int'
	];

	public function answer()
	{
		return $this->belongsTo(Answer::class, 'fk_answer');
	}

	public function question()
	{
		return $this->belongsTo(Question::class, 'fk_question');
	}

	public function survey()
	{
		return $this->belongsTo(Survey::class, 'fk_survey');
	}
}
