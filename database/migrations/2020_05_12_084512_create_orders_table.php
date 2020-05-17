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
            $table->integer('product_id');
            $table->string('product_name');
            $table->string('product_image');
            $table->string('product_price');
            $table->integer('product_quantity');
            $table->integer('payable_amount');
            $table->string('payment_method');
            $table->string('shoper_name');
            $table->string('shoper_email')->default('user@gmail.com');
            $table->integer('shoper_phone')->default(01001000107);
            $table->string('shoper_division');
            $table->string('shoper_district');
            $table->integer('shoper_zipCode');
            $table->text('shoper_receieving_Details');

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
