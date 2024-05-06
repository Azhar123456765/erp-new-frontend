<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $table = 'product_company';
    public $id = 'id';
    function product()
    {
        return $this->hasOne(products::class, 'product_company', 'product_company_id');
    }
}
