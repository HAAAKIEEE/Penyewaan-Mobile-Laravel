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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // name
            $table->string('name')->nullable();

            // start and end date
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            // address
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();

            // payment
            $table->string('payment_method')->default('midtrans');
            $table->string('payment_status')->default('pending');
            $table->string('payment_url')->nullable();

            // total price
            $table->integer('total_price')->nullable();

            // relation to item and user
            $table->foreignId('item_id')->constrained();
            $table->foreignId('user_id')->constrained();

            $table->softDeletes();
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
        Schema::dropIfExists('bookings');
    }
};
