<?php

namespace App\Transformers;

use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;

/**
 * Class CourseTransformer
 * @package namespace App\Transformers;
 */
class CourseTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'author',
        'lecturer',
    ];

    public function __construct($includes = [])
    {
        $this->setDefaultIncludes($includes);
    }

    /**
     * Transform the Course entity
     * @param App\Entities\Course $model
     *
     * @return array
     */
    public function transform(Course $model)
    {
        $image = '';
        if ($model->image != '') {
            $image = filter_var($model->image, FILTER_VALIDATE_URL) === false ? asset($model->image) : $model->image;
        }

        return [
            'id'           => (int) $model->id,
            'title'        => $model->title,
            'slug'         => $model->slug,
            'origin_price' => $model->origin_price,
            'price'        => $model->price,
            'image'        => $image,
            'author_id'    => $model->author_id,
            'lecturer_id'  => $model->lecturer_id,
            'content'      => $model->content,
            'order'        => $model->order,
            'status'       => $model->status,
            'created_at'   => $model->created_at,
            'updated_at'   => $model->updated_at,
        ];
    }

    public function includeAuthor(Course $model)
    {
        return $this->item($model->author, new UserTransformer);
    }

    public function includeLecturer(Course $model)
    {
        return $this->item($model->lecturer, new UserTransformer);
    }
}
