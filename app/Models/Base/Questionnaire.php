<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Question;
use App\Models\Survey;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Questionnaire
 * 
 * @property int $id
 * @property int $fk_user
 * @property string $title
 * @property string $purpose
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Question[] $questions
 * @property Collection|Survey[] $surveys
 *
 * @package App\Models\Base
 */
class Questionnaire extends Model
{
	protected $table = 'questionnaires';

	protected $casts = [
		'fk_user' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'fk_user');
	}

	public function questions()
	{
		return $this->hasMany(Question::class, 'fk_questionnaire');
	}

	public function surveys()
	{
		return $this->hasMany(Survey::class, 'fk_questionnaire');
	}
}
