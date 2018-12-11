<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const STATUS_ACTIVE  = 1;
    const STATUS_PENDING = 0;

    protected $fillable = [
        'title',
        'slug',
        'start_date',
        'end_date',
        'image',
        'address',
        'content',
        'author_id',
        'order',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
