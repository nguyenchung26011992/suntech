<?php

namespace App\Transformers;

use App\Entities\RegisterCourse;
use App\Transformers\CourseTransformer;
use League\Fractal\TransformerAbstract;

/**
 * Class RegisterCourseTransformer
 * @package namespace App\Transformers;
 */
class RegisterCourseTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'course',
    ];

    public function __construct($includes = [])
    {
        $this->setDefaultIncludes($includes);
    }

    /**
     * Transform the RegisterCourse entity
     * @param App\Entities\RegisterCourse $model
     *
     * @return array
     */
    public function transform(RegisterCourse $model)
    {
        $image = '';
        if ($model->image != '') {
            $image = filter_var($model->image, FILTER_VALIDATE_URL) === false ? asset($model->image) : $model->image;
        }

        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'slug'       => $model->slug,
            'price'      => $model->price,
            'image'      => $image,
            'user_id'    => $model->user_id,
            'content'    => $model->content,
            'order'      => $model->order,
            'status'     => $model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }

    public function includeCourse(RegisterCourse $model)
    {
        if (!empty($model->course)) {
            return $this->item($model->course, new CourseTransformer);
        }
    }
}
