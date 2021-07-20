<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Product_Name',255);
            $table->string('Product_Picture',255);
            $table->string('Product_Price',255);
            $table->string('Product_Brand',255);
            $table->string('Product_Quantity',255);
            $table->string('Product_Weight',255);
            $table->string('Product_Pack',255);
            $table->string('Product_Status',10);
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
        Schema::dropIfExists('products');
    }
}
