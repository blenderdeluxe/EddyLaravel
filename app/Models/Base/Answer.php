<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Question;
use App\Models\SurveyResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * 
 * @property int $id
 * @property int $fk_question
 * @property string $answer
 * @property int $rate
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Question $question
 * @property Collection|SurveyResponse[] $survey_responses
 *
 * @package App\Models\Base
 */
class Answer extends Model
{
	protected $table = 'answers';

	protected $casts = [
		'fk_question' => 'int',
		'rate' => 'int'
	];

	public function question()
	{
		return $this->belongsTo(Question::class, 'fk_question');
	}

	public function survey_responses()
	{
		return $this->hasMany(SurveyResponse::class, 'fk_answer');
	}
}
