<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Questionnaire;
use App\Models\SurveyResponse;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Survey
 * 
 * @property int $id
 * @property int $fk_user
 * @property int $fk_questionnaire
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Questionnaire $questionnaire
 * @property User $user
 * @property Collection|SurveyResponse[] $survey_responses
 *
 * @package App\Models\Base
 */
class Survey extends Model
{
	protected $table = 'surveys';

	protected $casts = [
		'fk_user' => 'int',
		'fk_questionnaire' => 'int'
	];

	

	public function questionnaire()
	{
		return $this->belongsTo(Questionnaire::class, 'fk_questionnaire');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'fk_user');
	}

	public function survey_responses()
	{
		return $this->hasMany(SurveyResponse::class, 'fk_survey');
	}
}
