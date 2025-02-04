<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',     
        'com_name', 'updated_at', 'created_at',
        'com_email','com_phone','com_website','logo','com_description','com_address'

    ];
    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function jobListings()
{
    return $this->hasMany(JobListing::class);
}

}
