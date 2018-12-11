<?php

namespace App\Entities;

use App\Entities\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const STATUS_ACTIVE  = 1;
    const STATUS_PENDING = 0;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'author_id',
        'order',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function displayCreatedAt()
    {
        $created_at = new Carbon($this->created_at);
        $created_at = $created_at->format('F d, Y');

        return $created_at;
    }
}
