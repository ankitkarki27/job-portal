<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    protected $primaryKey = 'jobid';

    protected $fillable = [
        'company_id', 'job_title', 'job_description', 'job_type',
        'salary', 'location', 'experience_years', 'application_deadline', 'status'
    ];

    // Relationship with Company model
    public function company()
    {
        return $this->belongsTo(Company::class);
        return $this->belongsTo(Company::class, 'company_id');
    }
}
