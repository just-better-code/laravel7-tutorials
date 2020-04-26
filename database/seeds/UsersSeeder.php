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

        /** @var User $admin */
        $superAdmin = factory(User::class)->create(
            [
                'email' => 'super-admin@habr.local',
                'password' => 'password',
            ]
        );
        $user->assignRole('user');
        $admin->assignRole('admin');
        $superAdmin->assignRole('super-admin');

        $users = factory(User::class, 5)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
