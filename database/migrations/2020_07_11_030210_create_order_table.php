<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id_order');
            $table->date('tgl_order');
            $table->bigInteger('nama_cust_order')->unsigned();
            $table->string('nama_brg_order');
            $table->bigInteger('jenis_bahan_order')->unsigned();
            $table->integer('harga');
            $table->integer('opsi_antar_order');
            $table->string('status');
            $table->date('tgl_selesai_order');
            $table->integer('total_harga_order');
            $table->timestamps();
        });

        Schema::table('order', function($table) {
            $table->foreign('nama_cust_order')->references('id_cust')->on('customer')->onDelete('cascade');
        });
        Schema::table('order', function($table) {
            $table->foreign('jenis_bahan_order')->references('id_product')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
