<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('nama');
            $table->string('email');
            $table->string('phone');
            $table->text('alamat');
            $table->string("image")->nullable();
            $table->enum("status",['terkirim','tidakterkirim', 'Diterima'])->default("tidakterkirim");
            $table->enum("bank",['bni','bca']);
            $table->string("transfer")->nullable();
            $table->timestamps();
        });
        
        Schema::create('sale_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->bigInteger('product_id');
            $table->integer('qty');
            $table->integer('price');
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
        Schema::dropIfExists('sales');
        Schema::dropIfExists('sale_items');
    }
}
