<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sell_invoice extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'sell_invoice'; 

    // function receipt_voucher()
    // {
    //     return $this->hasOne(receipt_voucher::class, 'id');
    // }
    function customer()
    {
        return $this->hasOne(buyer::class, 'buyer_id', 'company');
    }
    // function warehouse()
    // {
    //     return $this->belongsTo(warehouse::class, "warehouse");
    // }
    function product()
    {
        return $this->belongsTo(products::class, "item");
    }
    // function sales_officer()
    // {
    //     return $this->belongsTo(sales_officer::class, "sales_officer");
    // }
}
