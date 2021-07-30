<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('Customer_order_id',255);
            $table->string('Customer_Name',255);
            $table->string('Customer_Address',255);
            $table->string('Customer_Phone',255);
            $table->string('Customer_Order_Day',255);
            $table->string('Customer_Receive_Day',255);
            $table->string('Customer_Messages',255);
            $table->string('Customer_Total_Price',255);
            $table->string('Customer_Status',10);
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
