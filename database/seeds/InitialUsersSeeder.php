<?php

use Illuminate\Database\Seeder;

class InitialUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = \Spatie\Permission\Models\Role::create(['guard_name' => 'api','name' => 'admin',]);

        $adminUser = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assginRole($adminRole);

        \App\Models\User::create([
            'name' => 'john',
            'email' => 'john@mail.com',
            'password' => bcrypt('password')
        ]);

    }
}
