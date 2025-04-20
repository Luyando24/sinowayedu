<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('scholarships', function (Blueprint $table) {
            // Drop the foreign key constraint (if still exists)
            $table->dropForeign(['degree_id']);
            $table->dropColumn('degree_id');
        });
    }

    public function down(): void
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->foreignId('degree_id')->constrained()->onDelete('cascade');
        });
    }
};