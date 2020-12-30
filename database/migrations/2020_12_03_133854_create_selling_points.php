<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selling_points', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('address');
            $table->string('phone');
            $table->integer('city_id');
            $table->float('lat',10,5);
            $table->float('lng',10,5);
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
        Schema::dropIfExists('selling_points');
    }
}
