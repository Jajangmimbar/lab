<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->string('nama_alat')->nullable();
            $table->string('nomor_asset')->nullable();
            $table->enum('lokasi', ['Ruang Sekertaris', 'Ruang Dosen 1', 'Ruang Dosen 2', 'Ruang Asisten 1', 'Ruang Asisten 2', 'Ruang Asisten 3', 'Ruang Asisten 4', 'Ruang Kuliah', 'Ruang Meeting', 'Ruang Pengujian Alat'])->nullable();
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->string('jumlah')->nullable();
            $table->text('spesifikasi')->nullable();
            $table->string('ism')->nullable();
            $table->date('service_terakhir')->nullable();
            $table->date('service_berikutnya')->nullable();
            $table->string('manual_book')->nullable();
            $table->string('foto_alat')->nullable();
            $table->enum('status', ['Belum', 'Selesai'])->nullable();
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
        Schema::dropIfExists('alats');
    }
}
