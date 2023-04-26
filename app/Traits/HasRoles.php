<?php

namespace App\Traits;

use App\Models\Role;
use Illuminate\Support\Facades\Cache;

//trait HasRoles
//{
//
//    public function roles()
//    {
//        return $this->morphToMany(Role::class, 'authorizable', 'role_user');
//    }
//
//    public function hasAbility($ability)
//    {
//        $denied = $this->roles()->whereHas('abilities', function ($query) use ($ability) {
//            $query->where('ability', $ability)
//                ->where('type', '=', 'deny');
//        })->exists();
//
//        if ($denied) {
//            return false;
//        }
//
//        return $this->roles()->whereHas('abilities', function ($query) use ($ability) {
//            $query->where('ability', $ability)
//                ->where('type', '=', 'allow');
//        })->exists();
//    }
//}
trait HasRoles
{
    public function roles(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Role::class, 'authorizable', 'role_user')->withPivot([]);
    }

    public function hasAbility($ability)
    {
        $cacheKey = $this->getCacheKey($ability);

        return Cache::remember($cacheKey, 60, function () use ($ability) {
            $denied = $this->roles()->whereHas('abilities', function ($query) use ($ability) {
                $query->where('ability', $ability)
                    ->where('type', '=', 'deny');
            })->exists();

            if ($denied) {
                return false;
            }

            return $this->roles()->whereHas('abilities', function ($query) use ($ability) {
                $query->where('ability', $ability)
                    ->where('type', '=', 'allow');
            })->exists();
        });
    }

    protected function getCacheKey($ability): string
    {
        return 'hasAbility:' . $ability . ':' . $this->id;
    }
}
