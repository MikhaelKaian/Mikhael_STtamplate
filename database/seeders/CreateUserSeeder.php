<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'isAdmin',
                'username' => 'isAdmin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'roles_id' => 1,
            ],
            [
                'name' => 'isUser',
                'username' => 'isUser',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345'),
                'roles_id' => 2,
            ],
            [
                'name' => 'isSuperAdmin',
                'username' => 'isSuperAdmin',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('12345'),
                'roles_id' => 3,
            ],
            ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
