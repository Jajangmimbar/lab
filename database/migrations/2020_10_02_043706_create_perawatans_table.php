<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerawatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perawatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('alat_id');
            $table->string('kode_service')->nullable();
            $table->string('slug')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('vendor')->nullable();
            $table->string('kerusakan')->nullable();
            $table->string('part')->nullable();
            $table->string('biaya')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('foto_sebelum')->nullable();
            $table->string('foto_sesudah')->nullable();
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
        Schema::dropIfExists('perawatans');
    }
}
