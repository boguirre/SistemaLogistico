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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suplier_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('date_purchase');
            $table->decimal('tax');
            $table->decimal('total');
            $table->enum('status',['VALID','CANCELED'])->default('VALID');
            $table->foreign('suplier_id')->references('id')->on('supliers')->onDelete('set null');
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
        Schema::dropIfExists('purchases');
    }
};
