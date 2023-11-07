<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentRating extends Model
{
    use HasFactory;

    public $table = 'comments_ratings';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
