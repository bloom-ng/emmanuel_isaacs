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
            $table->string('transaction_id');
            $table->text('address_line_1');
            $table->text('address_line_2')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('country');
            $table->decimal('sub_total');
            $table->decimal('discount');
            $table->decimal('shipping_total');
            $table->tinyInteger('order_status');
            $table->tinyInteger('payment_status');
            $table->longText('payment_response');

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
