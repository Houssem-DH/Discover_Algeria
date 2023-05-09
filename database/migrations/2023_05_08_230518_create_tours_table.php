<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Console\Scheduling\Schedule;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('place_id');
            $table->bigInteger('wil_id');
            $table->tinyInteger('expired')->default(0);
            $table->date('date');
            $table->date('exp_date');
            $table->string('n_place');
            $table->string('n_client')->default(0);
            $table->string('price');


            $table->timestamps();
        });
    }


    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            DB::table('tours')
                ->where('exp_date', '<', now())
                ->update(['expired' => '1']);
        })->daily();

        
        $schedule->call(function () {
            DB::table('tours')
                ->where('n_place', '=', 'n_client')
                ->update(['expired' => '1']);
        })->everySecond();

    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};