<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('description',500);
            $table->bigInteger('regular_price');
            $table->bigInteger('offer_price');
            $table->enum('active',['0','1'])->default('0');
            $table->enum('product_type',['sell','rent','exchange'])->nullable();
            $table->unsignedBigInteger('condition_id');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('added_by');
            $table->timestamps();

            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->foreign('added_by')->references('id')->on('users');
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
};
