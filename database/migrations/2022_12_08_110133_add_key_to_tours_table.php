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
            $table->unsignedBigInteger('operator_id')->change();
            $table->index('operator_id', 'tour_operator_id_idx')->change();
            $table->foreign('operator_id', 'tour_operator_id_fk')->on('users')->references('id');
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
            $table->integer('operator_id')->change();
            $table->dropIndex('tour_operator_id_idx');
            $table->dropForeign('tour_operator_id_fk');
        });
    }
};
