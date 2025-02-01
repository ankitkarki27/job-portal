<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    // Add user_id to fillable property
    protected $fillable = [
        'user_id',
        'resume','education','address','skills','experience','phone'
       
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
