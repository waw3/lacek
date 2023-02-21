<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use App\Models\{User, Permission, Role};
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@email.com',
            'password' => 'password',
            'active' => true,
            'email_verified_at' => date_create()->format('Y-m-d H:i:s')
        ]);

        User::create([
            'first_name' => 'Default',
            'last_name' => 'User',
            'email' => 'user@email.com',
            'password' => 'password',
            'active' => true,
            'email_verified_at' => date_create()->format('Y-m-d H:i:s')
        ]);

        // Create Roles
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        // Create Permissions
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        if(app()->runningInConsole())
        $this->command->info('Default Permissions added.');

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo(Permission::all());

        // Assign Permissions to other Roles
        $user->givePermissionTo('admin.dashboard.index');

        // Assign Roles
        User::find(1)->assignRole('admin');
        User::find(2)->assignRole('user');
    }
}
