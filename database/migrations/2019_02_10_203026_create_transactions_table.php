<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->longText('release_term');
            $table->float('sellers_balance', 8, 1);
            $table->float('buyers_payment', 8, 1);
            $table->float('fee', 8, 1);
            $table->enum('status', ['PENDING','PENDING FUNDING','PROCESSING PAYMENT','CANCELLED']);
            $table->integer('buyer_id')->unsigned()->nullable();
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->integer('seller_id')->unsigned()->nullable();
            $table->foreign('seller_id')->references('id')->on('users');
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
}
