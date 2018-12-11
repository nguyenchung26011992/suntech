<?php

namespace App\Entities;

use App\Entities\Category;
use App\Entities\Course;
use App\Entities\Event;
use App\Entities\Post;
use App\Notifications\MailResetPasswordToken;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use NF\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use NF\Roles\Models\Role;
use NF\Roles\Traits\HasRoleAndPermission;
use Prettus\Repository\Traits\TransformableTrait;
use Tymon\JWTAuth\Facades\JWTAuth;

class User extends Authenticatable implements HasRoleAndPermissionContract, CanResetPassword
{
    use Notifiable;
    use TransformableTrait;
    use HasRoleAndPermission;
    use CanResetPasswordTrait;

    const STATUS_ACTIVE  = 1;
    const STATUS_PENDING = 0;

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'birth',
        'phone_number',
        'address',
        'avatar',
        'gender',
        'description',
        'order',
    ];

    /**
     * Use to custom view in reset password mail
     * @param  [type] $token [description]
     * @return [type]        [description]
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }

    public function getToken()
    {
        return JWTAuth::fromUser($this);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoriable');
    }

    public function getName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Generate email verify token
     *
     * @return string
     */
    public function getEmailVerifyToken()
    {
        return Hash::make($this->email);
    }
}
