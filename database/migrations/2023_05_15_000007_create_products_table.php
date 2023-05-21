<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->foreignId('category_id');
            $table->integer('quantity');
            $table->longText('image');
            $table->longText('image_2')->nullable();
            $table->longText('thumbnail');
            $table->string('slug');
            $table->decimal('weight');
            $table->decimal('height');
            $table->decimal('length');
            $table->decimal('price');
            $table->decimal('sale_price')->nullable();
            $table->date('sale_start')->nullable();
            $table->date('sale_end')->nullable();
            $table->longText('description');
            $table->longText('short_description');
            $table->tinyInteger('type');
            $table->decimal('shipping_price');
            $table->longText('download_link')->nullable();

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
};
