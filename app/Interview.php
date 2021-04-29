<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Interview extends Model
{
    protected $fillable = [
        'npm',
        'angkatan',
        'homeNumber',
        'phoneNumber',
        'gender',
        'bloodType',
        'hobby',
        'address',
        'placeOfBirth',
        'dateOfBirth',
        'lastEdu',
        'lastAchievement',
        'lastOrganization',
        'lastEvent',
        'user_id',
    ];
    public function setUserId(){
        $this->attributes['user_id'] == Auth::user('id');
    }
}
