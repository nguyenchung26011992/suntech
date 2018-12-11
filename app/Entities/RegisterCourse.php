<?php

namespace App\Entities;

use App\Entities\Course;
use Illuminate\Database\Eloquent\Model;

class RegisterCourse extends Model
{
    const STATUS_ACTIVE  = 1;
    const STATUS_PENDING = 0;

    protected $table = "register_course";

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'birth',
        'phone_number',
        'address',
        'description',
        'course_id',
        'order',
    ];

    /**
     * Get all of the products that are assigned this category.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
