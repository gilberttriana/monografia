<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('technician_ratings', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('technician_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedTinyInteger('rating');
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->index(['technician_id', 'rating']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technician_ratings');
    }
};
