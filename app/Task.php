<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'end_date',
        'point',
        'description',
        'status',
    ];
}
