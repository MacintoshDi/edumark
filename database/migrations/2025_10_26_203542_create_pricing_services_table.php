<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricing_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pricing_subcategory_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('unit')->default('м²'); // м², м, шт, час
            $table->decimal('price_without_material', 10, 2)->nullable();
            $table->decimal('price_with_material', 10, 2)->nullable();
            $table->decimal('price_premium', 10, 2)->nullable();
            $table->integer('min_quantity')->default(1);
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricing_services');
    }
};