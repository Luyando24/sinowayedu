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
        // Add is_recommended to universities table
        if (!Schema::hasColumn('universities', 'is_recommended')) {
            Schema::table('universities', function (Blueprint $table) {
                $table->boolean('is_recommended')->default(false)->after('photo');
            });
        }

        // Add is_recommended to programs table
        if (!Schema::hasColumn('programs', 'is_recommended')) {
            Schema::table('programs', function (Blueprint $table) {
                $table->boolean('is_recommended')->default(false)->after('status');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove is_recommended from universities table
        if (Schema::hasColumn('universities', 'is_recommended')) {
            Schema::table('universities', function (Blueprint $table) {
                $table->dropColumn('is_recommended');
            });
        }
    }
};