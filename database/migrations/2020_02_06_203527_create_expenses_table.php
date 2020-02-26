<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seat_rent');
            $table->integer('net_bill');
            $table->integer('electric_bill');
            $table->integer('water_bill');
            $table->integer('gas_bill');
            $table->integer('bua_bill');
            $table->integer('care_taker')->nullable();
            $table->integer('extra_utility')->nullable();
            $table->date('billing_date');
            $table->date('due_date');
            $table->string('current_month');
            $table->integer('year');
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
        Schema::dropIfExists('expenses');
    }
}
