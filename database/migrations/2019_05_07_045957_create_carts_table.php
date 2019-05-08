<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token');
            $table->string('name');
            $table->string('manufacturer')->nullable();
            $table->integer('item_code')->nullable();
            $table->integer('list_price')->nullable();
            $table->integer('sale_price');
            $table->integer('category_id')->unsigned();
            $table->string('image_url1')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
