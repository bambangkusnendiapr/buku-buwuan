<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBuwuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_buwuan', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->date('buwuan_tgl');
            $table->string('buwuan_nama');
            $table->integer('blok_id');
            $table->integer('buwuan_jumlah');
            $table->text('buwuan_ket')->nullable();
            $table->enum('buwuan_lunas', ['Belum Lunas', 'Lunas'])->default('Belum Lunas');
            $table->date('buwuan_lunas_tgl');
            $table->integer('user_id');
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
        Schema::dropIfExists('tb_buwuan');
    }
}
