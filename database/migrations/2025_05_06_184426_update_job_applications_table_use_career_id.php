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
        Schema::table('job_applications', function (Blueprint $table) {
            // Drop the existing foreign key and column (if needed)
            if (Schema::hasColumn('job_applications', 'job_id')) {
                $table->dropForeign(['job_id']);
                $table->dropColumn('job_id');
            }

            // Add new foreign key to careers table
            $table->foreignId('career_id')->after('id')->constrained('careers')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropForeign(['career_id']);
            $table->dropColumn('career_id');

            // Optional: Add job_id back if you roll back
            $table->foreignId('job_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
};
