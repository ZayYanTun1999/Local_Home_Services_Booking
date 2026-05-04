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

            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 50);

            $table->string('password', 255);

            $table->string('image_path')->nullable();

            $table->enum('gender', ['male', 'female', 'other'])->nullable();

            $table->enum('role', ['admin', 'customer', 'service_provider']);

            $table->integer('home_no');
            $table->string('street', 200);
            $table->string('ward', 200);

            $table->foreignId('township_id')
                ->constrained('townships')
                ->restrictOnDelete();

            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();

            // Index for performance
            $table->index('township_id');
            $table->index('role');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};