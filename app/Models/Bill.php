<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $table = 'invoice';
    public $primaryKey = 'invoice_id';
    public $incrementing = true;
    public $timestamps = false;
}
