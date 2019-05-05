<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('item_id')->unsigned();
            $table->string('customer_name');
            $table->string('item_name');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('item_code');
            $table->integer('sale_price');
            $table->integer('payment');
            $table->integer('send_postal');
            $table->integer('send_prefectures');
            $table->string('send_address1');
            $table->string('send_address2')->nullable();
            $table->integer('state')->default(0)->nullable();
            $table->timestamps();

            // 外部キーの設定
            // $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
