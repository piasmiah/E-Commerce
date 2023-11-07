<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelivaryBoyInfo extends Model
{
    use HasFactory;

    public $table = 'delivary_boy_info';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
