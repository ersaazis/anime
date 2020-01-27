<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CbMenusTableSeeder::class);
        $this->call(CbModulesTableSeeder::class);
        $this->call(CbRolesTableSeeder::class);
        $this->call(CbRolePrivilegesTableSeeder::class);
    }
}
