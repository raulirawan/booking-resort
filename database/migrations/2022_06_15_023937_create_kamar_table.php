<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();

            $table->string('nama_kamar', 100)->nullable();
            $table->string('tipe_kamar', 100)->nullable();
            $table->enum('jenis_bed',['double','single'])->nullable();
            $table->integer('luas')->nullable();
            $table->longText('gambar')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('stok')->nullable();
            $table->string('services')->nullable();

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
        Schema::dropIfExists('kamar');
    }
}
