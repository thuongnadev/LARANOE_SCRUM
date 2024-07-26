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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->text('description')->nullable();
            $table->foreignId('product_owner_id')->constrained('users');
            $table->foreignId('scrum_master_id')->nullable()->constrained('users');
            $table->enum('status', ['planning', 'in_progress', 'on_hold', 'completed', 'cancelled'])->default('planning');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('estimated_duration')->nullable(); // in days
            $table->decimal('budget', 15, 2)->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->string('repository_url')->nullable();
            $table->json('tags')->nullable();
            $table->integer('priority')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
