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
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('sprint_id')->nullable()->constrained('sprints');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->string('backgroundColor')->default('#3788d8');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
