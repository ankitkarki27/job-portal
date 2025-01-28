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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key for the `users` table
            $table->string('name'); // Company name
            $table->string('address')->nullable(); // Address
            $table->string('website')->nullable(); // Website
            $table->string('phone')->nullable(); // Phone number
            $table->text('description')->nullable(); // Description of the company
            $table->string('logo')->nullable(); // Path to the company logo
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
