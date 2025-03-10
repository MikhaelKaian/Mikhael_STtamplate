<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class CreateRolesSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Admin',
            ],
            [
                'id' => 2,
                'name' => 'User',
            ],
            [
                'id' => 3,
                'name' => 'SuperAdmin',
            ],
            ];

            foreach ($roles as $key => $role){
                Role::create($role);
            }
    }
}
