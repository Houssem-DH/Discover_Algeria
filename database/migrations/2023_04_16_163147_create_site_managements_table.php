<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_managements', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('hero_video')->nullable();
            $table->string('hero_banner')->nullable();
            $table->timestamps();
        });


        DB::table('site_managements')->insert(
            array(
                'logo' => "",
                'hero_video' => "",
                'hero_banner' => "",
            )
        );
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_managements');
    }
};
