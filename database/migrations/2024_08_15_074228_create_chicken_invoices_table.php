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
            $table->text('user_id');
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

            $table->integer('pur_feed_cut');
            $table->integer('pur_more_cut');
            $table->integer('pur_crate_cut');
            $table->integer('pur_net_weight');
            $table->integer('pur_rate_diff');
            $table->integer('pur_rate');
            $table->integer('pur_amount');

            $table->integer('avg');

            $table->integer('crate_qty_total');
            $table->integer('hen_qty_total');
            $table->integer('gross_weight_total');
            $table->integer('feed_cut_total');
            $table->integer('mor_cut_total');
            $table->integer('crate_cut_total');
            $table->integer('n_weight_total');
            $table->integer('amount_total');
            $table->integer('pur_feed_cut_total');
            $table->integer('pur_mor_cut_total');
            $table->integer('pur_crate_cut_total');
            $table->integer('pur_n_weight_total');
            $table->integer('pur_amount_total');

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
        Schema::dropIfExists('chicken_invoices');
    }
}
