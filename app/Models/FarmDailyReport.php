<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmDailyReport extends Model
{
    use HasFactory;
    protected $table = 'farm_daily_reports';
    function user()
    {
        return $this->hasOne(users::class, 'user_id', 'user_id');
    }
}
