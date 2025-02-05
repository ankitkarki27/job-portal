<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobid', 
        'applicant_id', 
        'cover_letter', 
        // 'resume', 
        'status'
    ];

    // Relationship with JobListing
    public function job()
    {
        return $this->belongsTo(JobListing::class, 'jobid');
    }

    // Relationship with Applicant
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
      // Get resume from applicant profile
    public function getResumeAttribute()
      {
          return $this->applicant ? $this->applicant->resume : null;
      }
}
