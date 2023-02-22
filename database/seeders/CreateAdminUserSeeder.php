<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use App\Models\{User, Permission, Role, Blog};
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
        $user->givePermissionTo([
            'dashboard.index',
            'dashboard.users.index',
            'dashboard.users.show',
            'dashboard.blogs.index',
            'dashboard.blogs.show'
        ]);


        // Create Admin Test Users
        User::factory()
            ->has(
                Blog::factory()
                    ->count(3)
                )
            ->create([
                    'first_name' => 'Admin',
                    'last_name' => 'User',
                    'email' => 'admin@email.com',
                    'password' => 'password',
                    'active' => true,
                    'email_verified_at' => date_create()->format('Y-m-d H:i:s')
                ])
            ->assignRole('admin');

        // Create Default Test Users
        User::factory()
            ->create([
                'first_name' => 'Default',
                'last_name' => 'User',
                'email' => 'user@email.com',
                'password' => 'password',
                'active' => true,
                'email_verified_at' => date_create()->format('Y-m-d H:i:s')
            ])
            ->assignRole('user');

        // Create 5 Test Users
        User::factory()
            ->count(5)
            ->create()
            ->each(function ($user) {
                $user->assignRole('user');
            });


    }
}
