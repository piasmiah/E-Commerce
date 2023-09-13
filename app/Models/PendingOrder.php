<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingOrder extends Model
{
    public $table = 'orderstatus';
    public $primaryKey = 'order_id';
    public $incrementing = true;
    public $timestamps = false;
}
