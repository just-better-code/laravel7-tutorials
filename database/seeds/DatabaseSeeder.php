<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call(PermissionsSeeder::class);
         $this->call(UsersSeeder::class);
    }
}
