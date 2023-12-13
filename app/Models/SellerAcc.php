<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerAcc extends Model
{
    use HasFactory;

    public $table = 'selleraccount';
    public $primaryKey = 'seller_id';
    public $incrementing = true;
    public $timestamps = true;
}
