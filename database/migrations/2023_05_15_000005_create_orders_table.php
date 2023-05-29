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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('name');
            $table->string('payment_ref');
            $table->string('transaction_id')->nullable();
            $table->text('address_line_1');
            $table->text('address_line_2')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->decimal('sub_total');
            $table->decimal('discount')->nullable();
            $table->decimal('shipping_total')->nullable();
            $table->tinyInteger('order_status');
            $table->tinyInteger('payment_status');
            $table->tinyInteger('payment_provider');
            $table->longText('payment_response')->nullable();

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
};
