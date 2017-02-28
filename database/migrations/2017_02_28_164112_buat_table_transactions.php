<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('transactions', function($table){
    $table->increments('id')->unsigned();
    $table->string('product_id');
    $table->string('formid');
    $table->date('tanggal');
    $table->string('qty');
    $table->string('total_price');
    $table->string('subtotal');
    $table->string('status');
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
        Schema::drop('transactions');
    }
}
