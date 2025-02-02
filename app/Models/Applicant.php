<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    
    protected $fillable = ['user_id', 'resume', 'skills', 'education', 
    'experience', 'address', 'phone'];

    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
}
