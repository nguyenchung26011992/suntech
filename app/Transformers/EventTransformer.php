<?php

namespace App\Transformers;

use App\Entities\Event;
use App\Entities\User;
use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;

/**
 * Class EventTransformer
 * @package namespace App\Transformers;
 */
class EventTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'user',
    ];

    public function __construct($includes = [])
    {
        $this->setDefaultIncludes($includes);
    }

    /**
     * Transform the Event entity
     * @param App\Entities\Event $model
     *
     * @return array
     */
    public function transform(Event $model)
    {
        $image = '';
        if ($model->image != '') {
            $image = filter_var($model->image, FILTER_VALIDATE_URL) === false ? asset($model->image) : $model->image;
        }

        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'slug'       => $model->slug,
            'start_date' => $model->start_date,
            'end_date'   => $model->end_date,
            'image'      => $image,
            'address'    => $model->address,
            'author_id'  => $model->author_id,
            'content'    => $model->content,
            'order'      => $model->order,
            'status'     => $model->status,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }

    public function includeUser(Event $model)
    {
        if (!empty($model->user)) {
            return $this->item($model->user, new UserTransformer);
        }
    }
}
