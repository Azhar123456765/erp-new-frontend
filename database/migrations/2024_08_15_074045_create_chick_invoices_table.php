<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChickInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chick_invoices', function (Blueprint $table) {
            $table->id();
            $table->text('unique_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item');
            $table->date('date');
            $table->unsignedBigInteger('sales_officer')->nullable();
            $table->unsignedBigInteger('buyer');
            $table->unsignedBigInteger('seller');
            $table->text('remark')->nullable();

            $table->float('rate');
            $table->float('qty');
            $table->float('discount');
            $table->float('bonus');
            $table->float('amount');

            $table->float('sale_rate');
            $table->float('sale_qty');
            $table->float('sale_discount');
            $table->float('sale_bonus');
            $table->float('sale_amount');

            $table->float('qty_total');
            $table->float('amount_total');
            $table->float('sale_qty_total');
            $table->float('sale_amount_total');

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
        Schema::dropIfExists('chick_invoices');
    }
}
