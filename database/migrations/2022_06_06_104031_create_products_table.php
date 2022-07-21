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
            $table->foreignId('user_id');
            $table->foreignId('categorie_id');
            $table->foreignId('discount_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->double('price');
            $table->string('image');
            $table->string('album')->nullable();
            $table->integer('quantity');
            $table->text('discription');
            $table->string('serial_number')->nullable();
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
