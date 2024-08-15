<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_invoices', function (Blueprint $table) {
            $table->id();
            $table->text('unique_id');
            $table->text('user_id');
            $table->date('date');
            $table->unsignedBigInteger('sales_officer')->nullable();
            $table->unsignedBigInteger('buyer');
            $table->unsignedBigInteger('seller');
            $table->text('remark')->nullable();

            $table->integer('rate');
            $table->integer('qty');
            $table->integer('discount');
            $table->integer('bonus');
            $table->integer('amount');

            $table->integer('pur_rate');
            $table->integer('pur_qty');
            $table->integer('pur_discount');
            $table->integer('pur_bonus');
            $table->integer('pur_amount');

            $table->integer('rate_total');
            $table->integer('discount_total');
            $table->integer('bonus_total');
            $table->integer('qty_total');
            $table->integer('amount_total');

            $table->foreign('buyer')->references('buyer_id')->on('buyer')->restrictOnDelete();
            $table->foreign('seller')->references('seller_id')->on('seller')->restrictOnDelete();
            $table->foreign('sales_officer')->references('sales_officer_id')->on('sales_officer')->restrictOnDelete();
            // $table->foreign('users')->references('user_id')->on('user_id')->restrictOnDelete();
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
        Schema::dropIfExists('feed_invoices');
    }
}
