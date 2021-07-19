<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFruitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fruits', function (Blueprint $table) {
            $table->id();
            $table->string('Fruit_Name',255);
            $table->string('Fruit_Picture',255);
            $table->string('Fruit_Price',255);
            $table->string('Fruit_Brand',255);
            $table->string('Fruit_Quantity',255);
            $table->string('Fruit_Weight',255);
            $table->string('Fruit_Pack',255);
            $table->string('Fruit_Status',10);
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
        Schema::dropIfExists('fruits');
    }
}
