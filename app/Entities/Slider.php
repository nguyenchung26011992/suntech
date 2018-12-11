<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    const STATUS_ACTIVE  = 1;
    const STATUS_PENDING = 0;

    protected $fillable = [
        'image',
        'order',
    ];
}
