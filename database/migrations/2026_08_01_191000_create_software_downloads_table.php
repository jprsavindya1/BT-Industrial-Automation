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
        Schema::create('software_downloads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('Software');
            $table->string('version')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_size')->nullable();
            $table->string('os')->default('Windows 7 / 8 / 10 / 11');
            $table->text('url');
            $table->text('description')->nullable();
            $table->json('features')->nullable();
            $table->string('badge')->default('Essential');
            $table->string('icon_color')->default('amber');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_downloads');
    }
};
