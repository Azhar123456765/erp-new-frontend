<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChickenInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chicken_invoices', function (Blueprint $table) {
            $table->id();
            $table->text('unique_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item');
            $table->date('date');
            $table->unsignedBigInteger('sales_officer')->nullable();
            $table->unsignedBigInteger('buyer');
            $table->unsignedBigInteger('seller');
            $table->text('remark')->nullable();

            $table->text('rate_type')->nullable();
            $table->text('vehicle_no')->nullable();
            $table->text('crate_type')->nullable();
            $table->float('crate_qty')->nullable();
            $table->float('hen_qty');
            $table->float('gross_weight');
            $table->float('actual_rate');

            $table->float('feed_cut');
            $table->float('more_cut');
            $table->float('crate_cut');
            $table->float('net_weight');
            $table->float('rate_diff');
            $table->float('rate');
            $table->float('amount');

            $table->float('sale_feed_cut');
            $table->float('sale_more_cut');
            $table->float('sale_crate_cut');
            $table->float('sale_net_weight');
            $table->float('sale_rate_diff');
            $table->float('sale_rate');
            $table->float('sale_amount');

            $table->float('avg');

            $table->float('crate_qty_total');
            $table->float('hen_qty_total');
            $table->float('gross_weight_total');
            $table->float('feed_cut_total');
            $table->float('mor_cut_total');
            $table->float('crate_cut_total');
            $table->float('n_weight_total');
            $table->float('amount_total');
            $table->float('sale_feed_cut_total');
            $table->float('sale_mor_cut_total');
            $table->float('sale_crate_cut_total');
            $table->float('sale_n_weight_total');
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
        Schema::dropIfExists('chicken_invoices');
    }
}
