<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    private $data = [];

    public function run()
    {
        $user = User::create([
                'email' => 'user@habr.local',
                'password' => 'password',
            ]
        );

        $admin = User::create([
                'email' => 'admin@habr.local',
                'password' => 'password',
            ]
        );
//        $user->assignRole('user');
//        $admin->assignRole('admin');
    }
}
