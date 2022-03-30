<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{
    /**
     * Parent category.
     *
     * @return HasOne
     */
    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    /**
     * Child category.
     *
     * @return HasMany
     */
    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
