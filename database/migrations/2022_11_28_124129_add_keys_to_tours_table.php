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
        Schema::table('tours', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('type_id')->change();
            $table->index('type_id', 'tour_tour_type_idx')->change();
            $table->foreign('type_id', 'tour_tour_type_fk')->on('tour_types')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            //
            $table->integer('type_id')->change();
            $table->dropIndex('tour_tour_type_idx');
            $table->dropForeign('tour_tour_type_fk');
        });
    }
};
