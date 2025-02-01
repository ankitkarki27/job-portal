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
         // Step 1: Drop the old jobid column
    Schema::table('job_listings', function (Blueprint $table) {
        $table->dropColumn('jobid');  // Remove the old jobid
    });

    // Step 2: Recreate jobid as bigIncrements
    Schema::table('job_listings', function (Blueprint $table) {
        $table->bigIncrements('jobid')->first();  // Add auto-incrementing jobid
    });
    
    // Step 3: Set the starting value for auto-increment (optional)
    DB::statement('ALTER TABLE job_listings AUTO_INCREMENT = 100');
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    // Step 1: Drop the new jobid column
    Schema::table('job_listings', function (Blueprint $table) {
        $table->dropColumn('jobid');
    });

    // Step 2: Recreate the jobid column as a bigInteger primary key
    Schema::table('job_listings', function (Blueprint $table) {
        $table->bigInteger('jobid')->primary();  // Revert to old custom primary key
    });

    // Reset auto-increment (optional)
    DB::statement('ALTER TABLE job_listings AUTO_INCREMENT = 1');
}
};
