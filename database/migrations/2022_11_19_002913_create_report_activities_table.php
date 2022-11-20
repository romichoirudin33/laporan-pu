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
        Schema::create('report_activities', function (Blueprint $table) {
            $table->id();
            $table->string('name_project')->nullable();
            $table->longText('location')->nullable();
            $table->string('no_contractor')->nullable();
            $table->date('work_date')->nullable();
            $table->dateTime('execution_time')->nullable();
            $table->dateTime('maintenance_time')->nullable();
            $table->string('fiscal_year')->nullable();
            $table->foreignId('super_visor_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('consultant_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('executor_id')->nullable()->constrained()->onDelete('set null');
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
        Schema::dropIfExists('report_activities');
    }
};
