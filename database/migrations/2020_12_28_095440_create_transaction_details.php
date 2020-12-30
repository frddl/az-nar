<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id');
            $table->integer('transaction_detail_id');
            $table->string('transaction_detail_type');
            $table->string('product_name');
            $table->float('price', 5, 2);
            $table->integer('count');
            $table->string('user_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mob_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->integer('city_id');
            $table->string('address')->nullable();
            $table->text('comment')->nullable();
            $table->date('date');
            $table->string('pay_type');
            $table->float('total_price');
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
        Schema::dropIfExists('transaction_details');
    }
}
