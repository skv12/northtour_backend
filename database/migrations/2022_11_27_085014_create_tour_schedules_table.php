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
        Schema::create('tour_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('tour_id');
            $table->boolean('active')->default(1);
            $table->boolean('is_plan');
            $table->date('startdate');
            $table->date('enddate');
            $table->decimal('price');
            $table->integer('space_total');
            $table->integer('space_current');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_schedules');
    }
};
