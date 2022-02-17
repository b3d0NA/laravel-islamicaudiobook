<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedBook extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        "expire_time",
    ];
}