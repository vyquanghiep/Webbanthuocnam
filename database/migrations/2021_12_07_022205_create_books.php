<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('Masanpham');
            $table->string('Tensanpham');
            $table->string('Anhurl');
            $table->string('Mota');
            $table->integer('Maloai');
            $table->integer('Madanhmuc');
            $table->integer('Madanhmucphu');
            $table->integer('Soluong');
            $table->decimal('Gia', 10, 0);
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
        Schema::dropIfExists('sanpham');
    }
}
