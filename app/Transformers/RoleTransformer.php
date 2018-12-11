<?php

namespace App\Transformers;

use App\Transformers\PermissionTransformer;
use League\Fractal\TransformerAbstract;
use NF\Roles\Models\Role;

/**
 * Class RoleTransformer
 * @package namespace App\Transformers;
 */
class RoleTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['permissions'];
    /**
     * Transform the \Role entity
     * @param \Role $model
     *
     * @return array
     */

    public function __construct($includes = null)
    {
        if (isset($includes)) {
            $this->setDefaultIncludes($includes);
        }
    }

    public function transform(Role $model)
    {
        return [
            'id'   => (int) $model->id,
            'name' => $model->name,
            'slug' => $model->slug,
        ];
    }
    public function includePermissions(Role $model)
    {
        return $this->collection($model->permissions, new PermissionTransformer);
    }
}
