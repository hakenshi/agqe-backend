<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 14)->unique();
            $table->enum('color', ['black', 'pink', 'purple', 'blue', 'teal', 'red', 'indigo', 'yellow', 'green', 'gray', 'orange', 'cyan', 'lime'])->default('pink');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('photo')->nullable();
            $table->string('occupation');
            $table->string('password');
            $table->date('birth_date');
            $table->date('joined_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};