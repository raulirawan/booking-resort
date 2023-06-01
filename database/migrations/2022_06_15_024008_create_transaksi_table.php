<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kamar_id')->constrained('kamar')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_transaksi', 100)->nullable();
            $table->date('tanggal_check_in')->nullable();
            $table->date('tanggal_check_out')->nullable();
            $table->integer('jumlah_kamar')->nullable();
            $table->integer('adult')->nullable();
            $table->integer('children')->nullable();
            $table->integer('total_harga')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('status', ['PENDING', 'SUCCESS', 'CHECK IN', 'CHECK OUT', 'CANCELLED'])->nullable();

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
        Schema::dropIfExists('transaksi');
    }
}
