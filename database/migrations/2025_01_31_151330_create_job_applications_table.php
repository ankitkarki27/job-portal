<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id('applications_id'); // Auto-increment ID for the application
            // Foreign key referencing job_listings' jobid
            $table->foreignId('jobid')->constrained('job_listings', 'jobid')->onDelete('cascade');
            // Foreign key referencing applicants' id (instead of applicant_id)
            $table->foreignId('applicant_id')->constrained('applicants', 'id')->onDelete('cascade');
            $table->text('cover_letter')->nullable(); // Cover letter (optional)
            $table->enum('status', ['pending', 'reviewed', 'accepted', 'rejected'])->default('pending'); // Application status
            $table->timestamps(); // Created and updated timestamps

            // Prevent duplicate entries for the same job and applicant
            $table->unique(['jobid', 'applicant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
