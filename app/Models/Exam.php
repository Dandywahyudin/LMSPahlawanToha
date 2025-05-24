<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['title','token', 'gform_link', 'duration'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('started_at');
    }

}