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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the university
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade'); // Linking to city
            $table->string('type'); // Public/Private
            $table->string('qs_rank')->nullable(); // QS World University Rankings
            $table->text('description'); // About the university
            $table->string('photo')->nullable(); // Column for university photo (path or URL)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
