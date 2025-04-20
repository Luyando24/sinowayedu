<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->constrained('universities')->onDelete('cascade');
            $table->foreignId('degree_id')->constrained('degrees')->onDelete('cascade'); // Degree Relationship
            $table->string('program_id'); // Unique Program ID
            $table->string('language'); // Language of instruction
            $table->string('duration'); // Duration (e.g., 1+4 years)
            $table->string('intake'); // Intake season (e.g., 2025 Autumn)
            $table->string('tuition_fee'); // Tuition fee (e.g., 10000 USD)
            $table->string('registration_fee')->nullable();
            $table->string('single_room_cost')->nullable(); 
            $table->string('double_room_cost')->nullable();
            $table->string('triple_room_cost')->nullable();
            $table->string('four_room_cost')->nullable();
            $table->date('application_deadline')->nullable();
            $table->string('scholarship')->nullable(); // Scholarship information
            $table->text('description'); // Description of the program
            $table->string('requirements'); // Admission requirements  
            $table->string('application_documents'); // Admission documents         
            $table->string('status')->default('active'); // Status of the program (active/inactive)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('programs');
    }
};
