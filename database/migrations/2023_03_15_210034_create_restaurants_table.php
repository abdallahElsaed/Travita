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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->integer('numberOfReviews')->nullable()->default(0);
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('website')->nullable();
            $table->integer('rating')->nullable()->default(0);
            $table->string('ranking_in_city')->nullable();
            $table->string('cuisine')->nullable();
            $table->string('dietaryRestrictions')->nullable();
            $table->longText('reviewTags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
