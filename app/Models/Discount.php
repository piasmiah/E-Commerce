<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name', // Add 'Name' to the fillable fields
        'Discount_Rate',
        'Start_Date',
        'End_Date',
        'Activate',

    ];

    public $table = 'discount_offer';
    public $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = true;

//    public function getIsActiveAttribute()
//    {
//        return now()->isBefore($this->end_date);
//    }
}
