<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    // Add user_id to fillable property
    protected $fillable = [
        'user_id',     // Allow mass assignment for user_id
        // Add any other fields you want to allow mass assignment for
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
