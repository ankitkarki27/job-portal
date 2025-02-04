<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $resume
 * @property string|null $skills
 * @property string|null $education
 * @property string|null $experience
 * @property string $phone
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant whereEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant whereResume($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant whereSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Applicant whereUserId($value)
 */
	class Applicant extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $com_name
 * @property string $com_email
 * @property string $com_phone
 * @property string $com_address
 * @property string|null $com_website
 * @property string|null $com_description
 * @property string $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobListing> $jobListings
 * @property-read int|null $job_listings_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereComAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereComDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereComEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereComName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereComPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereComWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereUserId($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $applications_id
 * @property int $jobid
 * @property int $applicant_id
 * @property string|null $cover_letter
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobApplication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobApplication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobApplication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobApplication whereApplicantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobApplication whereApplicationsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobApplication whereCoverLetter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobApplication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobApplication whereJobid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobApplication whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobApplication whereUpdatedAt($value)
 */
	class JobApplication extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $company_id
 * @property string $job_title
 * @property string|null $job_category
 * @property string $job_description
 * @property string $job_type
 * @property string $salary
 * @property string $location
 * @property int|null $experience_years
 * @property string|null $application_deadline
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $jobid
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereApplicationDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereExperienceYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereJobCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereJobDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereJobType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereJobid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|JobListing whereUpdatedAt($value)
 */
	class JobListing extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $role
 * @property-read \App\Models\Applicant|null $applicant
 * @property-read \App\Models\Applicant|null $applicants
 * @property-read \App\Models\Company|null $companies
 * @property-read \App\Models\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

