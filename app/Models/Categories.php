<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $table = 'categories';
    public $primaryKey = 'SL_No';
    public $incrementing = true;
    public $timestamps = false;
}
