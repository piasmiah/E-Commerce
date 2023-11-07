<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivaries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'nid',
        'password',
        'photo',
    ];

    public $table = 'delivary';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
}
