<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product';
    public $primaryKey = 'pro_id';
    public $incrementing = true;
    public $timestamps = false;
}
