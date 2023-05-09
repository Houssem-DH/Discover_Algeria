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
        Schema::create('tourrequests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('tour_id');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('states')->nullable();
            $table->string('zip')->nullable();
            $table->string('cname')->nullable();
            $table->string('cnumber')->nullable();
            $table->string('mm')->nullable();
            $table->string('yy')->nullable();
            $table->string('cvv')->nullable();
            $table->string('status')->default('0');
            $table->string('rejected')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourrequests');
    }
};
