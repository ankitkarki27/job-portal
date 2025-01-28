<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ROLE_ADMIN = 1;
    const ROLE_APPLICANT = 2;
    const ROLE_COMPANY = 3;

    // Add the fillable property
    protected $fillable = [
        'name',         // Allow mass assignment for name
        'email',        // Allow mass assignment for email
        'password',     // Allow mass assignment for password
        'role',         // Allow mass assignment for role (if using role-based authentication)
    ];

    /**
     * Check if the user is Admin.
     */
    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    /**
     * Check if the user is an Applicant.
     */
    public function isApplicant()
    {
        return $this->role === self::ROLE_APPLICANT;
    }

    /**
     * Check if the user is a Company.
     */
    public function isCompany()
    {
        return $this->role === self::ROLE_COMPANY;
    }

    public function companies()
    {
        return $this->hasOne(Company::class);
    }

    public function applicants()
    {
        return $this->hasOne(Applicant::class);
    }
}
