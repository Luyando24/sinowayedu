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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->constrained('universities')->onDelete('cascade');
            $table->string('name'); // Name of the scholarship
            $table->string('degree'); // Bachelor/Master
            $table->text('coverage'); // Scholarship coverage (tuition, accommodation)
            $table->string('type'); // Local Government, University Scholarship, etc.
            $table->text('notice'); // Additional information
            $table->text('introduction'); // Description of the scholarship
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
