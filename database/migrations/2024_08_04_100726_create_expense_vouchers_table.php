<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_vouchers', function (Blueprint $table) {
            $table->id();
            $table->text('unique_id');
            $table->date('date');
            $table->date('cheque_date')->nullable();
            $table->unsignedBigInteger('buyer')->nullable();
            $table->unsignedBigInteger('seller')->nullable();
            $table->unsignedBigInteger('sales_officer')->nullable();
            $table->text('ref_no')->nullable();
            $table->text('remark')->nullable();
            $table->text('narration');
            $table->text('cash_bank')->nullable();
            $table->text('cheque_no')->nullable();
            $table->mediumInteger('amount');
            $table->bigInteger('amount_total');
            $table->timestamps();

            $table->foreign('buyer')->references('buyer_id')->on('buyer')->restrictOnDelete();
            $table->foreign('seller')->references('seller_id')->on('seller')->restrictOnDelete();
            $table->foreign('sales_officer')->references('sales_officer_id')->on('sales_officer')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_vouchers');
    }
}
