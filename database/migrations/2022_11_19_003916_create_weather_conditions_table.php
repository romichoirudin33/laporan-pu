<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_conditions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time');
            $table->boolean('is_bright')->default(false);
            $table->boolean('is_cloudy')->default(false);
            $table->boolean('is_drizzle')->default(false);
            $table->boolean('is_rain')->default(false);
            $table->string('earthquake')->nullable();
            $table->foreignId('report_activity_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_conditions');
    }
};
