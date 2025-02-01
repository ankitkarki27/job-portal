<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->bigInteger('jobid')->primary(); // Custom primary key
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // Foreign key to companies table
            $table->string('job_title'); // Job title
            $table->text('job_description'); // Job description
            $table->string('job_type'); // Full-time, Part-time, Remote, etc.
            $table->decimal('salary', 10, 2)->nullable(); // Optional salary field
            $table->string('location'); // Job location
            $table->integer('experience_years')->nullable(); // Experience required (in years)
            $table->date('application_deadline')->nullable(); // Application deadline
            $table->string('status')->default('open'); // Job status (open/closed)
            $table->timestamps(); // Created at & Updated at timestamps
        });

        // Set the starting value for jobid
        DB::statement('ALTER TABLE job_listings AUTO_INCREMENT = 100;');
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
