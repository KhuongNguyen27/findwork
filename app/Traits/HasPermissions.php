<?php

namespace App\Traits;

use App\Models\Role;

trait HasPermissions
{
    protected $permissionList = null;

    public function userCan($permission = null)
    {
        return $this->hasPermission($permission);
    }
    public function hasPermission($permission = null)
    {
        if (is_null($permission)) {
            return $this->getPermissions()->count() > 0;
        }

        if (is_string($permission)) {
            return $this->getPermissions()->contains('name', $permission);
        }
        return false;
    }

    private function getPermissions()
    {
        if (!$this->group) {
            abort(403, 'You do not have permission to access this resource.');
        }
        $this->permissionList = $this->group->roles;
        return $this->permissionList ?? collect();
    }
}