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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('date_order');
            $table->dateTime('date_order_delivery');
            $table->decimal('total');
            $table->enum('status',['PENDIENTE','ENTREGADO'])->default('PENDIENTE');
            $table->enum('statusend',['COMPLETO','INCOMPLETO'])->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
