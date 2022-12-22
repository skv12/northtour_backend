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
        Schema::table('tour_images', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('tour_id')->change();
            $table->index('tour_id', 'image_tour_id_idx')->change();
            $table->foreign('tour_id', 'image_tour_id_fk')->on('tours')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tour_images', function (Blueprint $table) {
            $table->integer('tour_id')->change();
            $table->dropIndex('image_tour_id_idx');
            $table->dropForeign('image_tour_id_fk');
        });
    }
};
