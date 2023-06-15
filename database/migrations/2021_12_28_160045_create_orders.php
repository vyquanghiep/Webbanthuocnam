<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->bigIncrements('Madonhang');
            $table->integer('Manguoidung');
            $table->integer('Matrangthaidonhang');
            $table->text('Diachi');
            $table->double('Tongtien');
            $table->string('Tennguoinhan');
            $table->string('Sodienthoai');
            $table->dateTime('timestamps');

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
        Schema::dropIfExists('donhang');
    }
}
