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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('provider_service_id')->constrained()->cascadeOnDelete();

            $table->dateTime('scheduled_start');
            $table->dateTime('scheduled_end');

            $table->string('service_address');
            $table->text('notes')->nullable();

            $table->enum('status', [
                'pending','confirmed','in_progress','completed','canceled'
            ])->default('pending');

            $table->dateTime('actual_start')->nullable();
            $table->dateTime('actual_end')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
