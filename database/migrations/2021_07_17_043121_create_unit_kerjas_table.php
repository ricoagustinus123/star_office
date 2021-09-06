<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_kerjas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wilayah_id')->unsigned();
            $table->foreign('wilayah_id')->references('id')->on('wilayahs');
            $table->string('unit_kerja');
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
        Schema::dropIfExists('unit_kerjas');
    }
}
