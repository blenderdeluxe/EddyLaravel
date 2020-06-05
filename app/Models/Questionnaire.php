<?php

namespace App\Models;

use Str;
use App\Models\Base\Questionnaire as BaseQuestionnaire;

class Questionnaire extends BaseQuestionnaire
{
	protected $fillable = [
		'fk_user',
		'title',
		'purpose'
	];

	protected $appends = ['path', 'public_path'];

    public function getPathAttribute()
    {
        return url('/questionnaires/' . $this->id);
    }

    public function getPublicPathAttribute()
    {
        return url('/surveys/'.$this->id.'-'. Str::slug($this->title));
    }
}
