<?php

namespace App\Entities;

use App\Entities\RegisterCourse;
use App\Entities\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const STATUS_ACTIVE  = 1;
    const STATUS_PENDING = 0;

    protected $fillable = [
        'title',
        'slug',
        'origin_price',
        'price',
        'image',
        'content',
        'author_id',
        'lecturer_id',
        'order',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    public function register_courses()
    {
        return $this->hasMany(RegisterCourse::class);
    }

    public function getPrice()
    {
        if ($this->price == 0) {
            return 'Free';
        }
        return $this->price;
    }
}
