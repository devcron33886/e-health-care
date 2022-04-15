<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
        ]);

        \App\Models\User::factory(48)->create();
        \App\Models\Prescription::factory(48)->create();
        \App\Models\Consultation::factory(48)->create();
        \App\Models\Appointment::factory(48)->create();
        \App\Models\Payment::factory(48)->create();

    }
}
