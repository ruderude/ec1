<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_kanji');
            $table->string('name_kana');
            $table->string('email');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('payment_id')->unsigned();
            $table->integer('sale_price');
            $table->integer('fee');
            $table->string('send_postal');
            $table->string('send_prefectures');
            $table->string('send_address1');
            $table->string('send_address2')->nullable();
            $table->string('description')->nullable();
            $table->integer('state')->default(0)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
