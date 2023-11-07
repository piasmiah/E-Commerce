<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    public $table = 'subscriber';
    public $primaryKey = 'SL_No';
    public $incrementing = true;
    public $timestamps = true;
}
