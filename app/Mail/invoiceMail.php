<?php

namespace App\Mail;

use App\Models\sell_invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class invoiceMail extends Mailable
{
    use Queueable, SerializesModels;
    public $company_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company_id)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build($company_id)
    {
        $id = $this->company_id;

        $sell_invoice = sell_invoice::where("unique_id", $id)
                        ->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id')
                        ->get();

                $s_sell_invoice = sell_invoice::where("unique_id", $id)
                        ->leftJoin('buyer', 'sell_invoice.company', '=', 'buyer.buyer_id')
                        ->leftJoin('sales_officer', 'sell_invoice.sales_officer', '=', 'sales_officer.sales_officer_id')
                        ->leftJoin('products', 'sell_invoice.item', '=', 'products.product_id')
                        ->limit(1)->get();

                session()->put("sale_invoice_pdf_data", $sell_invoice);
                session()->put("s_sale_invoice_pdf_data", $s_sell_invoice);
        
        return $this->view('pdf.sale_pdf')
        ->subject('Sample Subject');

    }
}
