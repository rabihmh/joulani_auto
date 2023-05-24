<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleAbility;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin role and abilities
        $adminRole = Role::create([
            'name' => 'admin'
        ]);
        $adminAbilities = [
            ['ability' => 'mades.view', 'type' => 'allow'],
            ['ability' => 'mades.create', 'type' => 'allow'],
            ['ability' => 'mades.edit', 'type' => 'allow'],
            ['ability' => 'mades.delete', 'type' => 'deny'],

            ['ability' => 'moulds.view', 'type' => 'allow'],
            ['ability' => 'moulds.create', 'type' => 'allow'],
            ['ability' => 'moulds.edit', 'type' => 'allow'],
            ['ability' => 'moulds.delete', 'type' => 'deny'],

            ['ability' => 'vehicles.view', 'type' => 'allow'],
            ['ability' => 'vehicles.create', 'type' => 'allow'],
            ['ability' => 'vehicles.edit', 'type' => 'allow'],
            ['ability' => 'vehicles.delete', 'type' => 'deny'],

            ['ability' => 'users.view', 'type' => 'allow'],
            ['ability' => 'users.create', 'type' => 'allow'],
            ['ability' => 'users.edit', 'type' => 'allow'],
            ['ability' => 'users.delete', 'type' => 'deny'],

            ['ability' => 'sellers.view', 'type' => 'allow'],
            ['ability' => 'sellers.create', 'type' => 'allow'],
            ['ability' => 'sellers.edit', 'type' => 'allow'],
            ['ability' => 'sellers.delete', 'type' => 'deny'],

            ['ability' => 'admins.view', 'type' => 'allow'],
            ['ability' => 'admins.create', 'type' => 'deny'],
            ['ability' => 'admins.edit', 'type' => 'deny'],
            ['ability' => 'admins.delete', 'type' => 'deny'],

            ['ability' => 'roles.view', 'type' => 'deny'],
            ['ability' => 'roles.create', 'type' => 'deny'],
            ['ability' => 'roles.edit', 'type' => 'deny'],
            ['ability' => 'roles.delete', 'type' => 'deny'],
        ];

        $this->createRoleAbilities($adminRole, $adminAbilities);

        // Create subscriber role and abilities
        $subscriberRole = Role::create([
            'name' => 'subscriber'
        ]);
        $subscriberAbilities = [
            ['ability' => 'mades.view', 'type' => 'allow'],
            ['ability' => 'mades.create', 'type' => 'deny'],
            ['ability' => 'mades.edit', 'type' => 'deny'],
            ['ability' => 'mades.delete', 'type' => 'deny'],

            ['ability' => 'moulds.view', 'type' => 'allow'],
            ['ability' => 'moulds.create', 'type' => 'deny'],
            ['ability' => 'moulds.edit', 'type' => 'deny'],
            ['ability' => 'moulds.delete', 'type' => 'deny'],

            ['ability' => 'vehicles.view', 'type' => 'allow'],
            ['ability' => 'vehicles.create', 'type' => 'allow'],
            ['ability' => 'vehicles.edit', 'type' => 'allow'],
            ['ability' => 'vehicles.delete', 'type' => 'deny'],

            ['ability' => 'users.view', 'type' => 'deny'],
            ['ability' => 'users.create', 'type' => 'deny'],
            ['ability' => 'users.edit', 'type' => 'deny'],
            ['ability' => 'users.delete', 'type' => 'deny'],

            ['ability' => 'sellers.view', 'type' => 'allow'],
            ['ability' => 'sellers.create', 'type' => 'allow'],
            ['ability' => 'sellers.edit', 'type' => 'allow'],
            ['ability' => 'sellers.delete', 'type' => 'deny'],

            ['ability' => 'admins.view', 'type' => 'deny'],
            ['ability' => 'admins.create', 'type' => 'deny'],
            ['ability' => 'admins.edit', 'type' => 'deny'],
            ['ability' => 'admins.delete', 'type' => 'deny'],

            ['ability' => 'roles.view', 'type' => 'deny'],
            ['ability' => 'roles.create', 'type' => 'deny'],
            ['ability' => 'roles.edit', 'type' => 'deny'],
            ['ability' => 'roles.delete', 'type' => 'deny'],
        ];

        $this->createRoleAbilities($subscriberRole, $subscriberAbilities);


        // Create subscriber role and abilities
        $userRole = Role::create([
            'name' => 'user'
        ]);
        $userAbilities = [
            ['ability' => 'mades.view', 'type' => 'deny'],
            ['ability' => 'mades.create', 'type' => 'deny'],
            ['ability' => 'mades.edit', 'type' => 'deny'],
            ['ability' => 'mades.delete', 'type' => 'deny'],

            ['ability' => 'moulds.view', 'type' => 'deny'],
            ['ability' => 'moulds.create', 'type' => 'deny'],
            ['ability' => 'moulds.edit', 'type' => 'deny'],
            ['ability' => 'moulds.delete', 'type' => 'deny'],

            ['ability' => 'vehicles.view', 'type' => 'allow'],
            ['ability' => 'vehicles.create', 'type' => 'deny'],
            ['ability' => 'vehicles.edit', 'type' => 'deny'],
            ['ability' => 'vehicles.delete', 'type' => 'deny'],

            ['ability' => 'users.view', 'type' => 'deny'],
            ['ability' => 'users.create', 'type' => 'deny'],
            ['ability' => 'users.edit', 'type' => 'deny'],
            ['ability' => 'users.delete', 'type' => 'deny'],

            ['ability' => 'sellers.view', 'type' => 'allow'],
            ['ability' => 'sellers.create', 'type' => 'deny'],
            ['ability' => 'sellers.edit', 'type' => 'deny'],
            ['ability' => 'sellers.delete', 'type' => 'deny'],

            ['ability' => 'admins.view', 'type' => 'deny'],
            ['ability' => 'admins.create', 'type' => 'deny'],
            ['ability' => 'admins.edit', 'type' => 'deny'],
            ['ability' => 'admins.delete', 'type' => 'deny'],

            ['ability' => 'roles.view', 'type' => 'deny'],
            ['ability' => 'roles.create', 'type' => 'deny'],
            ['ability' => 'roles.edit', 'type' => 'deny'],
            ['ability' => 'roles.delete', 'type' => 'deny'],
        ];

        $this->createRoleAbilities($userRole, $userAbilities);
    }

    /**
     * Create role abilities.
     *
     * @param Role $role
     * @param array $abilities
     */
    private function createRoleAbilities(Role $role, array $abilities): void
    {
        foreach ($abilities as $ability) {
            RoleAbility::query()->create([
                'role_id' => $role->id,
                'ability' => $ability['ability'],
                'type' => $ability['type'],
            ]);
        }
    }
}
