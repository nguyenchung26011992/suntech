<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use NF\Roles\Models\Permission;

/**
 * Class PermissionTransformer
 * @package namespace App\Transformers;
 */
class PermissionTransformer extends TransformerAbstract
{

    /**
     * Transform the \Permission entity
     * @param \Permission $model
     *
     * @return array
     */
    public function transform(Permission $model)
    {
        return [
            'id'          => (int) $model->id,
            'name'        => $model->name,
            'slug'        => $model->slug,
            'description' => $model->description,
        ];
    }
}
