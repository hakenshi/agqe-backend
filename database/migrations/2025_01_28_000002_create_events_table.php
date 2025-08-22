<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cover_image');
            $table->enum('event_type', ['gallery', 'event', 'event_gallery']);
            $table->string('slug')->unique();
            $table->text('markdown')->nullable();
            $table->date('date');
            $table->time('starting_time');
            $table->time('ending_time');
            $table->string('location');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};