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

            $table->integer('rate_type')->nullable();
            $table->integer('vehicle_no')->nullable();
            $table->integer('crate_type')->nullable();
            $table->integer('crate_qty')->nullable();
            $table->integer('hen_qty');
            $table->integer('gross_weight');
            $table->integer('actual_rate');

            $table->integer('feed_cut');
            $table->integer('more_cut');
            $table->integer('crate_cut');
            $table->integer('net_weight');
            $table->integer('rate_diff');
            $table->integer('rate');
            $table->integer('amount');

            $table->integer('sale_feed_cut');
            $table->integer('sale_more_cut');
            $table->integer('sale_crate_cut');
            $table->integer('sale_net_weight');
            $table->integer('sale_rate_diff');
            $table->integer('sale_rate');
            $table->integer('sale_amount');

            $table->integer('avg');

            $table->integer('crate_qty_total');
            $table->integer('hen_qty_total');
            $table->integer('gross_weight_total');
            $table->integer('feed_cut_total');
            $table->integer('mor_cut_total');
            $table->integer('crate_cut_total');
            $table->integer('n_weight_total');
            $table->integer('amount_total');
            $table->integer('sale_feed_cut_total');
            $table->integer('sale_mor_cut_total');
            $table->integer('sale_crate_cut_total');
            $table->integer('sale_n_weight_total');
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
        Schema::dropIfExists('chicken_invoices');
    }
}
