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
        Schema::create('sprint_backlogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['task', 'bug', 'story'])->default('task');
            $table->foreignId('column_id')->constrained('columns');
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sprint_backlog');
    }
};
