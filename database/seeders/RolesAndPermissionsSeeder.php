<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function app;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'edit applications']);
        Permission::create(['name' => 'create applications']);

        $role = Role::create(['name' => 'manager']);
        $role->givePermissionTo('edit applications');

        $role = Role::create(['name' => 'client']);
        $role->givePermissionTo('create applications');
    }
}
