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
    { Schema::table('job_listings', function (Blueprint $table) {
        $table->string('job_category')->nullable()->after('job_title'); // Adding a new column
        $table->decimal('salary', 12, 2)->change(); // Modifying salary column size
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropColumn('job_category'); // Rollback: Remove job_category column
            $table->decimal('salary', 10, 2)->change(); // Revert salary column to its original size
        });
    }
};
