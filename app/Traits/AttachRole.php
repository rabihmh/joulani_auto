<?php

namespace App\Traits;

use App\Models\Role;

trait AttachRole
{
    /**
     * @param$user
     * @param string $role
     */
    public function attach($user, string $role): void
    {
        $role_id = Role::query()->select('id')->where('name', $role)->first();
        $user->roles()->sync($role_id, [
            'authorizable_type' => get_class($user),
            'authorizable_id' => $user->id,
        ]);
    }
}
