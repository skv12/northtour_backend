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
        Schema::table('tour_packages', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('tour_id')->change();
            $table->unsignedBigInteger('tour_package_id')->change();
            $table->foreign('tour_id', 'tour_packages_tour_fk')->on('tours')->references('id');
            $table->foreign('tour_package_id', 'tour_packages_tour_package_fk')->on('tour_package_types')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tour_packages', function (Blueprint $table) {
            //
            $table->integer('tour_id')->change();
            $table->integer('tour_package_id')->change();
            $table->dropForeign('tour_packages_tour_id_fk');
            $table->dropForeign('tour_packages_tour_package_id_fk');
        });
    }
};
