<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cover_image');
            $table->text('responsibles')->nullable();
            $table->enum('project_type', ['social', 'educational', 'environmental', 'cultural', 'health']);
            $table->string('slug')->unique();
            $table->text('markdown')->nullable();
            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->time('starting_time')->nullable();
            $table->time('ending_time')->nullable();
            $table->enum('status', ['planning', 'active', 'completed', 'archived']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};