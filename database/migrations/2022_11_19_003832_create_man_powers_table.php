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
        Schema::create('man_powers', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('detail')->nullable();
            $table->integer('amount')->nullable();
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
        Schema::dropIfExists('man_powers');
    }
};
