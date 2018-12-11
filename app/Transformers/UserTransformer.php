<?php

namespace App\Transformers;

use App\Entities\User;
use App\Transformers\ArtistTransformer;
use App\Transformers\ProductTransformer;
use App\Transformers\RoleTransformer;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'roles',
        'posts',
        'events',
        'courses',
    ];

    public function __construct($includes = [])
    {
        $this->setDefaultIncludes($includes);
    }

    /**
     * Transform the \User entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        $avatar = '';
        if ($model->avatar != '') {
            $avatar = filter_var($model->avatar, FILTER_VALIDATE_URL) === false ? asset($model->avatar) : $model->avatar;
        } else {
            $avatar = asset('assets/images/update-profile/avatar.png');
        }

        return [
            'id'              => (int) $model->id,
            'email'           => $model->email,
            'first_name'      => $model->first_name,
            'last_name'       => $model->last_name,
            'name'            => $model->first_name . " " . $model->last_name,
            'birth'           => $model->birth != '0000-00-00 00:00:00' ? $model->birth : null,
            'phone_number'    => $model->phone_number,
            'address'         => $model->address,
            'avatar'          => $avatar,
            'gender'          => $model->gender,
            'description'     => $model->description,
            'order'           => (int) $model->order,
            'status'          => (int) $model->status,
            'created_at'      => $model->created_at,
            'updated_at'      => $model->updated_at,
        ];
    }

    public function includeRoles(User $model)
    {
        return $this->collection($model->roles, new RoleTransformer);
    }

    public function includePosts(User $model)
    {
        return $this->collection($model->posts, new PostTransformer);
    }

    public function includeEvents(User $model)
    {
        return $this->collection($model->events, new EventTransformer);
    }

    public function includeCourses(User $model)
    {
        return $this->collection($model->courses, new CourseTransformer);
    }

}
