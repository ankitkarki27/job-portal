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
        Schema::table('applicants', function (Blueprint $table) {
            // First, set a default value before changing the column to NOT NULL
            $table->string('resume')->default('default_resume.pdf')->change();
            
            // Now, add the phone column
            $table->string('phone', 10)->after('experience');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('resume')->nullable()->change(); // Revert to nullable
            $table->dropColumn('phone'); // Remove phone column
        });
    }
};
