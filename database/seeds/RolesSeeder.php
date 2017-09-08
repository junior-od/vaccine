<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'	=>	'Super Admin',
            ],
            [
                'name'	=>	'Admin',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
