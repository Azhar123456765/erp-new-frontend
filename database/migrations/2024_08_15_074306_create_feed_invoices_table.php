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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item');
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

            $table->integer('sale_rate');
            $table->integer('sale_qty');
            $table->integer('sale_discount');
            $table->integer('sale_bonus');
            $table->integer('sale_amount');

            $table->integer('qty_total');
            $table->integer('amount_total');
            $table->integer('sale_qty_total');
            $table->integer('sale_amount_total');


            $table->text('attachment')->nullable();

            $table->foreign('buyer')->references('buyer_id')->on('buyer')->restrictOnDelete();
            $table->foreign('seller')->references('buyer_id')->on('buyer')->restrictOnDelete();
            $table->foreign('sales_officer')->references('sales_officer_id')->on('sales_officer')->restrictOnDelete();
            $table->foreign('user_id')->references('user_id')->on('users')->restrictOnDelete();
            $table->foreign('item')->references('product_id')->on('products')->restrictOnDelete();
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
