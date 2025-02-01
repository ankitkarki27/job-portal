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
            $table->id(); // Auto-increment primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->string('com_name'); // Required company name
            $table->string('com_email')->unique(); // Required and unique company email
            $table->string('com_phone', 10); // Required phone number (Max: 15 characters)
            $table->string('com_address'); // Required address
            $table->string('com_website')->nullable(); // Optional website
            $table->text('com_description')->nullable(); // Optional description
            $table->string('logo'); // Required company logo
            $table->timestamps(); // Created at & Updated at timestamps
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
