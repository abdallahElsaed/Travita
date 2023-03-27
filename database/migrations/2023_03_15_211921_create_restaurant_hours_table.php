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
        Schema::create('restaurant_hours', function (Blueprint $table) {
            $table->id();
            $table->string('day1')->nullable();
            $table->string('day2')->nullable();
            $table->string('day3')->nullable();
            $table->string('day4')->nullable();
            $table->string('day5')->nullable();
            $table->string('day6')->nullable();
            $table->string('day7')->nullable();
            $table->foreignId('restaurant_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_hours');
    }
};
