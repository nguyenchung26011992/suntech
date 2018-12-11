<?php

namespace App\Transformers;

use App\Entities\Post;
use App\Entities\User;
use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;

/**
 * Class PostTransformer
 * @package namespace App\Transformers;
 */
class PostTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'user',
    ];

    public function __construct($includes = [])
    {
        $this->setDefaultIncludes($includes);
    }

    /**
     * Transform the Post entity
     * @param App\Entities\Post $model
     *
     * @return array
     */
    public function transform(Post $model)
    {
        $image = '';
        if ($model->image != '') {
            $image = filter_var($model->image, FILTER_VALIDATE_URL) === false ? asset($model->image) : $model->image;
        }

        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'slug'       => $model->slug,
            'image'      => $image,
            'author_id'  => $model->author_id,
            'content'    => $model->content,
            'order'      => $model->order,
            'status'     => $model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }

    public function includeUser(Post $model)
    {
        if (!empty($model->user)) {
            return $this->item($model->user, new UserTransformer);
        }
    }
}
