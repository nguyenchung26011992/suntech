<?php

namespace App\Transformers;

use App\Entities\Slider;
use League\Fractal\TransformerAbstract;

/**
 * Class SliderTransformer
 * @package namespace App\Transformers;
 */
class SliderTransformer extends TransformerAbstract
{
    public function __construct($includes = [])
    {
        $this->setDefaultIncludes($includes);
    }

    /**
     * Transform the Slider entity
     * @param App\Entities\Slider $model
     *
     * @return array
     */
    public function transform(Slider $model)
    {
        $image = '';
        if ($model->image != '') {
            $image = filter_var($model->image, FILTER_VALIDATE_URL) === false ? asset($model->image) : $model->image;
        }

        return [
            'id'         => (int) $model->id,
            'image'      => $image,
            'order'      => $model->order,
            'status'     => $model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
