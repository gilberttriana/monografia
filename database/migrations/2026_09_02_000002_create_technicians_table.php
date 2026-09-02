<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('technicians', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('specialty');
            $table->string('location')->nullable();
            $table->unsignedSmallInteger('years_experience')->default(0);
            $table->string('image_path')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_available')->default(false);
            $table->json('services')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
