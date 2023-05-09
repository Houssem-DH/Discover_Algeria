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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->bigInteger('wil_id');
            $table->string('name');
            $table->string('slug');
            $table->longText('descreption');
            $table->string('google_map');
            $table->string('nearby_hotels');
            $table->string('hotel_cost_per_night');
            $table->string('transport');
            $table->string('transport_cost')->nullable();
            $table->string('difficulty_degree');
            $table->string('food_cost');
            $table->string('image')->nullable();
            $table->string('pg_price')->nullable();
            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_keywords')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
