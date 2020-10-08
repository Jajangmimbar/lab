<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('alat_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('kode')->nullable();
            $table->date('tanggal_pinjam')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->string('nama_peminjam')->nullable();
            $table->string('nama_alat')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('keperluan')->nullable();
            $table->enum('status', ['Booking', 'Pinjam', 'Selesai'])->nullable();
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
        Schema::dropIfExists('pinjams');
    }
}
