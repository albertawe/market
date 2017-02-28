<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTablePelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('pelanggan', function($table){
    $table->increments('id')->unsigned();
    $table->string('nama');
    $table->string('telepon');
    $table->string('alamat', 500);
    $table->string('propinsi');
    $table->string('kodepos', 10);
    $table->string('formid');
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
       Schema::drop('pelanggan');
    }
}
