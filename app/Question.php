<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question1',
        'question2',
        'question3',
        'question4',
        'question5',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'question_users');
    }
}
