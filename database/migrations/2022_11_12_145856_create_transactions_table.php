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
            $table->string('merchant_code')->nullable();
            $table->string('qr')->nullable();
            $table->string('vaNumber')->nullable();
            $table->string('paymentUrl')->nullable();
            $table->string('fee')->nullable();
            $table->enum('type',['DIGITAL','FISIK'])->nullable();
            $table->json('data');
            $table->string('expired')->nullable();
            $table->enum('status_message',['PROCESS','SUCCESS','UNPAID','FAILED ']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        // Schema::create('transactions', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('amount');
        //     $table->string('reference');
        //     $table->string('merchant_code')->nullable();
        //     $table->string('qr')->nullable();
        //     $table->string('vaNumber')->nullable();
        //     $table->string('paymentUrl')->nullable();
        //     $table->string('fee')->nullable();
        //     $table->string('customer_id')->nullable();
        //     $table->string('code_product')->nullable();
        //     $table->enum('type',['digital','fisik'])->nullable();
        //     $table->json('data');
        //     $table->string('expired')->nullable();
        //     $table->enum('status_message',['PROCESS','SUCCESS','UNPAID','FAILED ']);
        //     $table->unsignedBigInteger('user_id');
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        //     $table->timestamps();
        // });

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
