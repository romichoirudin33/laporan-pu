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
        Schema::create('preparatory_works', function (Blueprint $table) {
            $table->id();
            $table->text('work');
            $table->text('sub_work');
            $table->text('detail_work');
            $table->string('volume');
            $table->string('unit');
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
        Schema::dropIfExists('preparatory_works');
    }
};
