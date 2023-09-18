<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products'; // Specify the table name

    protected $primaryKey = 'product_id'; // Specify the custom primary key field name

}
