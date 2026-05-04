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
        Schema::create('provider_areas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('provider_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('township_id')->constrained()->cascadeOnDelete();

            $table->unique(['provider_id', 'township_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_areas');
    }
};
