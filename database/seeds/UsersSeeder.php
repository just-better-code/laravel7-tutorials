<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    private $data = [];

    public function run()
    {
        /** @var User $user */
        $user = factory(User::class)->create(
            [
                'email' => 'user@habr.local',
                'password' => 'password',
            ]
        );

        /** @var User $admin */
        $admin = factory(User::class)->create(
            [
                'email' => 'admin@habr.local',
                'password' => 'password',
            ]
        );

        $user->assignRole('user');
        $admin->assignRole('admin');
    }
}
