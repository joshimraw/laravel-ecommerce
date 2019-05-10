<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('pimage_id')->nullable();

            $table->string('title');
            $table->string('slug');
            $table->text('image');
            $table->integer('price');
            $table->string('brand');
            $table->string('sku');
            $table->integer('stock');
            $table->integer('view_count')->default('0');
            $table->text('short_description');
            $table->text('full_description');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pimage_id')->references('id')->on('pimages')->onDelete('cascade');

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
