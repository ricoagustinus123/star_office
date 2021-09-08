<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->nullable();
            $table->string('no_npwp')->nullable();
            $table->string('no_bpjs_ketenagakerjaan');
            $table->string('no_bpjs_kesehatan');
            $table->date('tanggal_lahir')->format('DD MM YYYY')->nullable();
            $table->unsignedBigInteger('wilayah_id')->nullable();
            $table->foreign('wilayah_id')->references('id')->on('wilayahs')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('unit_kerja_id')->nullable();
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('bidang_tugas')->nullable();
            $table->string('pendidikan_formal')->nullable();
            $table->integer('honor')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->text('alamat_domisili')->nullable();
            $table->text('alamat_ktp')->nullable();
            $table->string('foto_karyawan')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('perjanjian_kerja')->nullable();
            $table->integer('kontrak')->nullable();
            $table->string('vaksin')->nullable();
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
        Schema::dropIfExists('karyawans');
    }
}
