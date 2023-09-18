<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class p_voucher extends Model
{
    use HasFactory;
    protected $table = 'payment_voucher';
    protected $guarded = [];

    function supplier()
    {
        return $this->hasOne(seller::class, 'seller_id', 'company');
    }
    function customer()
    {
        return $this->hasOne(buyer::class, 'buyer_id', 'company');
    }
}
