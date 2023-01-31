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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('reference');
            $table->string('merchant_ref')->nullable();
            $table->string('qr')->nullable();
            $table->json('data');
            $table->string('expired');
            $table->enum('status',['PAID','UNPAID']);
            $table->unsignedBigInteger('user_id');
            $table->string('customer_id')->nullable();
            $table->string('product_code')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('transactions');
    }
};
