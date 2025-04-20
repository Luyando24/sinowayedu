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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('company_name'); // Name of the company
            $table->string('email'); // General contact email
            $table->string('phone'); // Company phone number
            $table->string('whatsapp_number');
            $table->string('wechat_id');
            $table->string('address'); // Company physical address
            $table->string('social_media_links')->nullable(); // Social media links (optional)
            $table->text('description')->nullable(); // Description (optional, e.g., "Customer support details")
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
