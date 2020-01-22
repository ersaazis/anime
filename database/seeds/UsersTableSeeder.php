<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ersa Azis Mansyur',
                'email' => 'eam24maret@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0KOcZ7CZ8Y5aKztEvJMDwuqPYGySXFLYVm2EE/QaFeZFyZTHKVnbW',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'photo' => NULL,
                'cb_roles_id' => 1,
                'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36',
                'login_at' => '2020-01-22 07:21:48',
            ),
        ));
        
        
    }
}