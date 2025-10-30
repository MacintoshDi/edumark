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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('cohort_id')->nullable()->constrained()->onDelete('set null');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['virtual', 'in-person', 'hybrid'])->default('virtual');
            $table->string('location')->nullable();
            $table->string('meeting_url')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('max_attendees')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};