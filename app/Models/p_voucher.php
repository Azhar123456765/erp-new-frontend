<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class p_voucher extends Model
{
    use HasFactory;
    protected $table = 'payment_voucher';

    function supplier()
    {
        return $this->hasOne(seller::class, 'seller_id', 'company');
    }
    function buyer()
    {
        return $this->hasOne(buyer::class, 'buyer_id', "company");
    }

    function accounts()
    {
        return $this->hasOne(accounts::class, 'account_id', "cash_bank");
    }
}
